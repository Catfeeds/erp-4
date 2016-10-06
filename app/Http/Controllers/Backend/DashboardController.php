<?php namespace App\Http\Controllers\Backend;

use App\Models\Luster\Menu;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller {

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('backend.dashboard');
	}	
	public function getClient()
	{
        return view('backend.includes.menu.client');
	}	
	public function getEquipment()
	{
        return view('backend.includes.menu.equipment');
	}	
	public function getFinance()
	{
        return view('backend.includes.menu.finance');
	}	
	public function getLogistics()
	{
        return view('backend.includes.menu.logistics');
	}	
	public function getManufacture()
	{
        return view('backend.includes.menu.manufacture');
	}	
	public function getOffice()
	{
        return view('backend.includes.menu.office');
	}	
	public function getPersonnel()
	{
        return view('backend.includes.menu.personnel');
	}	
	public function getReport()
	{
        return view('backend.includes.menu.report');
	}	
	public function getSystem()
	{
        return view('backend.includes.menu.system');
	}
}