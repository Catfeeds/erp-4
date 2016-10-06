<?php namespace App\Http\Controllers\Backend\System;

use Session;
use Redirect;
use Storage;
use App\Models\System\Option;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreSystemOptionRequest;

class OptionController extends Controller {

    public function getOption($id){
        $data = Option::find($id);
        return $data;
    }

    //可以对数组进行目录树操作
    function genTree($lists,$id) {
        $tree = array(); //格式化好的树
        $items = array();
        for ($i=0; $i < count($lists); $i++) { 
            $items[$i +1] = $lists[$i];
        }
        foreach ($items as $key=>$item)
            // dd($item);
            if (isset($items[$item['parent_id']])){
                $items[$item['parent_id']]['son'][] = &$items[$item['id']];
            }
            else{
                $tree[] = &$items[$item['id']];
            }
        return $list[] = $tree[$id];
    }   

    public function index($id=0)
    {   
        $lists = Option::all()->toarray();
        $tree = $this->genTree($lists,$id);
        return view('backend.system.option.index',compact('tree'));

    }

    public function store(StoreSystemOptionRequest $request)
    {
        if (Option::create($request->all())) {
            return Redirect::to('admin/system/options')
                ->withFlashSuccess('系统选项创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function update(StoreSystemOptionRequest $request,$id)
    {
        $option = Option::find($id);
        if ($option->update($request->all())) {
            return Redirect::to('admin/system/options')
                ->withFlashSuccess('系统选项更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
    
    // public function destroy($id)
    // {
    //     $option = Option::find($id);
    //     $option->delete();
    //     return Redirect::to('admin/luster/options?page='. Session::get('currentPage'))
    //         ->withFlashSuccess('系统选项删除成功！');
    // }
}
