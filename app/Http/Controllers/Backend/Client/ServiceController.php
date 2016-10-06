<?php namespace App\Http\Controllers\Backend\Client;

use Illuminate\Http\Request;

use Session;
use Redirect;
use App\Models\Client\Client;
use App\Models\Client\Service;
use App\Models\Client\Service_status;
use App\Models\Personnel\Personnel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreServiceRequest;

class ServiceController extends Controller {

    public function index()
    {
        return view('backend.client.service.index')
            ->withServices(Service::paginate(config('access.users.default_per_page',1)));       
    }

    public function create()
    {
        $personnels = Personnel::all();
        $clients = Client::client()->get();
        return view('backend.client.service.create' , compact('personnels','clients'));
    }

    public function store(StoreServiceRequest $request)
    {
        if (Service::create($request->all())) {
            return Redirect::to('admin/client/services')
                ->withFlashSuccess('服务创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.client.service.show')
            ->withService(Service::find($id));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $clients = Client::client()->get();
        $approvers = Personnel::worker()->get();
        $personnels = Personnel::all();
        return view('backend.client.service.edit',compact('service' , 'clients' , 'approvers' , 'personnels'));
    }
    public function update(StoreServiceRequest $request,$id)
    {
        $service = Service::find($id);
          if ($service->update($request->all())) {
            return Redirect::to('admin/client/services')
                ->withFlashSuccess('服务更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return Redirect::to('admin/client/services')
            ->withFlashSuccess('服务更新成功！');
    }
}
