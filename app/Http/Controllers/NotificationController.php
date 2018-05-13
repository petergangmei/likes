<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\RequestAccepted;
use App\User;


class NotificationController extends Controller
{
<<<<<<< HEAD

	Public function view(){
		return view('notification/notificationlist');
	}
    Public function notify(){

    	// auth()->user()->notify(new RequestAccepted());
=======
    Public function notify(){

    	auth()->user()->notify(new RequestAccepted());
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34

    	return view('notification');
    }
}
