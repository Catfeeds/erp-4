<?php namespace App\Http\Controllers\Backend\Client;

use Redirect;
use Carbon\Carbon;
use App\Models\Client\Client;
use App\Models\Client\Quoteprice;
use App\Models\logistics\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreQuotepriceRequest;

class QuotepriceController extends Controller {

    public function index()
    {
        $quoteprices = Quoteprice::paginate(config('access.users.default_per_page'));
        return view('backend.client.quoteprice.index',compact('quoteprices'));
    }

    public function create()
    {
        $date = Carbon::now()->format('Y-m-d');
        $products = Product::all();
        $suppliers = Client::supplier()->get();
        return view('backend.client.quoteprice.create',compact('suppliers','products','date'));
    }

    public function store(StoreQuotepriceRequest $request)
    {
       if (Quoteprice::create($request->all())) {
            return Redirect::to('admin/client/quoteprices')
                ->withFlashSuccess('报价单创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $quoteprice = Quoteprice::find($id);
        return view('backend.client.quoteprice.show',compact('quoteprice'));
    }

    public function edit($id)
    {
        $quoteprice = Quoteprice::find($id);
        $suppliers = Client::supplier()->get();
        $products = Product::all();
        return view('backend.client.quoteprice.edit',compact('quoteprice','suppliers','products'));
    }

    public function update(StoreQuotepriceRequest $request,$id)
    {
        $quoteprice = Quoteprice::find($id);       
          if ($quoteprice->update($request->all())) {
            return Redirect::to('admin/client/quoteprices')
                ->withFlashSuccess('报价单更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $quoteprice = Quoteprice::find($id);
        $quoteprice->delete();
        return Redirect::to('admin/client/quoteprices')
            ->withFlashSuccess('报价单删除成功！');
    }
}
