<?php namespace App\Http\Controllers\Backend\Logistics;

use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\System\Option;
use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistics\Application;
use App\Models\Logistics\Purchase;
use App\Models\Logistics\PurchaseDetail;
use App\Models\Logistics\ApplicationDetail;
use App\Http\Controllers\Backend\Logistics\BaseController as Controller;

class LogisticsController extends Controller { 

    public function getApp(){
        $data = Application::where('check',0)->get();
        return $data;
    }
    public function getAppDetail($number){
        $id = Application::where('number',$number)->first()->id;
        $data = ApplicationDetail::unfinish()->where('application_id',$id)->get();
        $data->map(function($item,$key){            
            $item->No = $key + 1;
            $item->appDetailId = $item->id;
            $item->number = $item->product->number;
            $item->name = $item->product->name;
            $item->standard = $item->product->standard;
            $item->unit = Option::find($item->product->unit_id)->name;
        });
        // dd($data);
        return $data;
    }

    public function getPurchaseDetail($purchaseId){
        $id = Application::where('number',$number)->first()->id;
        $data = ApplicationDetail::unfinish()->where('application_id',$id)->get();
        $data->map(function($item,$key){            
            $item->No = $key + 1;
            $item->appDetailId = $item->id;
            $item->number = $item->product->number;
            $item->name = $item->product->name;
            $item->standard = $item->product->standard;
            $item->unit = Option::find($item->product->unit_id)->name;
        });
        // dd($data);
        return $data;
    }

    public function getPurDetail($id){
        $data = PurchaseDetail::where('purchase_id',$id)->get();
        $data->filter(function ($item) {
            return ($item->buy = 123123123);
        });
        $data->map(function($item,$key){            
            $item->No = $key + 1;
            $item->id = $item->product_id;
            $item->number = $item->product->number;
            $item->name = $item->product->name;
            $item->standard = $item->product->standard;
            $item->unit = Option::find($item->product->unit_id)->name;
            $item->supplier = Purchase::find($item->purchase_id)->supplier->company;
        });
        dd($data);
        return $data;
    }

	public function getProducts($name){
		$id = Option::where('name',$name)->first()->id;
		$data = Product::where('purchase_type_id',$id)->get();
		$data->map(function($item,$key){
			$item->No = $key + 1;
            $item->unit = Option::find($item->unit_id)->name;
			$item->quantity = '';
		});
		return $data;
	}
	public function getApplicationJson(request $request){
        $id = $request->input('id');
        // dd($id);
		$data = ApplicationDetail::where('application_id',$id)->get();
		$data->map(function($item){
			$item->product_number = Product::find($item->product_id)->number;
			$item->product_name = Product::find($item->product_id)->name;
			$item->product_unit = Product::find($item->product_id)->unit->name;
			$item->buy_quantity = '';
			$item->stock_quantity = '';
		});
		return $data;
	}
	public function getPurchaseJson(request $request){
        $id = $request->input('id');
		$data = PurchaseDetail::where('purchase_id',$id)->get();
		$data->map(function($item,$key){
			$item->No = $key + 1;
			$item->product_number = Product::find($item->product_id)->number;
			$item->product_name = Product::find($item->product_id)->name;
			$item->product_unit = Product::find($item->product_id)->unit->name;
			$item->remnant = '<b style=" font-size:16px;color:#337ab7">'. ($item->quantity_buy - $item->quantity_stock) .'</b>';
		});
		return $data;
	}

    public function getApplicationId(request $request){
        $number = $request->input('number');
        $id = Application::where('number',$number)->first()->id;
        return $id;
    }

}
