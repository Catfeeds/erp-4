<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use App\Models\Logistics\Defective;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreDefectiveRequest;

class DefectiveController extends Controller {

    public function index()
    {
        return view('backend.logistics.defective.index')
            ->withDefectives(Defective::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.logistics.defective.create');
    }

    public function store(StoreDefectiveRequest $request)
    { 
        dd($request->all());
        if (Defective::create($request->all())) {
            return Redirect::to('admin/logistics/defectives')
                ->withFlashSuccess('不良品创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.defective.show')
            ->withDefective(Defective::find($id));
    }

    public function edit($id)
    {
        return view('backend.logistics.defective.edit')
            ->withDefective(Defective::find($id));
    }

    public function update(StoreDefectiveRequest $request,$id)
    {
        $defective = Defective::find($id);
          if ($defective->update($request->all())) {
            return Redirect::to('admin/logistics/defectives')
                ->withFlashSuccess('不良品更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $defective = Defective::find($id);
        $defective->delete();
        return Redirect::to('admin/logistics/defectives')
            ->withFlashSuccess('不良品删除成功！');
    }
}
