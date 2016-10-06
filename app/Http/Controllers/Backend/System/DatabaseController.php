<?php namespace App\Http\Controllers\Backend\System;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use App\Models\Access\Permission\Permission;
use App\Models\Access\Permission\PermissionDependency;
use App\Models\Access\Permission\PermissionGroup;
use App\Models\Access\Role\role;
use App\Models\Access\User\user;
use App\Models\Access\User\UserProvider;

use App\Models\Luster\Alarm;
use App\Models\Luster\Bill;
use App\Models\Luster\Check;
use App\Models\Luster\Classification;
use App\Models\Luster\Client;
use App\Models\Luster\Contact;
use App\Models\Luster\Defect;
use App\Models\Luster\Defective;
use App\Models\Luster\Document;
use App\Models\Luster\Equipment;
use App\Models\Luster\File;
use App\Models\Luster\Flit;
use App\Models\Luster\Flitrecord;
use App\Models\Luster\Stock;
use App\Models\Luster\Invoice;
use App\Models\Luster\Jerque;
use App\Models\Luster\Peraonnel;
use App\Models\Luster\Picture;
use App\Models\Luster\Plan;
use App\Models\Luster\Process;
use App\Models\Luster\Product;
use App\Models\Luster\Personnel;
use App\Models\Luster\Purchase;
use App\Models\Luster\Quoteprice;
use App\Models\Luster\Receive;
use App\Models\Luster\Record;
use App\Models\Luster\Schedule;
use App\Models\Luster\Service;
use App\Models\Luster\Storehouse;
use App\Models\Luster\Stucture;
use App\Models\Luster\Task;

use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;

use App\Models\Other\AssignedRole;
use App\Models\Other\PermissionUser;
use App\Models\Other\PermissionRole;


class DatabaseController extends Controller {

    public function getMenu()
    {
        return view('backend.luster.system.menu');
    }

    public function getCreate(){
    	return view('backend.luster.system.datebase.create');
    }

    public function index($datebase){

    	if($datebase == 'createcontroller'){
			return view('backend.luster.system.datebase.createcontroller');
    	}

    	if($datebase == 'Receive'){
        $contents = Receive::all();
        $plan = Receive::all()->first()->toArray();
        $column = array_keys($plan);
        $col = count($column);
        $ucfirst = 'Receive';
        return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
   		 }

    	switch ($datebase) {
            case 'AssignedRole':
                $contents = AssignedRole::all();
                $plan = AssignedRole::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'AssignedRole';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Bill':
                $contents = Bill::all();
                $plan = Bill::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Bill';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Carrier':
                $contents = Carrier::all();
                $plan = Carrier::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Carrier';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Check':
                $contents = Check::all();
                $plan = Check::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Check';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Classification':
                $contents = Classification::all();
                $plan = Classification::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Classification';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Client':
                $contents = Client::all();
                $plan = Client::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Client';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Defective':
                $contents = Defective::all();
                $plan = Defective::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Defective';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Defect':
                $contents = Defect::all();
                $plan = Defect::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Defect';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Document':
                $contents = Document::all();
                $plan = Document::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Document';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Equipment':
                $contents = Equipment::all();
                $plan = Equipment::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Equipment';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Flitrecord':
                $contents = Flitrecord::all();
                $plan = Flitrecord::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Flitrecord';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Flit':
                $contents = Flit::all();
                $plan = Flit::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Flit';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Invoice':
                $contents = Invoice::all();
                $plan = Invoice::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Invoice';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Jerque':
                $contents = Jerque::all();
                $plan = Jerque::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Jerque';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Message':
                $contents = Message::all();
                $plan = Message::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Message';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Participant':
                $contents = Participant::all();
                $plan = Participant::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Participant';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'PasswordReset':
                $contents = PasswordReset::all();
                $plan = PasswordReset::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'PasswordReset';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Permission':
                $contents = Permission::all();
                $plan = Permission::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Permission';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'PermissionDependency':
                $contents = PermissionDependency::all();
                $plan = PermissionDependency::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'PermissionDependency';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'PermissionGroup':
                $contents = PermissionGroup::all();
                $plan = PermissionGroup::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'PermissionGroup';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'PermissionRole':
                $contents = PermissionRole::all();
                $plan = PermissionRole::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'PermissionRole';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'PermissionUser':
                $contents = PermissionUser::all();
                $plan = PermissionUser::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'PermissionUser';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Personnel':
                $contents = Personnel::all();
                $plan = Personnel::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Personnel';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Picture':
                $contents = Picture::all();
                $plan = Picture::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Picture';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Plan':
                $contents = Plan::all();
                $plan = Plan::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Plan';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Process':
                $contents = Process::all();
                $plan = Process::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Process';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Product':
                $contents = Product::all();
                $plan = Product::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Product';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Purchase':
                $contents = Purchase::all();
                $plan = Purchase::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Purchase';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Quoteprice':
                $contents = Quoteprice::all();
                $plan = Quoteprice::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Quoteprice';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Receife':
                $contents = Receife::all();
                $plan = Receife::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Receife';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Record':
                $contents = Record::all();
                $plan = Record::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Record';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Role':
                $contents = Role::all();
                $plan = Role::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Role';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Schedule':
                $contents = Schedule::all();
                $plan = Schedule::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Schedule';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Service':
                $contents = Service::all();
                $plan = Service::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Service';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Stockrecord':
                $contents = Stockrecord::all();
                $plan = Stockrecord::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Stockrecord';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Stock':
                $contents = Stock::all();
                $plan = Stock::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Stock';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Storehouse':
                $contents = Storehouse::all();
                $plan = Storehouse::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Storehouse';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Stucture':
                $contents = Stucture::all();
                $plan = Stucture::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Stucture';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Task':
                $contents = Task::all();
                $plan = Task::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Task';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'Thread':
                $contents = Thread::all();
                $plan = Thread::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'Thread';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'User':
                $contents = User::all();
                $plan = User::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'User';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;

            case 'UserProvider':
                $contents = UserProvider::all();
                $plan = UserProvider::all()->first()->toArray();
                $column = array_keys($plan);
                $col = count($column);
                $ucfirst = 'UserProvider';
                return view('backend.luster.system.datebase.datebase',compact('column','col','ucfirst','contents'));
                break;
    		default:
    			# code...
    			break;
    	}
    }
}
