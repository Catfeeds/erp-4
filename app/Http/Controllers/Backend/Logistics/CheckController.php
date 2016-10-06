<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\System\Option;
use App\Models\Logistics\Product;
use App\Models\Access\User\User;
use App\Models\Logistics\Check;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\Purchase;
use App\Models\Logistics\PurchaseDetail;
use App\Models\Logistics\CheckDetail;
use App\Http\Requests\Backend\Luster\StoreCheckRequest;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class CheckController extends Controller {
    public function index()
    {
        $alls = Check::alls()->get();
        $alls->map(function($item,$key){
            $item->No = $key + 1;
            $item->product = Product::find($item->product_id)->name;
            $item->supplier = Client::find($item->supplier_id)->name;
            $item->date = $item->date;
            $item->creator = User::find($item->creator_id)->name;
            $item->state = Option::find($item->state)->name;
            $item->show = '<a class= "btn btn-success btn-xs" href = "/admin/logistics/purchases/'.$item->id.'">详情</a>';

        });
        $returns = Check::Returns()->get();
        $worksheets = Check::worksheets()->get();
        $purchases = Check::purchases()->get();
        return view('backend.logistics.check.index',compact('alls'))
            ->withchecks(Check::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        $checkNumber = $this->makeCheckNumber();
        $supplys = Client::supplier()->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('backend.logistics.check.create',compact('checkNumber','date','supplys'));
    }

    public function store(StoreCheckRequest $request)
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
        if (Check::create($item)) {
            foreach ($products as $key => $value) {
                $detail['check_id'] = Check::max('id');
                $detail['product_id'] = $value['product_id'];
                $detail['quantity_buy'] = $value['quantity'];
                CheckDetail::create($detail);
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
            return Redirect::to('admin/logistics/checks')
                ->withFlashSuccess('采购订单创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $check = Check::find($id);
        $details = CheckDetail::where('check_id',$id)->get();
        $details->map(function($item,$key){
            $item->No = $key+1;
            $item->product_number = Product::find($item->product_id)->number;
            $item->product_name = Product::find($item->product_id)->name;
            $item->product_standard = Product::find($item->product_id)->standard;
            $item->unit = Product::find($item->product_id)->unit->name;
            $item->remnant = $item->quantity_buy - $item->quantity_stock;
        });
        // dd($check);
        return view('backend.logistics.check.show',compact('check','details'));
    }

    public function edit($id)
    {
        return view('backend.logistics.check.edit')
            ->withcheck(Check::find($id));
    }

    public function update(StoreCheckRequest $request,$id)
    {
        $check = Check::find($id);
          if ($check->update($request->all())) {
            return Redirect::to('admin/logistics/checks')->withFlashSuccess('客户更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $check = Check::find($id);
        $check->delete();
        return Redirect::to('admin/logistics/checks')
            ->withFlashSuccess('客户删除成功！');
    }
}
