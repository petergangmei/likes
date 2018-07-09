<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
       public function Event_swipes(){

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();


    return view('Events/events_index')
          ->with('unread', $unread);
   }

  


  public function taptapevent_index(){

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

  $newusers = DB::table('users')
              ->where('id', '!=', auth()->user()->id)
              ->where('profile_image', '!=', 'null')
              ->where('gender', '!=', auth()->user()->gender)
              ->orderBy('created_at', 'DESC')
              ->paginate(20);      

    $mypref = DB::table('users')->where('id', auth()->user()->id)->first();
    return view('events/taptap_index')
          ->with('mypref', $mypref)
          ->with('users', $newusers)
          ->with('unread', $unread);
   }
}
