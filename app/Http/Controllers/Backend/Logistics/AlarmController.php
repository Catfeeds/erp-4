<?php namespace App\Http\Controllers\Backend\Logistics;

use Redirect;
use App\Models\Client\Client;
use App\Models\Logistics\Alarm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreProductRequest;

class AlarmController extends Controller {    

    public function getAlarm()
    {   
        $type  = '全部';
        $i = 1;
        return view('backend.logistics.alarm.index' , compact('type' , 'i'))
            ->withProducts(Alarm::all());
    }
    public function getFinal()
    {   
        $type  = '成品';
        $i = 1;
        return view('backend.logistics.alarm.index' , compact('type' , 'i'))
            ->withProducts(Alarm::with('hasOnePicture')->where('type','成品')->paginate(config('access.users.default_per_page')));
    }

    public function getSubassembly()
    {  
        $type  = '组件';
        $i = 1;
        return view('backend.logistics.alarm.index' , compact('type' , 'i'))
            ->withProducts(Alarm::with('hasOnePicture')->where('type','组件')->paginate(config('access.users.default_per_page')));
    }

    public function getPart()
    {   
        $type  = '零件';
        $i = 1;
        return view('backend.logistics.alarm.index' , compact('type' , 'i'))
            ->withProducts(Alarm::with('hasOnePicture')->where('type','零件')->paginate(config('access.users.default_per_page')));
    } 

    public function getMaterial()
    {   
        $type  = '原材料';
        $i = 1;
        return view('backend.logistics.alarm.index' , compact('type' , 'i'))
            ->withProducts(Alarm::with('image')->where('type','原材料')->paginate(config('access.users.default_per_page')));
    }

    public function index()
    {   
        $all = Alarm::all();
        $type  = '全部';
        $i = 1;
        $products = Alarm::paginate(config('access.users.default_per_page'));
        return view('backend.logistics.alarm.index' , compact('type','i','products'));
    }

    public function edit($id)
    {
        $product = Alarm::find($id);
        $supplys = Client::where('type_id',118)->get();
        return view('backend.logistics.alarm.edit' , compact('product','supplys'));
    }

    public function update(StoreProductRequest $request,$id)
    {
        // dd($request->all());
        $product = Alarm::find($id);
          if ($product->update($request->all())) {
            return Redirect::to('admin/logistics/alarms')
                ->withFlashSuccess('部品报警更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
}
