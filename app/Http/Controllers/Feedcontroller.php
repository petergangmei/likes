<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Feedcontroller extends Controller
{

   public function feeds(){
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

    return view('pages/newsfeed')->with('unread', $unread);
   }

   public function myfeeds(){
   	
   	return view('pages/myfeeds');
   }

    public function addfeed(){

    }
}
