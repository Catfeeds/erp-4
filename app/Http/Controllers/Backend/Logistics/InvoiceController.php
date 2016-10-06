<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use Carbon\Carbon;
use App\Models\System\Option;
use App\Models\Client\Client;
use App\Models\Logistics\Invoice;
use App\Models\Personnel\Personnel;
use App\Models\Logistics\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Luster\StoreInvoiceRequest;

class InvoiceController extends Controller {

    public function index()
    {
        return view('backend.logistics.invoice.index')
            ->withProducts(Product::all())
            ->withInvoices(Invoice::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        $products   = Product::all();
        $clients    = Client::all();
        // $personnels = Personnel::all();
        $expressCompanys = Option::expressCompany()->get();
        $states = Option::invoiceType()->get();
        return view('backend.logistics.invoice.create', compact( 'clients' , 'personnels' , 'products' ,'expressCompanys','states'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        // dd(Auth::id());
        $invoice = $request->all();
        $invoice ['operator'] = Auth::id();
        // dd($invoice);
        if (Invoice::create($invoice)) {
            return Redirect::to('admin/logistics/invoices')
                ->withFlashSuccess('发货单创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        return view('backend.logistics.invoice.show')->withInvoice(Invoice::find($id));
    }

    public function edit($id)
    {
        $expressCompanys = Option::expressCompany()->get();
        $states = Option::invoiceType()->get();
        return view('backend.logistics.invoice.edit',compact('expressCompanys','states'))
            ->withInvoice(Invoice::find($id));
    }

    public function update(StoreInvoiceRequest $request,$id)
    {
        $invoice = Invoice::find($id);
        $content = $request->all();
        // dd($content);
        if ($invoice->update($content)) {
            return Redirect::to('admin/logistics/invoices')->withFlashSuccess('发货单更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $Invoice = Invoice::find($id);
        $Invoice->delete();
        return Redirect::to('admin/logistics/invoices')
            ->withFlashSuccess('发货单更新成功！');
    }
}
