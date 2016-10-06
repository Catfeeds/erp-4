<?php namespace App\Http\Controllers\Backend\Report;

use App\Models\Luster\Product;
use App\Models\Luster\Import;
use App\Models\Luster\Export;
use App\Models\Luster\Storehouse;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

	public function getMenu()
	{
		return view('backend.luster.report.menu');
	}
	

    public function stock($name, $method)
    {   
        switch ($name) {
             //库存报警
            case 'alarm': 
                switch ($method) {
                    case 'all':
                        $list = 'all';
                        $i = 1;
                        return view('backend.luster.report.stock.alarm',compact('list', 'i'))
                            ->withProducts(Product::where('depository',config('luster.default_storehouse'))->paginate(config('access.users.default_per_page')));
                        break;
                    case 'low':
                        $list = 'low';
                        $i = 1;
                        return view('backend.luster.report.stock.alarm',compact('list', 'i'))
                            ->withProducts(Product::where('depository',config('luster.default_storehouse'))->paginate(config('access.users.default_per_page')));
                        break;
                    case 'high':
                        $list = 'high';
                        $i = 1;
                        return view('backend.luster.report.stock.alarm',compact('list', 'i'))
                            ->withProducts(Product::where('depository',config('luster.default_storehouse'))->paginate(config('access.users.default_per_page')));
                        break;
                    
                    default:
                        
                        break;
                }
                break;

            case 'collect':
                switch ($method) {
                    case 'all':
                        $type = '所有部品';
                        return view('backend.luster.report.stock.collect',compact('type'))
                            ->withProducts(Product::paginate(config('access.users.default_per_page')));
                        break;
                    case 'in':
                        $type  = '社内';
                        return view('backend.luster.report.stock.collect', compact('type'))
                            ->withProducts(Product::where('depository',config('luster.default_storehouse'))->paginate(config('access.users.default_per_page')));
                    case 'out':
                        $type  = '社外';
                        return view('backend.luster.report.stock.collect', compact('type'))
                            ->withProducts(Product::where('depository','社外')->paginate(config('access.users.default_per_page')));
                        break;
                    
                    default:
                        $type  = '其它';
                        return view('backend.luster.report.stock.collect', compact('type'))
                            ->withProducts(Product::where('depository','其它')->paginate(config('access.users.default_per_page')));
                        break;
                }
                break;
                //库存列表
            case 'list':
                switch ($method) {
                    case 'all':
                        $type  = '所有部品';
                        return view('backend.luster.report.stock.list', compact('type'))
                            ->withProducts(Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->paginate(config('access.users.default_per_page')));
                        break;
                    case 'final':
                        $type  = '成品';
                        return view('backend.luster.report.stock.list' , compact('type'))
                            ->withProducts(Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->where('type','成品')->paginate(config('access.users.default_per_page')));
                        break;
                    case 'subassembly':
                        $type  = '组件';
                        return view('backend.luster.report.stock.list' , compact('type'))
                            ->withProducts(Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->where('type','组件')->paginate(config('access.users.default_per_page')));
                        break;
                    case 'part':
                        $type  = '零件';
                        return view('backend.luster.report.stock.list' , compact('type'))
                            ->withProducts(Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->where('type','零件')->paginate(config('access.users.default_per_page')));
                        break;
                    case 'material':
                        $type  = '原材料';
                        return view('backend.luster.report.stock.list' , compact('type'))
                            ->withProducts(Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->where('type','原材料')->paginate(config('access.users.default_per_page')));
                        break;
                    case 'in':
                        $type = '入库';
                        $imports = (Import::where('type','入库')->paginate(config('access.users.default_per_page')));
                        return view('backend.luster.report.stock.listin', compact('type', 'imports'));
                        break;
                    case 'out':
                        $type = '出库';
                        $exports = (Export::where('type','出库')->paginate(config('access.users.default_per_page')));
                        return view('backend.luster.report.stock.listout', compact('type', 'exports'));
                        break;
                    
                    default:
                        
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
