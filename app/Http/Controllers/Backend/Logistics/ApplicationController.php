<?php namespace App\Http\Controllers\Backend\Logistics;

use Redirect;
use Carbon\Carbon;
use App\Models\Logistics\Product;
use App\Models\System\Option;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\Application;
use App\Models\Logistics\ApplicationDetail;
use App\Http\Requests\Backend\Luster\StoreApplicationRequest;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class ApplicationController extends Controller
{
    public function index(){
        $alls = Application::alls();
        $alls->map(function($item){
            $item->state_id = $item->state->name;
            $item->type = $item->type->name;
            $item->number = '<b class="application_number">'.$item->number.'</b>';
            $item->creater = '<b class="creator">'.$item->creator->name.'</b>';
            $item->show = '<a class="view btn btn-success btn-xs">详情</a>';
        });
        $finishs = Application::finish()->get();
        $finishs->map(function($item){
            $item->state_id = $item->state->name;
            $item->number = '<b class="application_number">'.$item->number.'</b>';
            $item->creater = '<b class="creator">'.$item->creator->name.'</b>';
            $item->type = $item->type->name;
            $item->show = '<a class="view btn btn-success btn-xs">详情</a>';
        });
        $unfinishs = Application::unfinish()->get();
        $unfinishs->map(function($item){
            $item->type = Option::find($item->type_id)->name;
            $item->number = '<b class="application_number">'.$item->number.'</b>';
            $item->creater = '<b class="creator">'.$item->creator->name.'</b>';
            $item->state_id = '<a class="state btn btn-success btn-xs">'.$item->state->name.'</a>';
            $item->show = '<a class="view btn btn-success btn-xs">详情</a>';
            $item->end_date = '<a class="end_date btn btn-success btn-xs">'.$item->end_date.'</a>';
            // dd($item);
        });
        return view('backend.logistics.application.index',compact('alls','finishs','unfinishs'));
    }

    public function create(){
        $number = $this->makeApplicationNumber();
        $products = Product::purchase()->get();
        $products->map(function($item){
            $item->unit = Option::find($item->unit_id)->name;
        });
        $nowDate = Carbon::now()->format('Y-m-d');
        return view('backend.logistics.application.create',compact('products','number','nowDate'));
    }

    public function store(StoreApplicationRequest $request){
        $content = $request->all();
        $products = $content['products'];
        $content['state_id'] = 67;
        $content['type_id'] = 346;
        $content['creator_id'] = Auth::id();
        // dd($application);
        $content = array_except($content, 'products');
        if (Application::create($content)) {
            $maxid = Application::max('id');
            if(is_array($products)){
                foreach ($products as $value) {
                    $value['application_id'] = $maxid;
                    // dd($value);
                    ApplicationDetail::create($value);
                }
            }
            $createState = 'ok';
        } 
        if ($createState == 'ok') {
            return Redirect::to('/admin/logistics/applications')->withFlashSuccess('生产计划创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($number)
    {
        $id = Application::where('number',$number)->first()->id;
        $application = Application::find($id);
        $details = ApplicationDetail::where('application_id',$id)->get();
        $details->map(function($item,$key){
            $item->No = $key+1;
            $item->number = Product::find($item->product_id)->number;
            $item->unit = Product::find($item->product_id)->unit->name;
            $item->name = Product::find($item->product_id)->name;
            $item->standard = Product::find($item->product_id)->standard;
        });
        // dd($details);
        return view('backend.logistics.application.show',compact('application','details'));
    }

    public function edit($id){
        $application = Application::find($id);
        $products = Product::module()->get();
        return view('backend.logistics.application.edit',compact('application','products'));
    }

    public function update(StoreApplicationRequest $request,$id)
    {
        $application = Application::find($id);
        if ($application->update($request->all())) {
            return Redirect::to('/admin/logistics/applications')
                ->withFlashSuccess('计划更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();
        return Redirect::to('admin/logistics/applications')
            ->withFlashSuccess('计划删除成功！');
    }

}
