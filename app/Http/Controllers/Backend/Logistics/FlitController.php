<?php namespace App\Http\Controllers\Backend\Logistics;

use Session;
use Redirect;
use App\Models\Logistics\Flit;
use App\Models\Logistics\Flitrecord;
use App\Models\Logistics\Storehouse;
use App\Models\Logistics\Product;
use App\Models\Personnel\Personnel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Luster\StoreFlitRequest;

class FlitController extends Controller {

    public function index()
    {
        return view('backend.logistics.flit.index')
            ->withflits(Flit::paginate(config('access.users.default_per_page')));
    }

    public function create()
    {
        $personnels = Personnel::all();
        $storehouse = Storehouse::all();
        $products = Product::where('depository','1')->get();
        return view('backend.logistics.flit.create', 
            compact('storehouse','personnels','products' ));
    }

    public function store(StoreFlitRequest $request)
    {   
        $content = $request->all();
        if ($content['out'] == $content['in']) {
            return Redirect::back()->withInput()->withErrors('调出仓库与拨入仓库不能相同！');
        }
        // dd($content);
        $content['number'] = date('Ymdhis');
        for ($i=1; $i < 11; $i++) { 
            if ($content['quantity'.$i]) {
                $storeout = Product::where('depository',$content['out'])->where('number', $content['flitrecord'.$i])->first();
                if ($storeout['total'] - $content['quantity'.$i] < 0) {
                    return Redirect::back()->withInput()->withErrors($storeout['name'].'库存不足');
                }
                $storein = Product::where('depository',$content['in'])->where('number', $content['flitrecord'.$i])->first();
                if ($storein == null) {
                    return Redirect::back()->withInput()->withErrors('“拨入仓库”中不存在'.$storeout['name']);
                }
            }
        }
        for ($i=1;$i<11;$i++) {
            if($content['quantity'.$i]) {
                $flitrecord = new flitrecord;
                $flitrecord['number']   = $content['number'];
                $flitrecord['product_number']  = $content['flitrecord'.$i];
                $flitrecord['quantity'] = $content['quantity'.$i];
                $flitrecord['unit']     = $content['unit'];
                $flitrecord['remark']   = $content['remark'.$i];
                $flitrecord->save();

                $storeout = Product::where('depository',$content['out'])->where('number', $content['flitrecord'.$i])->first();
                $storeout['total'] = $storeout['total'] - $content['quantity'.$i];
                $storeout->save();

                $storein = Product::where('depository',$content['in'])->where('number', $content['flitrecord'.$i])->first();
                $storein['total'] = $storein['total'] + $content['quantity'.$i];
                $storein->save();
        // dd($storein);

            };
        }

        // dd($content);
        if (Flit::create($content)) {
            return Redirect::to('admin/logistics/flits')
                ->withFlashSuccess('采购入库记录创建成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show($id)
    {
        $flit = Flit::find($id);
        $flitrecords = Flitrecord::where('number',$flit['id'])->get();
        // dd($flitrecords);
        return view('backend.logistics.flit.show',compact('flit','flitrecords'));
    }

    public function edit($id)
    {
        $products = Product::where('depository','1')->get();
        $personnels = Personnel::all();
        $flit = Flit::find($id);
        $storehouses = Storehouse::all();
        $flitrecords = Flitrecord::where('number' , $flit['number'])->get();
        return view('backend.logistics.flit.edit',
            compact('defects' , 'products','personnels' , 'flit' , 'flitrecords', 'storehouses'));
    }

    public function update(StoreFlitRequest $request,$id)
    {
        $flit = Flit::find($id);
        $content = $request->all();
        $flitrecords = flitrecord::where('number' , $flit['number'])->get();
        foreach ($flitrecords as  $key=>$flitrecord) {
            $value = $content['quantity'.$key] - $flitrecord['quantity'];
            $flitrecord['quantity'] = $content['quantity'.$key];
            $flitrecord['remark']   = $content['remark'.$key];

            $storeout = Product::where('depository',$content['out'])->where('number', $content['productname'.$key])->first();
            $storeout['total'] = $storeout['total'] - $value;
            $storeout->save();

            $storein = Product::where('depository',$content['in'])->where('number', $content['productname'.$key])->first();
            $storein['total'] = $storein['total'] + $value;
            $storein->save();
        } 

        if ($flit->update($content)) {
            return Redirect::to('admin/logistics/flits')
            ->withFlashSuccess('采购入库记录更新成功！');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $flit = Flit::find($id);
        $flit->delete();
        return Redirect::to('admin/logistics/flits')
            ->withFlashSuccess('采购入库记录删除成功！');
    }
}
