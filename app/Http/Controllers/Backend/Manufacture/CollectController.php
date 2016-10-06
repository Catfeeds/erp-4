<?php namespace App\Http\Controllers\Backend\Manufacture;

use Session,Redirect;
use Carbon\Carbon;
use App\Models\Client\Client;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\StockRecord;
use App\Models\Logistics\StockChange;
use App\Models\Manufacture\Worksheet;
use App\Http\Requests\Backend\Luster\StoreCollectRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class CollectController  extends Controller {

    public function index()
    {
        $collects = StockChange::where('type','加工领料')->orderBy('id','Desc')->paginate(config('access.users.default_per_page'));
        return view('backend.manufacture.collect.index',compact('collects'));
    }

    public function create()
    {
        $collectNumber = $this->makeCollectNumber();
        $date = Carbon::now()->format('Y-m-d');
        $worksheets = Worksheet::where('state_id',18)->where('collect_state','可以领料')->get();
        $worksheets->map(function($item){
            $item->quantity = $item->plan->quantity;
            $item->productName =$item->plan->product->name;
            $item->productUnit = $item->plan->product->unit->name;
            $item->type = $item->type;
        });
        // dd($worksheets);
        return view('backend.manufacture.collect.create',compact('worksheets','date','collectNumber'));
    }

    public function store(StoreCollectRequest $request)
    {   
        // dd($request->all());
        $products = array();
        $products = $request->input('products');
        $content = $request->all();
        $content = array_except($content, 'products');
        $worksheet = Worksheet::find($content['worksheet_id']);
        $worksheet->collect_state = '已领料';
        $worksheet->update();
        // $content = array_except($content, 'worksheet_id');
        $content['type'] = '加工领料';
        $content['creator_id'] = Auth::id();
        if (StockChange::create($content)) {
            $total = 0;
            $changeId = StockChange::max('id');
            foreach ($products as $key => $value) {
                $total = $total + $value['quantity'];
                $product = Product::find($value['product_id']);
                $product->total = $product->total - $value['quantity'];
                // dd($product);
                $product->save();
                $value['imageable_id'] = $changeId;
                $value['type'] = '加工领料';
                $value['imageable_type'] = 'StockChange';
                StockRecord::create($value);
            }
            $change = StockChange::find($changeId);
            $change->total = $total;
            $change->save();
            return Redirect::to('admin/manufacture/collects')
                ->withFlashSuccess('加工单领料记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $collect = StockChange::find($id);
        $records = StockRecord::where('imageable_id',$id)->where('type','加工领料')->get();
        $records->map(function($item, $key){
            $item->No = $key+1;
            $item->number = Product::find($item->product_id)->number;
            $item->name = Product::find($item->product_id)->name;
            $item->standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit->name;
        });
        return view('backend.manufacture.collect.show',compact('collect','records'));
    }

    public function edit($id)
    {
        $products   = Product::all();
        $supplys    = Client::supply()->get();
        $collect     = StockChange::find($id);
        $records = StockRecord::where('imageable_id',$id)->where('type','加工领料')->get();
        $records->map(function($item, $key){
            $item->No = $key+1;
            $item->id = Product::find($item->product_id)->id;
            $item->number = Product::find($item->product_id)->number;
            $item->name = Product::find($item->product_id)->name;
            $item->standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit->name;
            $item->quantity = '<input hidden type="text" name="products['.$item->id.'][product_id]" value="'.$item->id.'"/><input type="text" name="products['.$item->id.'][quantity]" value="'.$item->quantity.'"/>';
        });
        // dd($supplys);
        return view('backend.manufacture.collect.edit',compact('products', 'supplys' , 'collect' , 'records'));
    }

    public function update(StoreCollectRequest $request,$id)
    {  
        $oldProducts = array();
        $products = array();
        $records = StockRecord::where('imageable_id',$id)->where('type','加工领料')->get();
        foreach ($records as $value) {
            $oldProducts[$value->product_id] = $value->quantity;
        }
        // dd($oldProducts);
        $content = $request->all();
        $products = $request->input('products');
        $chang = StockChange::find($id);
        $content = array_except($content, 'products');
        if ($chang->update($content)) {
            $total = 0;
            foreach ($products as $key => $value) {
                $total = $total + $value['quantity'];
                $product = Product::find($value['product_id']);
                $product->total = $product->total - ($value['quantity'] - $oldProducts[$value['product_id']]);
                $product->save();
                $records  = StockRecord::where('imageable_id',$id)
                                        ->where('type','加工领料')
                                        ->where('product_id',$value['product_id'])->first();
                $records->update($value);
            }
            $change = StockChange::find($id);
            $change->total = $total;
            $change->update();
            return Redirect::to('admin/manufacture/collects')
                ->withFlashSuccess('加工单领料记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $collect = StockChange::find($id);
        $collect->delete();
        return Redirect::to('admin/manufacture/collects')
            ->withFlashSuccess('加工单领料记录删除成功！');
    }
}