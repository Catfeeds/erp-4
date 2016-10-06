<?php namespace App\Http\Controllers\Backend\Logistics;

use Redirect;
use App\Models\Logistics\Storehouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreStorehouseRequest;

class StorehouseController extends Controller {

    public function index()
    {
        return view('backend.logistics.storehouse.index')
            ->withStorehouses(Storehouse::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.logistics.storehouse.create');
    }

    public function store(StoreStorehouseRequest $request)
    { 
        if (Storehouse::create($request->all())) {
            return Redirect::to('admin/logistics/storehouses')
                ->withFlashSuccess('仓库名称创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.storehouse.show')
            ->withStorehouse(Storehouse::find($id));
    }

    public function edit($id)
    {
        return view('backend.logistics.storehouse.edit')
            ->withStorehouse(Storehouse::find($id));
    }

    public function update(StoreStorehouseRequest $request,$id)
    {
        $storehouse = Storehouse::find($id);
          if ($storehouse->update($request->all())) {
            return Redirect::to('admin/logistics/storehouses')
                ->withFlashSuccess('仓库名称更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $storehouse = Storehouse::find($id);
        $storehouse->delete();
        return Redirect::to('admin/logistics/storehouses')
            ->withFlashSuccess('仓库名称删除成功！');
    }
}
