<?php namespace App\Http\Controllers\Backend\Client;

use Session;
use Redirect;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\System\Option;
use App\Http\Requests\Backend\Luster\StoreClientRequest;

class ClientController extends Controller {

    public function index()
    {  
        $types = Option::clientType()->get();
        $sources = Option::clientSource()->get();
        return view('backend.client.client.index',compact('types','sources'))
            ->withClients(Client::paginate(config('access.users.default_per_page',1)));
    }

    public function create()
    {
        $types = Option::clientType()->get();
        $sources = Option::clientSource()->get();
        return view('backend.client.client.create',compact('types','sources'));
    }

    public function store(StoreClientRequest $request)
    { 
        if (Client::create($request->all())) {
            return Redirect::to('admin/client/clients')
                ->withFlashSuccess('客户创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.client.client.show')
            ->withClient(Client::find($id));
    }

    public function edit($id)
    {
        $types = Option::clientType()->get();
        $sources = Option::clientSource()->get();
        $client = Client::find($id);
        return view('backend.client.client.edit',compact('client','types','sources'));
    }

    public function update(StoreClientRequest $request,$id)
    {
        $client = Client::find($id);
        if ($client->update($request->all())) {
            return Redirect::to('admin/client/clients')
                ->withFlashSuccess('客户更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return Redirect::to('admin/client/clients')
            ->withFlashSuccess('客户删除成功！');
    }

}
