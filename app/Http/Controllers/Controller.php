<?php namespace App\Http\Controllers;

use App\Models\Logistics\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacture\ManufacturePlan;
use App\Models\Manufacture\Worksheet;
use App\Models\Manufacture\Stucture;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController {
	use DispatchesJobs, ValidatesRequests;

}
