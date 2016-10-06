<?php namespace App\Http\Controllers\Backend\Manufacture;

use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Manufacture\Plan;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Stucture;
use App\Http\Requests\Backend\Luster\StoreManufacturePlanRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class PlanController extends Controller
{
    public function planJson(request $request){
       $id = $request->input('id');
        $data = Plan::where('type','生产计划')->where('parent_id',$id)->get();
        $data->map(function($item){
            $item->number = '<b style=" font-size:16px;color:#337ab7 "> '.$item->number.'</b>';
            $item->product_number = '<b style=" font-size:16px;color:#337ab7 "> '.Product::find($item->product_id)->number.'</b>';
            $item->product_name = '<b style=" font-size:16px;color:#337ab7 "> '.Product::find($item->product_id)->name.'</b>';
            $item->remnant = '<b style=" font-size:16px;color:#337ab7 "> '.($item->quantity - $item->finish < 0 ? 0 : $item->quantity - $item->finish) .'</b></span>' ;
            $item->progress = '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'. round(($item->finish/$item->quantity),2)*100 .'" aria-valuemin="0" aria-valuemax="100"  style="min-width: 2em;width: '. round(($item->finish/$item->quantity),2)*100 .'%;">'. round(($item->finish/$item->quantity),2)*100 .'%</div></div>';
        });
        return $data;
    }

    public function index(){
        $alls = Plan::alls()->get();
        $alls->map(function($item){
            $item->product_number = Product::find($item->product_id)->number;
            $item->product_name = Product::find($item->product_id)->name;
            $item->remnant = $item->quantity - $item->finish < 0 ? 0 : $item->quantity - $item->finish ;
            $item->state_id = $item->state->name;
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/manufacture/plans/'.$item->id.'">详情</a>';
        });
        $finishs = Plan::finish()->get();
        $finishs->map(function($item){
            $item->product_number = Product::find($item->product_id)->number;
            $item->product_name = Product::find($item->product_id)->name;
            $item->remnant = $item->quantity - $item->finish < 0 ? 0 : $item->quantity - $item->finish ;
            $item->state_id = $item->state->name;
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/manufacture/plans/'.$item->id.'">详情</a>';
        });
        $unfinishs = Plan::unfinish()->where('parent_id','')->get();
        $unfinishs->map(function($item){
            $item->mrp = '<a class="mrp btn btn-success btn-xs">MRP</a>';
            $item->number = '<b class="plan_number">'.$item->number.'</b>';
            $item->product_number = '<b class="plan_number">'.Product::find($item->product_id)->number.'</b>';
            $item->product_name = '<b class="product_name">'.Product::find($item->product_id)->name.'</b>';
            $item->remnant = '<b class="remnant">'. ( $item->quantity - $item->finish ) .'</b>';
            $item->state_id = '<a class="model btn btn-success btn-xs">'.$item->state->name.'</a>';
            $item->quantity = '<span class="quantity">'.$item->quantity.'</span>';
            $item->end_date = '<a class="end_date btn btn-success btn-xs">'.$item->end_date.'</a>';
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/manufacture/plans/'.$item->id.'">详情</a>';

        });
        return view('backend.manufacture.plan.index',compact('alls','finishs','unfinishs'));
    }

    public function create(){
        $planNumber = $this->makePlanNumber();
        $products = Product::module()->get();
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('backend.manufacture.plan.create',compact('products','planNumber','nowDate'));
    }

    public function store(StoreManufacturePlanRequest $request){
        $plan = $request->all();
        $plan['state_id'] = 18;
        $plan['type'] = '生产计划';
        $plan['creator_id'] = Auth::id();
        if (Plan::create($plan)) {
            $stucture = Stucture::where('product_id',$plan['product_id'])->get();
            $planNeedTree = $this->makePlanTree($stucture,$plan['quantity']);
            // dd($planNeedTree);
            $this->makeChildrenPlan($plan,$planNeedTree);
            $createState = 'ok';
        } 
        if ($createState == 'ok') {
            return Redirect::to('/admin/manufacture/plans')->withFlashSuccess('生产计划创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $plan = Plan::find($id);
        $childrenPlan = Plan::where('number',$plan->number)->where('parent_id','!=',0)->get();
        // dd($childrenPlan);
        return view('backend.manufacture.plan.show',compact('plan','childrenPlan'));
    }

    public function edit($id){
        $plan = Plan::find($id);
        $products = Product::module()->get();
        return view('backend.manufacture.plan.edit',compact('plan','products'));
    }

    public function update(StoreManufacturePlanRequest $request,$id)
    {
        $plan = Plan::find($id);
        if ($plan->update($request->all())) {
            return Redirect::to('/admin/manufacture/plans')
                ->withFlashSuccess('计划更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return Redirect::to('admin/manufacture/plans')
            ->withFlashSuccess('计划删除成功！');
    }

    public function getPlanId(request $request){
        $number = $request->input('number');
        $id = Plan::where('number',$number)->first()->id;
        return $id;
    }

    //创建子计划
    public function makeChildrenPlan($plan,$planNeedTree){
        foreach ($planNeedTree as $value) {
            if (Product::find($value->children_id)->type_id == 37) {
                $childrenPlan['number'] = $plan['number'];
                $childrenPlan['parent_id'] = Plan::where('product_id', $value->product_id)->max('id');
                $childrenPlan['product_id'] = $value->children_id;
                $childrenPlan['type']     = $plan['type'];
                $childrenPlan['state_id'] = $plan['state_id'];
                $childrenPlan['start_date'] = $plan['start_date'];
                $childrenPlan['end_date']  =  $plan['end_date'];
                $childrenPlan['quantity']  =  $value->need;
                $childrenPlan['creator_id'] = $plan['creator_id'];
                if (Plan::create($childrenPlan)) {
                    if (!empty($value['son'])) {
                        $stucture = Stucture::where('product_id',$value->children_id)->get();
                        $planNeedTree = $this->makePlanTree($stucture,$plan['quantity']);
                        $this->makeChildrenPlan($plan,$planNeedTree);
                    }
                
                }
            }
        }
    }

}
