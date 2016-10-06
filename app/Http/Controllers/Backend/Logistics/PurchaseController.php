<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\System\Option;
use App\Models\Logistics\Product;
use App\Models\Access\User\User;
use App\Models\Logistics\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\Application;
use App\Models\Logistics\ApplicationDetail;
use App\Models\Logistics\PurchaseDetail;
use App\Http\Requests\Backend\Luster\StorePurchaseRequest;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class PurchaseController extends Controller {

    public function getPurchaseId(request $request){
        $number = $request->input('number');
        $id = Purchase::where('number',$number)->first()->id;
        return $id;
    }

    public function index()
    {
        $alls = Purchase::alls()->get();
        $alls->map(function($item,$key){
            $item->No = $key + 1;
            $item->supplier = Client::find($item->supplier_id)->name;
            $item->creator = User::find($item->creator_id)->name;
            $item->stateStock = Option::find($item->state_stock)->name;
            $item->statePayment = Option::find($item->state_payment)->name;
            $item->arrivalDate = $item->arrival_date;
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/logistics/purchases/'.$item->id.'">详情</a>';
        });
        $finishs = Purchase::finishs()->get();
        $finishs->map(function($item,$key){
            $item->No = $key + 1;
            $item->supplier = Client::find($item->supplier_id)->name;
            $item->creator = User::find($item->creator_id)->name;
            $item->stateStock = Option::find($item->state_stock)->name;
            $item->statePayment = Option::find($item->state_payment)->name;
            $item->arrivalDate = $item->arrival_date;
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/logistics/purchases/'.$item->id.'">详情</a>';
        });
        $unfinishs = Purchase::unfinishs()->get();
        $unfinishs->map(function($item,$key){
            $item->No = $key + 1;
            $item->number = '<span class="purchase_number">'.$item->number.'</span>';
            $item->supplier = Client::find($item->supplier_id)->name;
            $item->creator = User::find($item->creator_id)->name;
            $item->stateStock = '<a class="stateStock btn btn-success btn-xs">'.Option::find($item->state_stock)->name.'</a>';
            $item->statePayment = '<a class="statePayment btn btn-success btn-xs">'.Option::find($item->state_payment)->name.'</a>';
            $item->arrivalDate = '<a class="arrivalDate btn btn-success btn-xs">'.$item->arrival_date.'</a>';
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/logistics/purchases/'.$item->id.'">详情</a>';
        });
        // dd($unfinishs);
        return view('backend.logistics.purchase.index',compact('alls','finishs','unfinishs'))
            ->withPurchases(Purchase::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        $purchaseNumber = $this->makePurchaseNumber();
        $date = Carbon::now()->format('Y-m-d');

        //模态框选择左侧列表
        $iApp = 0;
        $iPlan = 0;
        $array_apps = array("text"=>"采购申请单","nodes"=>array());
        $array_plans = array("text"=>"计划采购单","nodes"=>array());
        $array_products = array("text"=>"采购分类","nodes"=>array());
        $products_app = array();
        $products_plan = array();
        $supplys = Client::supplier()->get();
        $applications = Application::unfinish()->where('type_id',346)->get();
        foreach ($applications as $key => $value) {
            $array_apps["nodes"][$key]["text"] = $value->number;
            $array = ApplicationDetail::unfinish()->where('application_id',$value->id)->get();
            foreach ($array as $val) {
                // dd($val);
                $products_app[$iApp]['No'] = $iApp + 1;
                $products_app[$iApp]['appDetailId'] = $val->id;
                $products_app[$iApp]['id'] = $val->product->id;
                $products_app[$iApp]['number'] = $val->product->number;
                $products_app[$iApp]['name'] = $val->product->name;
                $products_app[$iApp]['standard'] = $val->product->standard;
                $products_app[$iApp]['unit'] = $val->product->unit->name;
                $products_app[$iApp]['quantity'] = $val->quantity;
                $iApp++;
            }
        }
        $products_app = json_encode($products_app);
        $json_apps = '['.json_encode($array_apps).']';
        $plans = Application::unfinish()->where('type_id',347)->get();
        foreach ($plans as $key => $value) {
            $array_plans["nodes"][$key]["text"] = $value->number;
            $array = ApplicationDetail::unfinish()->where('application_id',$value->id)->get();
            foreach ($array as $val) {
                $products_plan[$iPlan]['No'] = $iPlan + 1;
                $products_plan[$iPlan]['appDetailId'] = $val->id;
                $products_plan[$iPlan]['id'] = $val->product->id;
                $products_plan[$iPlan]['number'] = $val->product->number;
                $products_plan[$iPlan]['name'] = $val->product->name;
                $products_plan[$iPlan]['standard'] = $val->product->standard;
                $products_plan[$iPlan]['unit'] = $val->product->unit->name;
                $products_plan[$iPlan]['quantity'] = $val->quantity;
                $iPlan++;
            }
        }
        $products_plan = json_encode($products_plan);
        $json_plans = '['.json_encode($array_plans).']';
        $products = Product::purchase()->get();
        $products->map(function($item,$key){
            $item->No = $key +1 ;
            $item->unit = Option::find($item->unit_id)->name;
            $item->quantity = '';
        });
        foreach ($products as $ProId=>$product) {
            if (!empty($array_products["nodes"])) {
                $state=0;
                foreach ($array_products["nodes"] as  $key=>$value) {
                    if ($value['text'] != $product->purchaseType->name) {
                        continue;
                    }else{
                        $state = 1;
                        break;
                    }
                }
                if($state == 1){
                    continue;
                }else{
                    $array_products["nodes"][$ProId]["text"] = $product->purchaseType->name;
                }
            }else{
                $array_products["nodes"][$ProId]["text"] = $product->purchaseType->name;
                $array_products["state"]["expanded"] = true;
            }
           
        }
        // dd($array_products);
        $json_products = '['.json_encode($array_products).']';
        return view('backend.logistics.purchase.create',compact('purchaseNumber','date','products','supplys','products_app','products_plan','json_apps','json_plans','json_products'));
    }

    public function store(StorePurchaseRequest $request)
    {
        $content = array();
        $detail = array();
        $item = $request->all();
        // dd($item);
        if (empty($item['supplier_id'])) {
            return Redirect::back()->withInput()->withErrors('"客户/供应商" 不能为空，刷新网页后重新填写!!!');
        }
        $item['creator_id'] = Auth::id();
        $item['state_stock'] = 71;
        $item['state_payment'] = 260;
        $item['total'] = 0;
        if (!empty($item['products'])) {
            $products = $item['products'];
            foreach ($products as $key => $value) {
                $item['total'] += $value['quantity'];
                if($value['quantity'] != ''){
                    continue;
                }else{
                    return Redirect::back()->withInput()->withErrors('数量不能为空，请添加！！！');
                }
            }
        }else{
            return Redirect::back()->withInput()->withErrors('订单商品不能为空，请添加！！！');
        }
        $item = array_except($item, 'products');
        // dd($item);
        if (Purchase::create($item)) {
            foreach ($products as $key => $value) {
                $detail['purchase_id'] = Purchase::max('id');
                $detail['product_id'] = $value['product_id'];
                $detail['quantity_buy'] = $value['quantity'];
                PurchaseDetail::create($detail);
                if (!empty($value['appDetailId']) && $value['appDetailId'] != 'undefined') {
                    $state = ApplicationDetail::find($value['appDetailId']);
                    // dd($value);
                    $state->state_buy = 1;
                    $state->save();
                    $this->setApplicationState($state->application_id);
                }
                if(!empty($content)){
                    foreach ($content as $k => $v) {
                        if($v['product_id'] != $value['product_id']){
                            $content[$key] = $value;
                            continue;
                        }else{
                            $content[$k]['quantity'] = $value['quantity'] + $v['quantity'];
                            break;
                        }
                    }
                }else{
                    $content[$key] = $value;
                }
            }
            return Redirect::to('admin/logistics/purchases')
                ->withFlashSuccess('采购订单创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);
        $details = PurchaseDetail::where('purchase_id',$id)->get();
        $details->map(function($item,$key){
            $item->No = $key+1;
            $item->product_number = Product::find($item->product_id)->number;
            $item->product_name = Product::find($item->product_id)->name;
            $item->product_standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit->name;
            $item->remnant = $item->quantity_buy - $item->quantity_stock;
        });
        // dd($purchase);
        return view('backend.logistics.purchase.show',compact('purchase','details'));
    }

    public function edit($id)
    {
        return view('backend.logistics.purchase.edit')
            ->withPurchase(Purchase::find($id));
    }

    public function update(StorePurchaseRequest $request,$id)
    {
        $purchase = Purchase::find($id);
          if ($purchase->update($request->all())) {
            return Redirect::to('admin/logistics/purchases')->withFlashSuccess('客户更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
        return Redirect::to('admin/logistics/purchases')
            ->withFlashSuccess('客户删除成功！');
    }
}
