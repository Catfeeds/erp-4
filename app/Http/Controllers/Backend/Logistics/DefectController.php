<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use App\Models\Logistics\Defect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreDefectRequest;

class DefectController extends Controller {

    public function index()
    {
        return view('backend.logistics.defect.index')
            ->withDefects(Defect::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.logistics.defect.create');
    }

    public function store(StoreDefectRequest $request)
    { 
        if (Defect::create($request->all())) {
            return Redirect::to('admin/luster/defects')
                ->withFlashSuccess('不良品名称创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.defect.show')
            ->withDefect(Defect::find($id));
    }

    public function edit($id)
    {
        return view('backend.logistics.defect.edit')
            ->withDefect(Defect::find($id));
    }

    public function update(StoreDefectRequest $request,$id)
    {
        $defect = Defect::find($id);
          if ($defect->update($request->all())) {
            return Redirect::to('admin/logistics/defects')
                ->withFlashSuccess('不良品名称更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $defect = Defect::find($id);
        $defect->delete();
        return Redirect::to('admin/logistics/defects')
            ->withFlashSuccess('不良品名称删除成功！');
    }
}
