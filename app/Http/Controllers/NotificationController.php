<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\RequestAccepted;
use App\User;
use DB;

class NotificationController extends Controller
{

	Public function view(){
		$user = DB::table('notification')->get();

		return view('notification/notificationlist')->with('user', $user);
	}

    	// auth()->user()->notify(new RequestAccepted());
    Public function notify(){

    	DB::table('customnotification')
    	->insert([
    		'user_id' => auth()->user()->id,
    		'visitor_id' => '1',
    		'data' => 'Peter accepted your request',
    		'read' => 'unread',
    		'type'=> 'request',
    		'at' => '1233434'
    	]);
    	return view('notification');
    }
}
