<?php namespace App\Http\Controllers\Backend\Manufacture;

use Session;
use Redirect;
use App\Models\Manufacture\Process;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Stucture;
use App\Http\Requests\Backend\Luster\StoreStuctureRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class StuctureController extends Controller {

    public function getProductId($name)
    {
        $id =  Product::where('name',$name)->first()->id;
        return $id;
    }  
    public function view($name,$num=null)
    {
        $id = $name;
        $parent_products = Product::module()->get();
        return view('backend.manufacture.stucture.index' , compact('parent_products', 'stuctures','id'));
    }   

    public function index($id = 1)
    {
        $product = Product::find($id);
        // dd($product);
        $stucture = Stucture::where('product_id',$id)->get();
        $tree = $this->makeStuctureTree($stucture);
        $products   = Product::all();
        // dd($tree);
        return view('backend.manufacture.stucture.index' , compact('tree','processes','products','product'));
    }


    public function create()
    {
        $modules   = Product::module()->get();
        $processes  = Process::all();
        $products   = Product::all();
        return view('backend.manufacture.stucture.create',compact('modules' , 'products' , 'processes'));
    }

    public function store(StoreStuctureRequest $request)
    { 
        if (empty($request->input('children_id')) || empty($request->input('factor'))) {
            return Redirect::back()->withInput()->withErrors('子结构或数量不能为空!!!');
        }
        $stucture = $request->all(); 
        $stucture['creator_id'] = Auth::id();
        if (Stucture::create($stucture)) {
            return Redirect::to('admin/manufacture/stuctures')
                ->withFlashSuccess('产品结构创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $parent_products = Product::all();
        return view('backend.manufacture.stucture.show' ,compact('parent_products'))
            ->withStucture(Stucture::find($id));
    }

    public function edit($id)
    {
        $assembly  = Product::module()->get();
        $processes = Process::all();
        $product   = Product::find($id);
        return view('backend.manufacture.stucture.edit' , compact('assembly' , 'product' , 'processes'))
            ->withStucture(Stucture::find($id));
    }

    public function update(StoreStuctureRequest $request,$id)
    {
        $products = Stucture::find($id);
        if ($products->update($request->all())) {
            return Redirect::to('admin/manufacture/stuctures')
                ->withFlashSuccess('产品结构更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $stucture = Stucture::find($id);
        $stucture->delete();
        return Redirect::to('admin/manufacture/stuctures')
            ->withFlashSuccess('产品结构删除成功！');
    }
}
