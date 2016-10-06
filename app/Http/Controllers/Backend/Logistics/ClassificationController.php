<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use App\Models\System\Option;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreClassificationRequest;

class ClassificationController extends Controller {

    public function index()
    {
        $classifications = Option::productType()->get();
        return view('backend.logistics.classification.index',compact('classifications'));
    }

    public function create()
    {
        return view('backend.logistics.classification.create');
    }

    public function store(StoreClassificationRequest $request)
    { 
        $tag = 'productType';
        $content = $request->all();
        $content['parent_tag'] = Option::where('tag',$tag)->first()->tag;
        $content['parent_id'] = Option::where('tag',$tag)->first()->id;
        // dd($content);
        if (Option::create($content)) {
            return Redirect::to('admin/logistics/classifications')
                ->withFlashSuccess('产品分类创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.classification.show')
            ->withClassification(Option::find($id));
    }

    public function edit($id)
    {
        return view('backend.logistics.classification.edit')
            ->withClassification(Option::find($id));
    }

    public function update(StoreClassificationRequest $request,$id)
    {
        $classification = Option::find($id);
          if ($classification->update($request->all())) {
            return Redirect::to('admin/logistics/classifications')
                ->withFlashSuccess('产品分类更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $classification = Option::find($id);
        $classification->delete();
        return Redirect::to('admin/logistics/classifications')
            ->withFlashSuccess('产品分类删除成功！');
    }
}
