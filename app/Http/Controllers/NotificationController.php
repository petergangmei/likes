<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\RequestAccepted;
use App\Userdetail;
use DB;

class NotificationController extends Controller
{

	Public function view(){
        $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

		$noti = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
		->get();

        DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->update([
            'read' => 'read'
        ]);

		return view('notification/notificationlist')->with('datas', $noti)->with('unread', $unread);
	}

    	// auth()->user()->notify(new RequestAccepted());
    Public function notify(){

    	DB::table('customnotification')
    	->insert([


    	]);
    	return view('notification');
    }
}
