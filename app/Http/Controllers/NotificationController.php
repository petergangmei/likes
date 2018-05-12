<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\RequestAccepted;
use App\User;


class NotificationController extends Controller
{
    Public function notify(){

    	auth()->user()->notify(new RequestAccepted());

    	return view('notification');
    }
}
