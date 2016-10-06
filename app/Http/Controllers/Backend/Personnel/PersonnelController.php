<?php namespace App\Http\Controllers\Backend\Personnel;

use Session;
use Redirect;
use App\Models\Client\Client;
use App\Models\System\SystemOption;
use App\Models\Personnel\Personnel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StorePersonnelRequest;

class PersonnelController extends Controller {

    public function index()
    {  
        $client = Personnel::Client()->get();
        $personnel = Personnel::Worker()->get();
        $all = Personnel::Active()->get();
        return view('backend.personnel.personnel.index',compact('supplier','client','personnel','all'));
    }

    public function create()
    {
        return view('backend.personnel.personnel.create')
            ->withClients(Client::all());
    }

    public function store(StorePersonnelRequest $request)
    {
        $content = $request->all();
        if ($content['company'] == '') {
            $content['type'] = '员工';
        }else{
            $type = Client::where('id',$content['company'])->first();
            $typename = SystemOption::find($type->type)->name;
            $content['type'] = $typename;
        }
        // dd($content);
        if (Personnel::create($content)) {
            return Redirect::to('admin/personnel/personnels')
                ->withFlashSuccess('人员信息创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.personnel.personnel.show')
            ->withPersonnel(Personnel::find($id));
    }

    public function edit($id)
    {
        return view('backend.personnel.personnel.edit')
            ->withPersonnel(Personnel::find($id))
            ->withClients(Client::all());
    }

    public function update(StorePersonnelRequest $request,$id)
    {
        $Personnel = Personnel::find($id);
        if ($Personnel->update($request->all())) {
            return Redirect::to('admin/personnel/personnels')
                ->withFlashSuccess('人员信息更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $Personnel = Personnel::find($id);
        $Personnel->delete();
        return Redirect::to('admin/personnel/personnels')
            ->withFlashSuccess('人员信息删除成功！');
    }
}
