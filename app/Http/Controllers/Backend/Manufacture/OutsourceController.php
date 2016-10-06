<?php namespace App\Http\Controllers\Backend\Manufacture;

use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Plan;
use App\Http\Requests\Backend\Luster\StoreWorksheetRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class OutsourceController extends Controller
{

   public function index()
    {
        $alls = Worksheet::orderBy('id', 'desc')->where('type','委外加工单')->get();
        $alls->map(function($item){
            $item->plan_number = $item->plan->number ;
            $item->product_name =  Product::find($item->plan->product_id)->name;
            $item->quantity =  $item->plan->quantity;
            $item->finish =  $item->plan->finish;
            $item->start_date =  $item->plan->start_date;
            $item->remnant = ( $item->quantity - $item->finish ) ;
            $item->state_id = $item->state->name;
        });
        $finishs =  Worksheet::where('state_id',19)->where('type','委外加工单')->orderBy('id', 'desc')->get();
        $finishs->map(function($item){
            $item->operator = $item->user->name;
            $item->plan_number = $item->plan->number ;
            $item->product_name = Product::find($item->plan->product_id)->name;
            $item->quantity =  $item->plan->quantity;
            $item->finish =  $item->plan->finish;
            $item->start_date =  $item->plan->start_date;
            $item->remnant = ( $item->quantity - $item->finish ) ;
            $item->state_id = $item->state->name;
        });
        $unfinishs = Worksheet::where('state_id',18)->where('type','委外加工单')->orderBy('id', 'desc')->get();
        $unfinishs->map(function($item){
            $item->mrp = $this->getWorksheetMrpState($item->number,$item->plan->quantity);
            $item->number = '<b class="worksheet_number">'.$item->number.'</b>';
            $item->supplier = '<b class="worksheet_number">'.$item->supply->short.'</b>';
            $item->plan_number = '<b class="plan_number">'.$item->plan_id .'</b>';
            $item->product_name = '<b class="product_name">'.$item->plan->product->name.'</b>';
            $item->remnant = '<b style=" font-size:16px;color:#337ab7" class="remnant">'. ( $item->plan->quantity - $item->plan->finish ) .'</b>';
            $item->start_date =  $item->plan->start_date;
            $item->end_date = '<a class="end_date btn btn-success btn-xs">'.$item->end_date.'</a>';
            $item->progress = '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'. round(($item->plan->finish/$item->plan->quantity),2)*100 .'" aria-valuemin="0" aria-valuemax="100"  style="min-width: 2em;width: '. round(($item->plan->finish/$item->plan->quantity),2)*100 .'%;">'. round(($item->plan->finish/$item->plan->quantity),2)*100 .'%</div></div>';
            $item->quantity = '<span class="quantity">'.$item->plan->quantity.'</span>';
            $item->finish = '<span class="finish">'.$item->plan->finish.'</span>';
            $item->state_id = '<a class="model btn btn-success btn-xs">'.$item->state->name.'</a>';
            $item->collect_state = '<a class="collect btn btn-success btn-xs">'.$item->collect_state.'</a>';

        });
        // dd($unfinishs);
        return view('backend.manufacture.outsource.index',compact('alls','finishs','unfinishs'));
    }

    public function getWorksheetId(request $request){
        $number = $request->input('number');
        $id = Worksheet::where('number',$number)->first()->id;
        return $id;
    }

    public function create()
    {
        $worksheetNumber = $this->makeWorksheetNumber();
        $products = Product::module()->get();
        $suppliers = Client::supplier()->get();
        $unfinishPlans = Plan::where('type','生产计划')->where('state_id',18)->where('issue_state','')->get();
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('backend.manufacture.outsource.create',compact('products','worksheetNumber','unfinishPlans','nowDate','suppliers'));
    }

    public function store(StoreWorksheetRequest $request,$state='')
    {
        $input = $request->all();
        if(isset($input['plan'])){
            if(empty($request->input('plan'))) {
                return Redirect::back()->withInput()->withErrors('生产计划不能为空!!!');
            }
            $plan = Plan::find($input['plan']);
            $data['number'] = $this->makeWorksheetNumber();
            $data['plan_id'] = $plan->id;
            $data['type'] = '委外加工单';
            $data['collect_state'] = '禁止领料';
            $data['supplier_id'] = $input['supplier_id'];
            $data['state_id'] = 18;
            $data['creator_id'] = Auth::id();
            $data['end_date'] = $plan->end_date;
            if(Worksheet::create($data)){
                $plan->issue_state = '已发布';
                $plan->save();
                return Redirect::to('admin/manufacture/outsources')->withFlashSuccess('委外加工单创建成功！');
            }else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }
        }else{
            if(empty($request->input('product_id')) || empty($request->input('quantity'))) {
                return Redirect::back()->withInput()->withErrors('组件名称或数量不能为空!!!');
            }
            $worksheet = $request->all();
            $worksheet['state_id'] = 18;
            $worksheet['type'] = '委外加工单';
            $worksheet['creator_id'] = Auth::id();
            if(Worksheet::create($worksheet)){
                return Redirect::to('admin/manufacture/outsources')->withFlashSuccess('委外加工单创建成功！');
                $i = 1;
            }else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            } 
        } 
    }

    public function show($id)
    {
        return view('backend.manufacture.outsourcing.show')
            ->withWorksheet(worksheet::find($id));
    }

    public function edit($id)
    {
        $worksheet = Worksheet::find($id);
        $products = Product::module()->get();
        return view('backend.manufacture.outsource.edit',compact('worksheet','products'));
    }

    public function update(StoreWorksheetRequest $request,$id)
    {
        // dd($request->all());
        $worksheet = Worksheet::find($id);
        if ($worksheet->update($request->all())) {
            return Redirect::to('admin/manufacture/outsources')
                ->withFlashSuccess('加工单更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $worksheet = Worksheet::find($id);
        $worksheet->delete();
        return Redirect::to('admin/manufacture/outsourcings')
            ->withFlashSuccess('加工单删除成功！');
    }
}
