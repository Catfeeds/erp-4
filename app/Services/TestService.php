<?php 
namespace App\Services;
use App\Contracts\TestContract;

class TestService implements TestContract
{
	Public function callMe($controller)
	{
		dd('Call Me From TestServiceProvider In '.$controller);
	}
	Public function getMe($controller)
	{
		dd('Get Me From TestServiceProvider In '.$controller);
	}
}