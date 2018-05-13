<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\RequestAccepted;
use App\User;


class NotificationController extends Controller
{

	Public function view(){
		return view('notification/notificationlist');
	}
    Public function notify(){

    	// auth()->user()->notify(new RequestAccepted());

    	return view('notification');
    }
}
