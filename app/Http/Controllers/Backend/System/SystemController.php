<?php namespace App\Http\Controllers\Backend\System;

use Redirect;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;


class SystemController extends Controller {


    public function Menu()
    {
        return view('backend.luster.system.menu');
    }
    public function User($name){

    	switch ($name) {
    		case 'information':
    			return view('backend.luster.system.user.information')
					->withUser(auth()->user());
    			break;
    		case 'avatar':
    			return view('backend.luster.system.user.profile.avatar')
					->withUser(auth()->user());
    			break;    		
    		case 'theme':
    			return view('backend.luster.system.user.profile.theme')
					->withUser(auth()->user());
    		case 'edit':
    			return view('backend.luster.system.user.profile.edit')
					->withUser(auth()->user());
    		case 'change':
    			return view('backend.luster.system.user.profile.change-password')
					->withUser(auth()->user());
    			break;
    		default:
    			break;
    	}
    }

    public function Theme($color){

    	switch ($color) {
    		case 'blue':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'blue';
    			$theme->update();
    			return Redirect::back();
    			break;
    		case 'red':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'red';
    			$theme->update();
    			return Redirect::back();
    			break;    		
    		case 'black':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'black';
    			$theme->update();
    			return Redirect::back();
    		case 'purple':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'purple';
    			$theme->update();
    			return Redirect::back();
    		case 'green':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'green';
    			$theme->update();
    			return Redirect::back();
    			break;
    		case 'yellow':
    			$id = auth()->user()->id;
    			$theme = User::find($id);
    			$theme->theme = 'yellow';
    			$theme->update();
    			return Redirect::back();
    			break;
    		default:
    			break;
    	}
    }

}
