<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use Carbon\Carbon;
use App\Models\Client\Client;
use App\Models\Logistics\Defect;
use App\Models\Logistics\Entry;
use App\Models\Logistics\Check;
use App\Models\Logistics\StockChange;
use App\Models\Logistics\Purchase;
use App\Models\Logistics\PurchaseDetail;
use App\Models\Logistics\Product;
use App\Models\Logistics\Defective;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Luster\StoreEntryRequest;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class EntryController extends Controller {

    public function index()
    {
        $entrys = StockChange::where('type','采购入库')->paginate(config('access.users.default_per_page'));
        return view('backend.logistics.entry.index',compact('entrys'));
    }

    public function create()
    {
        $worksheets = Purchase::unfinishs()->get();
        $procucts = Product::all();
        $suppliers = Client::supplier()->get();
        $number = $this->makeEntryNumber();
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('backend.logistics.entry.create',compact('worksheets','products', 'number','nowDate'));
    }

    public function store(StoreEntryRequest $request)
    {   
        $products = array();
        $content = $request->all();
        $content['worksheet_id'] = $content['purchase_id'];
        $content['creator_id'] = Auth::id();
        $content['type'] = '采购入库';
        $content['supplier_id'] = Client::where('company',$content['supplier_id'])->first()->id;
        $content['total'] = 0;
        foreach ($content['products'] as $value) {
            // dd($value);
            if (!empty($value['quantity'])) {
                $content['total'] = $value['quantity'] + $content['total'];
            }else{
                return Redirect::back()->withInput()->withErrors('入库数量不能为空,刷新网页后重新填写！！！');
            }
        }
        $products = $content['products'];
        $purchase_id = $content['purchase_id'];
        // dd($content);
        array_forget($content, 'products');
        array_forget($content, 'purchase_id');
        if (StockChange::create($content)) {
            foreach ($products as $key => $value) {
                $update_detail = PurchaseDetail::where('purchase_id',$purchase_id)->where('product_id',$value['product_id'])->first();
                $update_detail->quantity_stock = $value['quantity'];
                $update_detail->save();
                $update_stock = Product::find($value['product_id']);
                $update_stock->total = $update_stock->total + $value['quantity'];
                $update_stock->save();
            }
            return Redirect::to('admin/logistics/entrys')
                ->withFlashSuccess('采购入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $jerque = Jerque::find($id);
        $defectives = Defective::with('hasOneDefect')->where('number',$jerque['number'])->get();
        return view('backend.logistics.entry.show',compact('jerque','defectives'));
    }

    public function edit($id)
    {
        $defects    = Defect::all();
        $products   = Product::all();
        $jerque     = Jerque::find($id);
        $defectives = Defective::where('number' , $jerque['number'])->get();
        return view('backend.logistics.entry.edit',
            compact('defects' , 'products' , 'jerque' , 'defectives'));
    }

    public function update(StoreEntryRequest $request,$id)
    {
        $jerque = Jerque::find($id);
        $content = $request->all();
        $defectives = Defective::where('number' , $jerque['number'])->get();
        foreach ($defectives as  $key=>$defective) {
            $defective = Defective::find($defective['id']);
            $defective['quantity'] = $content['quantity'.$key];
            $defective['remark']   = $content['remark'.$key];
            $defective->update();
        } 
        $defectives = Defective::where('number' , $jerque['number'])->get();
        foreach ($defectives as $defective) {
            $content['defective']=$content['defective']+$defective['quantity'];
        }
        $content['total'] = $content['accept']+$content['defective'];
        $content['proportion'] = (int)($content['accept'] / $content['total'] * 100) . '%';
        if ($jerque->update($content)) {
            return Redirect::to('admin/logistics/entrys')
            ->withFlashSuccess('部品检查记录更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $jerque = Jerque::find($id);
        $jerque->delete();
        return Redirect::to('admin/logistics/entrys')
            ->withFlashSuccess('部品检查记录删除成功！');
    }
}
