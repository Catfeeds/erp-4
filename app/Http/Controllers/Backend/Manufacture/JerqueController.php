<?php namespace App\Http\Controllers\Backend\Manufacture;

use Session;
use Redirect;
use App\Models\Logistics\Defect;
use App\Models\Manufacture\Check;
use App\Models\Logistics\Product;
use App\Models\Logistics\Defective;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Plan;
use App\Http\Requests\Backend\Luster\StoreJerqueRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class JerqueController extends Controller {

    public function index()
    {
        $jerques = Check::where('type','生产入库')->paginate(config('access.users.default_per_page'));
        return view('backend.manufacture.jerque.index',compact('jerques'));
    }

    public function create()
    {
        $worksheets = Worksheet::where('type','加工单')->where('state_id',18)->get();
        $worksheets->map(function($item){
            $item->productName = $item->plan->product->name;
            $item->productUnit = $item->plan->product->unit->name;
            $item->quantity = $item->plan->quantity;
            $item->remnant = $item->plan->quantity - $item->plan->finish;
        });
        $procucts = Product::all();
        $number = $this->makeCheckNumber();
        return view('backend.manufacture.jerque.create',compact('worksheets','products','number'));
    }

    public function store(StoreJerqueRequest $request)
    {   
        $content = $request->all();
        $content['creator_id'] = Auth::id();
        $content['type'] = '生产入库';
        $content['product_id'] = Worksheet::find($content['worksheet_id'])->plan->product_id;
        $worksheet = Worksheet::find($content['worksheet_id']);
        $plan = Plan::find($worksheet->plan_id);
        $plan->finish = $plan->finish + $content['accept'];
        if ($plan->finish >= $plan->quantity) {
            $plan->state_id = 19;
            $worksheet->state_id = 19;
        }
        $worksheet->save();
        $plan->save();
        $product = Product::find($content['product_id']);
        $product->total = $product->total + $content['accept'];
        $product->save();
        array_forget($content, 'worksheet_id');
        if (Check::create($content)) {
            return Redirect::to('admin/manufacture/jerques')
                ->withFlashSuccess('生产入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $jerque = Jerque::find($id);
        $defectives = Defective::with('hasOneDefect')->where('number',$jerque['number'])->get();
        return view('backend.manufacture.jerque.show',compact('jerque','defectives'));
    }

    public function edit($id)
    {
        $defects    = Defect::all();
        $products   = Product::all();
        $jerque     = Jerque::find($id);
        $defectives = Defective::where('number' , $jerque['number'])->get();
        return view('backend.manufacture.jerque.edit',
            compact('defects' , 'products' , 'jerque' , 'defectives'));
    }

    public function update(StoreJerqueRequest $request,$id)
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
            return Redirect::to('admin/manufacture/jerques')
            ->withFlashSuccess('部品检查记录更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $jerque = Jerque::find($id);
        $jerque->delete();
        return Redirect::to('admin/manufacture/jerques')
            ->withFlashSuccess('部品检查记录删除成功！');
    }
}
