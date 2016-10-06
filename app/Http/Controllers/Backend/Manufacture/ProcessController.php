<?php namespace App\Http\Controllers\Backend\Manufacture;

use Session;
use Redirect;
use App\Models\Manufacture\Process;
use App\Http\Requests\Backend\Luster\StoreProcessRequest;
use App\Http\Controllers\Backend\Manufacture\BaseController as Controller;

class ProcessController extends Controller {

    public function index()
    {
        return view('backend.manufacture.process.index')
            ->withProcesses(Process::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.manufacture.process.create');
    }

    public function store(StoreProcessRequest $request)
    { 
        if (Process::create($request->all())) {
            return Redirect::to('admin/manufacture/processes')
                ->withFlashSuccess('工序名称创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.manufacture.process.show')
            ->withProcess(Process::find($id));
    }

    public function edit($id)
    {
        return view('backend.manufacture.process.edit')
            ->withProcess(Process::find($id));
    }

    public function update(StoreProcessRequest $request,$id)
    {
        $process = Process::find($id);
          if ($process->update($request->all())) {
            return Redirect::to('admin/manufacture/processes')
                ->withFlashSuccess('工序名称更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $proceses = Process::find($id);
        $proceses->delete();
        return Redirect::to('admin/manufacture/processes')
            ->withFlashSuccess('工序名称删除成功！');
    }
}
