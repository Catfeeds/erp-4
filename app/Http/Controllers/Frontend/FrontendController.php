<?php namespace App\Http\Controllers\Frontend;

use \App\Models\Luster\System\Menu;
use \App\Models\Luster\Product;
use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		javascript()->put([
			'test' => 'it works!'
		]);

		return view('frontend.index');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}

	public function manufacture()
	{
		$menus = Menu::all();
		// dd($menus);
		return view('frontend.manufacture',compact('subassemblys','products','parts'));
	}

	public function constant()
	{
		$parts = Product::with('hasOnePicture')->where('depository',config('luster.default_storehouse'))->get();
		return view('frontend.constant',compact('parts'));
	}

	public function instruction()
	{
		return view('frontend.instruction');
	}
	
	public function contrast()
	{
		return view('frontend.contrast');
	}
	
	public function analyze()
	{
		return view('frontend.analyze');
	}
}