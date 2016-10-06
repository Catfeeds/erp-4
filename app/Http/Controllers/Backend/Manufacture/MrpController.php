<?php namespace App\Http\Controllers\Backend\Manufacture;

use Redirect;
use Illuminate\Http\Request;
use App\Models\Logistics\Product;
use App\Models\Manufacture\Stucture;
use App\Models\Manufacture\plan;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class MrpController extends Controller {

    public function index()
    {
        $modules = Product::module()->get();
        $unfinishPlans = Plan::unfinish()->where('parent_id','')->get();
        return view('backend.manufacture.mrp.index' , compact('modules','unfinishPlans'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if(isset($input['plan'])){
            if (empty($request->input('plan'))) {
                return Redirect::back()->withInput()->withErrors('生产计划不能为空!!!');
            }
            $id = plan::find($input['plan'])->product_id;
            $quantity = plan::find($input['plan'])->quantity;
        }else{
            if (empty($request->input('module')) || empty($request->input('quantity'))) {
                return Redirect::back()->withInput()->withErrors('组件名称或数量不能为空!!!');
            }
            $id = $input['module'];
            $quantity = $input['quantity'];
        } 
        $stucture = Stucture::where('product_id',$id)->get();
        $needTree = $this->makePlanMrp($stucture,$quantity);
        $product = Product::find($id);
        $product->need = $quantity;
        return view('backend.manufacture.mrp.show' , compact('product','needTree'));
    }  

    public function planMrp($number,$quantity)
    {
        $id = plan::where('number',$number)->first()->product_id;
        $stucture = Stucture::where('product_id',$id)->get();
        $needTree = $this->makePlanTree($stucture,$quantity);
        // dd($needTree);
        $product = Product::find($id);
        $product->need = $quantity;
        return view('backend.manufacture.mrp.planTree' , compact('product','needTree'));
    } 





}