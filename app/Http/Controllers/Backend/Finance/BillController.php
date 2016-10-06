<?php namespace App\Http\Controllers\Backend\Finance;

use Session;
use Redirect;
use App\Models\Finance\Bill;
use App\Models\Client\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreBillRequest;

class BillController extends Controller {

    public function index()
    {
        return view('backend.finance.bill.index')
            ->withBills(Bill::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        return view('backend.finance.bill.create')->withClients(Client::all());
    }

    public function store(StoreBillRequest $request)
    {
        if (Bill::create($request->all())) {
            return Redirect::to('admin/finance/bills')
                ->withFlashSuccess('票据创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.finance.bill.show')
            ->withBill(Bill::find($id));
    }

    public function edit($id)
    {
        return view('backend.finance.bill.edit')
            ->withBill(Bill::find($id))
            ->withClients(Client::all());
    }

    public function update(StoreBillRequest $request,$id)
    {
        $bill = Bill::find($id);
          if ($bill->update($request->all())) {
            return Redirect::to('admin/finance/bills')   
                ->withFlashSuccess('票据更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return Redirect::to('admin/finance/bills')   
            ->withFlashSuccess('票据删除成功！');
    }
}
