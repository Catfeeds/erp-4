<?php namespace App\Http\Controllers\Backend\Equipment;

use Session;
use Redirect;
use App\Models\Finance\Bill;
use App\Models\System\SystemOption;
use App\Models\Equipment\Equipment;
use App\Models\Personnel\Personnel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreEquipmentRequest;

class EquipmentController extends Controller {

    public function index()
    {
        return view('backend.equipment.equipment.index')
            ->withEquipments(Equipment::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        $assetstypes = SystemOption::AssetsType()->get();
        $bills = Bill::all();
        $workers = Personnel::worker()->get();
        return view('backend.equipment.equipment.create',compact('assetstypes','bills','workers'));
    }

    public function store(StoreEquipmentRequest $request)
    {
        $contents = $request->all();
        // $contents['number'] =  ;
        $contents['creator'] = Auth::id();
        if (Equipment::create($contents)) {
            return Redirect::to('admin/equipment/equipments')
                ->withFlashSuccess('设备信息创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.equipment.equipment.show')
            ->withEquipment(Equipment::find($id));
    }

    public function edit($id)
    {
        $assetstypes = SystemOption::AssetsType()->get();
        $bills = Bill::all();
        $workers = Personnel::worker()->get();
        $equipment = Equipment::find($id);
        return view('backend.equipment.equipment.edit',compact('assetstypes','bills','workers','equipment'));
    }

    public function update(StoreEquipmentRequest $request,$id)
    {
        $table = Equipment::find($id);
        $contents = $request->all();
        dd($contents);
        if ($table->update($request->all())) {
            return Redirect::to('admin/equipments')
                ->withFlashSuccess('设备信息更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }

    }

    public function destroy($id)
    {
        $table = Equipment::find($id);
        $table->delete();
        return Redirect::to('admin/luster/equipments?page='. Session::get('currentPage'))
            ->withFlashSuccess('设备信息删除成功！');
    }

    public function getMenu()
    {
        return view('backend.luster.equipment.menu');
    }

}
