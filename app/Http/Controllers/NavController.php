<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NavController extends Controller
{
	public function index(){

        $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)->get();		
    
    return view('Nav/NavMenu')->with('unread', $unread);
	
	}
}

