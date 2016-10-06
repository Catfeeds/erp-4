<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Models\Luster\client;
class TestController extends Controller
{

    public function index()
    {
        $users = client::all();
        // dd ($users);
        // echo $users;
        foreach ($users as  $key=>$value) {
            $value=json_decode($value, true);
            // echo $value;

   dd ($value);
            foreach ($value as $key => $value) {
                // dd($value);
                // echo $key = $value;

               echo "Key=" . $key . ", Value=" . $value;
               echo "<br>";

            }
        }
       
    }
 
}
