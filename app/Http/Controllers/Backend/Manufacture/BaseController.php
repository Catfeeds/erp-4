<?php namespace App\Http\Controllers\Backend\Manufacture;

use Carbon\Carbon;
use App\Models\Logistics\Product;
use Illuminate\Routing\Controller;
use App\Models\Manufacture\Stucture;
use App\Models\Manufacture\Check;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Plan;
use App\Models\Logistics\StockChange;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

 class BaseController extends Controller {

    //make结构树(关系树)
    public function makeStuctureTree($stucture){
        $tree = array();
        foreach ($stucture as $key => $value) {
            // dd($value);
            if ($value->children->type_id == 37) {
                $value->type = Product::find($value->children_id)->type;
                $stucture = Stucture::where('product_id',$value->children_id)->get();
                $makeStuctureTree = $this->makeStuctureTree($stucture);
                if($makeStuctureTree) {
                    $value['son'] = $stucture;
                }
            }
            $tree[] = $value;
        }
        return $tree;
    }

    //计算工单MRP
    public function worksheetMrp($number,$quantity){ 
        $id = Worksheet::where('number',$number)->first()->plan->product_id;
        $stucture = Stucture::where('product_id',$id)->get();
        foreach ($stucture as $key => $value) {
            $value->need = $value->factor * $quantity;
            $value->total = Product::find($value->children_id)->total;
            $value->needState = $value->total - $value->need;
        }
        // dd($stucture);
        $product = Product::find($id);
        $product->need = $quantity;
        return view('backend.manufacture.mrp.worksheetTree' , compact('stucture','product'));
    }

    //make需求结构树(关系树),不与库存计算
    public function makePlanTree($stucture,$quantity){
        $tree = array();
        foreach ($stucture as $key => $value) {
            $value->factor = $value->factor*$quantity;
            $value->total = Product::find($value->children_id)->total;

            $value->need = $value->factor;
            if ($value->children->type_id == 37) {
                $stucture = Stucture::where('product_id',$value->children_id)->get();
                $makeStuctureTree = $this->makePlanTree($stucture,$value['factor']);
                if($makeStuctureTree) {
                    $value['son'] = $stucture;
                }
            }
            $tree[] = $value;
        }
        return $tree;
    }    

    //make需求结构树(关系树),与库存计算,结果转入下一级运算
    public function makePlanMrp($stucture,$quantity){
        $tree = array();
        foreach ($stucture as $key => $value) {
            $value->factor = $value['factor']*$quantity;
            $value->total = Product::find($value->children_id)->total;
            $value->need = ($value['factor'] - $value['total']) > 0 ? abs($value['factor'] - $value['total']) : 0;
            // dd($value);
            if ($value->children->type_id == 37) {
                $stucture = Stucture::where('product_id',$value->children_id)->get();
                $makeStuctureTree = $this->makePlanMrp($stucture,$value->need);
                if($makeStuctureTree) {
                    $value['son'] = $stucture;
                    // $value['total'] = Product::find($value->children_id)->total;
                }
            }
            $tree[] = $value;
        }
        return $tree;
    }

    //获取worksheetMrp状态
    public function getWorksheetMrpState($number,$quantity){ 
        $state = 0;
        $id = Worksheet::where('number',$number)->first()->plan->product_id;
        $stucture = Stucture::where('product_id',$id)->get();
        foreach ($stucture as $key => $value) {
            $value->need = $value->factor * $quantity;
            $value->total = Product::find($value->children_id)->total;
            $value->needState = $value->total - $value->need;
            if($value->needState < 0) {
                $state++;
            }
        }
        if($state > 0) {
            return '<a class="mrp btn btn-danger btn-xs">NO</a>';                                        
        }else{
            return '<a class="mrp btn btn-success btn-xs">OK</a>';                                       
        }
    }
    
    public function makePlanNumber($number =''){
        $prefix = 'SCJH';

        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        // dd($date);
        if (!empty($number)) {
            $planNumber = $number;
            $planDate = $date;
        }else{
            $max = Plan::max('id') ? Plan::max('id') : ''; 
            if (!empty($max)) {
                $planNumber = Plan::find($max)->number;
                $year = Plan::find($max)->created_at->format('Y');
                $week = Plan::find($max)->created_at->format('W')+1;
                $planDate = (int)$year.$week;
            }
        }
        if (!empty($planNumber)) {
            $number = str_pad(((int)substr($planNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$planDate) {
                $number = '001';
            }elseif($date<$planDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $planNumber = $prefix.$date.$number;
        }else{
            $planNumber = $prefix.$date.'001';
        }
        return $planNumber;
    }

    public function makeWorksheetNumber($number =''){
        $prefix = 'SCJG';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $worksheetNumber = $number;
            $worksheetDate = $date;
        }else{
            $max = Worksheet::max('id'); 
            if (!empty($max)) {
                $worksheetNumber = Worksheet::find($max)->number;
                $year = Worksheet::find($max)->created_at->format('Y');
                $week = Worksheet::find($max)->created_at->format('W')+1;
                $worksheetDate = (int)$year.$week;
            }
        }
        if (!empty($worksheetNumber)) {
            $number = str_pad(((int)substr($worksheetNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$worksheetDate) {
                $number = '001';
            }elseif($date<$worksheetDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $worksheetNumber = $prefix.$date.$number;
        }else{
            $worksheetNumber = $prefix.$date.'001';
        }
        return $worksheetNumber;
    }

    public function makeCheckNumber($number =''){
        $prefix = 'SCYS';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $worksheetNumber = $number;
            $worksheetDate = $date;
        }else{
            $max = Check::max('id'); 
            if (!empty($max)) {
                $worksheetNumber = Check::find($max)->number;
                $year = Check::find($max)->created_at->format('Y');
                $week = Check::find($max)->created_at->format('W')+1;
                $worksheetDate = (int)$year.$week;
            }
        }
        if (!empty($worksheetNumber)) {
            $number = str_pad(((int)substr($worksheetNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$worksheetDate) {
                $number = '001';
            }elseif($date<$worksheetDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $worksheetNumber = $prefix.$date.$number;
        }else{
            $worksheetNumber = $prefix.$date.'001';
        }
        return $worksheetNumber;
    }    

    public function makeCollectNumber($number =''){
        $prefix = 'SCLL';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $worksheetNumber = $number;
            $worksheetDate = $date;
        }else{
            $max = StockChange::where('type','加工领料')->max('id'); 
            if (!empty($max)) {
                $worksheetNumber = StockChange::find($max)->number;
                $year = StockChange::find($max)->created_at->format('Y');
                $week = StockChange::find($max)->created_at->format('W')+1;
                $worksheetDate = (int)$year.$week;
            }
        }
        if (!empty($worksheetNumber)) {
            $number = str_pad(((int)substr($worksheetNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$worksheetDate) {
                $number = '001';
            }elseif($date<$worksheetDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $worksheetNumber = $prefix.$date.$number;
        }else{
            $worksheetNumber = $prefix.$date.'001';
        }
        return $worksheetNumber;
    }    

    public function makeRetourNumber($number =''){
        $prefix = 'SCTL';
        $year = Carbon::now()->format('Y');
        $week = Carbon::now()->format('W')+1;
        $date = (int)$year.$week;
        if (!empty($number)) {
            $worksheetNumber = $number;
            $worksheetDate = $date;
        }else{
            $max = StockChange::where('type','加工退料')->max('id'); 
            if (!empty($max)) {
                $worksheetNumber = StockChange::find($max)->number;
                $year = StockChange::find($max)->created_at->format('Y');
                $week = StockChange::find($max)->created_at->format('W')+1;
                $worksheetDate = (int)$year.$week;
            }
        }
        if (!empty($worksheetNumber)) {
            $number = str_pad(((int)substr($worksheetNumber,10,3)+1),3,"0",STR_PAD_LEFT);
            if ($date>$worksheetDate) {
                $number = '001';
            }elseif($date<$worksheetDate) {
                return Redirect::back()->withInput()->withErrors('系统日期小于最后一条记录的日期，请检查或联系管理员！！！');
            }
            $worksheetNumber = $prefix.$date.$number;
        }else{
            $worksheetNumber = $prefix.$date.'001';
        }
        return $worksheetNumber;
    }


}
