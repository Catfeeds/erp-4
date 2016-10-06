<?php namespace App\Http\Controllers\Backend\Logistics;

use Session,Redirect;
use Carbon\Carbon;
use App\Models\System\Option;
use App\Models\Client\Client;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\StockRecord;
use App\Models\Logistics\StockChange;
use App\Http\Requests\Backend\Luster\StoreImportRequest;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class ImportController extends Controller {

    public function index()
    {
        $imports = StockChange::where('type','其它入库')->orderBy('id','Desc')->paginate(config('access.users.default_per_page'));
        return view('backend.logistics.import.index',compact('imports'));
    }

    public function create()
    {
        $importNumber = $this->makeImportNumber();
        $date = Carbon::now()->format('Y-m-d');
        $products = Product::all();
        $products->map(function($item){
            $item->unit = Option::find($item->unit_id)->name;
        });
        // dd($products);
        $supplys = Client::supplier()->get();
        return view('backend.logistics.import.create',compact('products','supplys','date','importNumber'));
    }

    public function store(StoreImportRequest $request)
    {   
        $products = array();
        $products = $request->input('products');
        $content = $request->all();
        $content = array_except($content, 'products');
        $content['type'] = '其它入库';
        $content['creator_id'] = Auth::id();
        if (StockChange::create($content)) {
            $total = 0;
            $changeId = StockChange::max('id');
            foreach ($products as $key => $value) {
                $total = $total + $value['quantity'];
                $product = Product::find($value['product_id']);
                $product->total = $product->total + $value['quantity'];
                // dd($product);
                $product->save();
                $value['imageable_id'] = $changeId;
                $value['type'] = '其它入库';
                $value['imageable_type'] = 'StockChange';
                StockRecord::create($value);
            }
            $change = StockChange::find($changeId);
            $change->total = $total;
            $change->save();
            return Redirect::to('admin/logistics/imports')
                ->withFlashSuccess('其它入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $import = StockChange::find($id);
        $records = StockRecord::where('imageable_id',$id)->where('type','其它入库')->get();
        $records->map(function($item, $key){
            $item->No = $key+1;
            $item->number = Product::find($item->product_id)->number;
            $item->name = Product::find($item->product_id)->name;
            $item->standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit->name;
        });
        return view('backend.logistics.import.show',compact('import','records'));
    }

    public function edit($id)
    {
        $products   = Product::all();
        $supplys    = Client::supply()->get();
        $import     = StockChange::find($id);
        $records = StockRecord::where('imageable_id',$id)->where('type','其它入库')->get();
        $records->map(function($item, $key){
            $item->No = $key+1;
            $item->id = Product::find($item->product_id)->id;
            $item->number = Product::find($item->product_id)->number;
            $item->name = Product::find($item->product_id)->name;
            $item->standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit;
            $item->quantity = '<input hidden type="text" name="products['.$item->id.'][product_id]" value="'.$item->id.'"/><input type="text" name="products['.$item->id.'][quantity]" value="'.$item->quantity.'"/>';
        });
        // dd($supplys);
        return view('backend.logistics.import.edit',compact('products', 'supplys' , 'import' , 'records'));
    }

    public function update(StoreImportRequest $request,$id)
    {  
        $oldProducts = array();
        $products = array();
        $records = StockRecord::where('imageable_id',$id)->where('type','其它入库')->get();
        foreach ($records as $value) {
            $oldProducts[$value->product_id] = $value->quantity;
        }
        $content = $request->all();
        $products = $request->input('products');
        $chang = StockChange::find($id);
        $content = array_except($content, 'products');
        if ($chang->update($content)) {
            $total = 0;
            foreach ($products as $key => $value) {
                $total = $total + $value['quantity'];
                $product = Product::find($value['product_id']);
                $product->total = $product->total + ($value['quantity']-$oldProducts[$value['product_id']]);
                $product->save();
                $records  = StockRecord::where('imageable_id',$id)
                                        ->where('type','其它入库')
                                        ->where('product_id',$value['product_id'])->first();
                $records->update($value);
            }
            $change = StockChange::find($id);
            $change->total = $total;
            $change->update();
            return Redirect::to('admin/logistics/imports')
                ->withFlashSuccess('其它入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $import = StockChange::find($id);
        $import->delete();
        return Redirect::to('admin/logistics/imports')
            ->withFlashSuccess('其它入库记录删除成功！');
    }
}
