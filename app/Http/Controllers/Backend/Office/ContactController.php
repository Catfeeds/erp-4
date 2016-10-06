<?php namespace App\Http\Controllers\Backend\Office;

use Session;
use Redirect;
use App\Models\System\SystemOption;
use App\Models\Office\Contact;
use App\Models\Logistics\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreContactRequest;

class ContactController extends Controller {

    public function index()
    {
        $insides= Contact::InSide()->get();
        $outsides = Contact::OutSide()->get();
        $contacts = Contact::Active()->get();
        return view('backend.office.contact.index',compact('insides','outsides','contacts'));
    }

    // public function create()
    // {
    //     $clients = Client::all();
    //     $clientType = SystemOption::clientType()->get();
    //     return view('backend.luster.client.contact.create', compact('clients','clientType'));
    // }

    // public function store(StoreContactRequest $request)
    // {
    //     if (Contact::create($request->all())) {
    //         return Redirect::to('admin/luster/contacts')
    //             ->withFlashSuccess('联系人创建成功！');
    //     } else {
    //         return Redirect::back()->withInput()->withErrors('保存失败！');
    //     }
    // }

    // public function show($id)
    // {
    //     return view('backend.luster.client.contact.show')
    //         ->withContact(Contact::find($id));
    // }

    // public function edit($id)
    // {
    //     $contact = Contact::find($id);
    //     return view('backend.luster.client.contact.edit',compact('clients' , 'contact'));
    // }

    // public function update(StoreContactRequest $request,$id)
    // {
    //     $contact = Contact::find($id);
    //     if ($contact->update($request->all())) {
    //         return Redirect::to('admin/luster/contacts?page='. Session::get('currentPage'))
    //             ->withFlashSuccess('联系人更新成功！');
    //     } else {
    //         return Redirect::back()->withInput()->withErrors('保存失败！');
    //     }
    // }

    // public function destroy($id)
    // {
    //     $contact = Contact::find($id);
    //     $contact->delete();
    //     return Redirect::to('admin/luster/contacts?page='. Session::get('currentPage'))
    //         ->withFlashSuccess('联系人删除成功！');
    // }
}
