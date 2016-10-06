<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\Office\Memo;
use App\Models\System\SystemOption;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Luster\StoreMemoRequest;

class MemoController extends Controller
{
    public function index()
    {   
        $memos = Memo::Own()->get();
        return view('backend.office.memo.index',compact('memos'));
    }
    public function show($id)
    {
        $memo = Memo::find($id);
        return view('backend.office.memo.show', compact('memo'));
    }
    public function create()
    {
        return view('backend.office.memo.create');
    }

    public function edit($id)
    {
        return view('backend.office.memo.edit')
            ->withMemo(Memo::find($id));
    }
    public function store(StoreMemoRequest $request)
    {
        $memo = $request->all();
        $memo['user_id'] = Auth::id();
        dd($memo);
        if (Memo::create($memo)) {
            return Redirect::to('admin/office/memos')
                ->withFlashSuccess('备忘录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
    public function update(StoreMemoRequest $request, $id)
    {
        $memo = Memo::find($id);
          if ($memo->update($request->all())) {
            return Redirect::to('admin/office/memos')
                ->withFlashSuccess('备忘录更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
        public function destroy($id)
    {
        $memo = memo::find($id);
        $memo->delete();
        return Redirect::to('admin/office/memos')
            ->withFlashSuccess('备忘录删除成功！');
    }
}

