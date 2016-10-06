<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\Office\Email;
use App\Models\Access\User\User;
use App\Models\System\SystemOption;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreEmailRequest;

class EmailController extends Controller
{
    public function index()
    {   
        $ins = Email::inputEmail()->paginate(config('access.users.default_per_page'));
        $outs = Email::outEmail()->paginate(config('access.users.default_per_page'));
        return view('backend.office.email.index', compact('ins','outs'));
    }
    public function show($id)
    {
        $email = Email::find($id);
        return view('backend.office.email.show', compact('email'));
    }
    public function create()
    {
        $users = User::all();
        return view('backend.office.email.create',compact('users'));
    }

    public function edit($id)
    {
        $users = User::all();
        return view('backend.office.email.edit',compact('users'))
            ->withEmail(Email::find($id));
    }
    public function store(StoreEmailRequest $request)
    {
        $email = $request->all();
        $email['user_id'] = Auth::id();
        if (Email::create($request->all())) {
            return Redirect::to('admin/office/emails')
                ->withFlashSuccess('邮件创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
    public function update(StoreEmailRequest $request ,$id)
    {
        $mail = Email::find($id);
        $email = $request->all();
        $email['user_id'] = Auth::id();
        if ($mail->update($email)) {
            return Redirect::to('admin/office/emails')
                ->withFlashSuccess('邮伯更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }
        public function destroy($id)
    {
        $email = Email::find($id);
        $email->delete();
        return Redirect::to('admin/office/emails')
            ->withFlashSuccess('邮件录删除成功！');
    }
}

