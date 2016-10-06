<?php namespace App\Http\Controllers\Backend\Manufacture;

use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Manufacture\Plan;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Stucture;
use App\Http\Requests\Backend\Luster\StoreWorksheetRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class WorksheetController extends Controller
{
    public function getWorksheetProduct($id){
        $productId = Worksheet::find($id)->plan->product->id;
        $quantity = Worksheet::find($id)->plan->quantity;
        $stucture = Stucture::where('product_id',$productId)->get();
        foreach ($stucture as $key => $value) {
            $value->No = $key+1;
            $value->number = $value->children->number;
            $value->name = $value->children->name;
            $value->unit = $value->children->unit->name;
            $value->standard = $value->children->standard;
            $value->need = '<input hidden type="text" name="products['.$key.'][product_id]" value="'.$value->children_id.'"/><input type="text" name="products['.$key.'][quantity]" value="'.$value->factor * $quantity.'" />';
            $value->retour = '<input hidden type="text" name="products['.$key.'][product_id]" value="'.$value->children_id.'"/><input type="text" name="products['.$key.'][quantity]" />';
            $value->total = $value->children->total;
        }
        return $stucture;
    }
   public function index()
    {
        $alls = Worksheet::orderBy('id', 'desc')->where('type','加工单')->get();
        $alls->map(function($item){
            $item->plan_number = $item->plan->number;
            $item->product_name =  Product::find($item->plan->product_id)->name;
            $item->remnant = ( $item->plan->quantity - $item->plan->finish ) ;
            $item->state_id = $item->state->name;
            $item->start_date = $item->plan->start_date;
            $item->quantity = $item->plan->quantity;            
            $item->finish = $item->plan->finish;
        });
        $finishs =  Worksheet::finish()->where('type','加工单')->orderBy('id', 'desc')->get();
        $finishs->map(function($item){
            $item->operator = $item->user->name;
            $item->plan_number = $item->plan->number;
            $item->product_name = Product::find($item->plan->product_id)->name;
            $item->remnant = ( $item->quantity - $item->finish );
            $item->state_id = $item->state->name;
            $item->start_date = $item->plan->start_date;
            $item->quantity = $item->plan->quantity;            
            $item->finish = $item->plan->finish;
        });
        $unfinishs = Worksheet::unfinish()->where('type','加工单')->orderBy('id', 'desc')->get();
        $unfinishs->map(function($item){
            $item->mrp = $this->getWorksheetMrpState($item->number,$item->plan->quantity);
            $item->number = '<b class="worksheet_number">'.$item->number.'</b>';
            $item->product_name = '<b class="product_name">'.$item->plan->product->name.'</b>';
            $item->remnant = '<b style="font-size:16px;color:#337ab7" class="remnant">'. ( $item->plan->quantity - $item->plan->finish ) .'</b>';
            $item->end_date = '<a class="end_date btn btn-success btn-xs">'.$item->end_date.'</a>';
            $item->progress = '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'. round(($item->plan->finish/$item->plan->quantity),2)*100 .'" aria-valuemin="0" aria-valuemax="100"  style="min-width: 2em;width: '. round(($item->plan->finish/$item->plan->quantity),2)*100 .'%;">'. round(($item->plan->finish/$item->plan->quantity),2)*100 .'%</div></div>';
            $item->quantity = '<span class="quantity">'.$item->plan->quantity.'</span>';
            $item->start_date = '<span class="start_date">'.$item->plan->start_date.'</span>';
            $item->finish = '<span class="finish">'.$item->plan->finish.'</span>';
            $item->state_id = '<a class="model btn btn-success btn-xs">'.$item->state->name.'</a>';
            $item->collect_state = '<a class="collect btn btn-success btn-xs">'.$item->collect_state.'</a>';
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/manufacture/worksheets/'.$item->id.'">详情</a>';
        });
        // dd($unfinishs);
        return view('backend.manufacture.worksheet.index',compact('alls','finishs','unfinishs'));
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
        $unfinishPlans = Plan::where('type','生产计划')->where('state_id',18)->where('issue_state','')->get();
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('backend.manufacture.worksheet.create',compact('products','worksheetNumber','unfinishPlans','nowDate'));
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
            $data['type'] = '加工单';
            $data['collect_state'] = '禁止领料';
            $data['state_id'] = 18;
            $data['creator_id'] = Auth::id();
            $data['end_date'] = $plan->end_date;
            if(Worksheet::create($data)){
                $plan->issue_state = '已发布';
                $plan->save();
                return Redirect::to('admin/manufacture/worksheets')->withFlashSuccess('加工单创建成功！');
            }else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }
        }else{
            if(empty($request->input('product_id')) || empty($request->input('quantity'))) {
                return Redirect::back()->withInput()->withErrors('组件名称或数量不能为空!!!');
            }
            $worksheet = $request->all();
            $worksheet['state_id'] = 18;
            $worksheet['type'] = '加工单';
            $worksheet['creator_id'] = Auth::id();
            if(Worksheet::create($worksheet)){
                return Redirect::to('admin/manufacture/worksheets')->withFlashSuccess('加工单创建成功！');
                $i = 1;
            }else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            } 
        } 
    }

    public function show($id)
    {
        $worksheet = Worksheet::find($id);
        // $worksheet = $worksheet->map(function($item){
        //     $item->productNumber = $item->plan->product->nubmer;
        //     $item->productName = $item->plan->product->name;
        //     $item->start_date = $item->plan->start_date;
        //     $item->quantity = $item->plan->quantity;
        //     $item->finish = $item->plan->finish;
        //     $item->remnant = $item->quantity - $item->finish;
        // });
        return view('backend.manufacture.worksheet.show')
            ->withWorksheet(worksheet::find($id));
    }

    public function edit($id)
    {
        $worksheet = Worksheet::find($id);
        $products = Product::module()->get();
        return view('backend.manufacture.worksheet.edit',compact('worksheet','products'));
    }

    public function update(StoreWorksheetRequest $request,$id)
    {
        $worksheet = Worksheet::find($id);
        if ($worksheet->update($request->all())) {
            return Redirect::to('admin/manufacture/worksheets')
                ->withFlashSuccess('加工单更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $worksheet = Worksheet::find($id);
        $worksheet->delete();
        return Redirect::to('admin/manufacture/worksheets')
            ->withFlashSuccess('加工单删除成功！');
    }
}
