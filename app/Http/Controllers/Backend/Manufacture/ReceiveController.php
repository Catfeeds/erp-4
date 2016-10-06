<?php namespace App\Http\Controllers\Backend\Manufacture;

use Redirect;
use App\Models\Logistics\Defect;
use App\Models\Manufacture\Check;
use App\Models\Logistics\Product;
use App\Models\Logistics\Defective;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Plan;
use App\Http\Requests\Backend\Luster\StoreReceiveRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class ReceiveController extends Controller {

    public function index()
    {
        $receives  = Check::where('type','委外入库')->paginate(config('access.users.default_per_page'));
        return view('backend.manufacture.receive.index',compact('receives'));
    }

    public function create()
    {
        $worksheets = Worksheet::where('type','委外加工单')->where('state_id',18)->get();
        $worksheets->map(function($item){
            $item->productName = $item->plan->product->name;
            $item->productUnit = $item->plan->product->unit->name;
            $item->productName = $item->plan->product->name;
            $item->quantity = $item->plan->quantity;
            $item->remnant = $item->plan->quantity - $item->plan->finish;
        });
        $procucts = Product::all();
        $defects = Defect::all();
        $number = $this->makeCheckNumber();
        return view('backend.manufacture.receive.create',compact('worksheets','products','defects','number'));
    }

    public function store(StoreReceiveRequest $request)
    {   
        $content = $request->all();
        // dd($content);
        $content['creator_id'] = Auth::id();
        $content['type'] = '委外入库';
        $content['product_id'] = Worksheet::find($content['worksheet_id'])->plan->product_id;
        $content['supplier_id'] = Worksheet::find($content['worksheet_id'])->supplier_id;
        $worksheet = Worksheet::find($content['worksheet_id']);
        $plan = Plan::find($worksheet->plan_id);
        $plan->finish = $plan->finish + $content['accept'];
        if ($plan->finish >= $plan->quantity) {
            $plan->state_id = 19;
            $worksheet->operator_id = Auth::id();
            $worksheet->state_id = 19;
        }
        $worksheet->save();
        $plan->save();
        $product = Product::find($content['product_id']);
        $product->total = $product->total + $content['accept'];
        $product->save();
        array_forget($content, 'worksheet_id');
        if (Check::create($content)) {
            return Redirect::to('admin/manufacture/receives')
                ->withFlashSuccess('委外入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $receive = Check::find($id);
        $defectives = Defective::with('hasOneDefect')->where('number',$receive['number'])->get();
        return view('backend.luster.manufacture.receive.show',compact('receive','defectives'));
    }

    public function edit($id)
    {
        $defects = Defect::all();
        $products = Product::all();
        $receive = Receive::find($id);
        $defectives = Defective::where('number' , $receive['number'])->get();
        return view('backend.manufacture.receive.edit',
            compact('defects' , 'products' , 'receive' , 'defectives'));
    }

    public function update(StoreReceiveRequest $request,$id)
    {
        $receive = Receive::find($id);
        $content = $request->all();
        $defectives = Defective::where('number' , $receive['number'])->get();
        foreach ($defectives as  $key=>$defective) {
            $defective = Defective::find($defective['id']);
            $defective['quantity'] = $content['quantity'.$key];
            $defective['remark']   = $content['remark'.$key];
            $defective->update();
        } 
        $defectives = Defective::where('number' , $receive['number'])->get();
        foreach ($defectives as $defective) {
            $content['defective']=$content['defective']+$defective['quantity'];
        }
        $content['total'] = $content['accept']+$content['defective'];
        $content['proportion'] = (int)($content['accept'] / $content['total'] * 100) . '%';
        if ($receive->update($content)) {
            return Redirect::to('admin/manufacture/receives?page='. Session::get('currentPage'))
            ->withFlashSuccess('委外入库记录更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $receive = Receive::find($id);
        $receive->delete();
        return Redirect::to('admin/manufacture/receives')
            ->withFlashSuccess('委外入库记录删除成功！');
    }
}
