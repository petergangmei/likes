<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NavController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(){

        $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)->get();		
    
    return view('Nav/NavMenu')->with('unread', $unread);
	
	}

	public function edit_profile(){
	$userdetail = DB::table('users')->where('id', auth()->user()->id)->first();
	return view('setting/edit_profile')
			->with('userdetail', $userdetail);
	}

	public function account_setting(){
		$settings = DB::table('users')
					->where('id', auth()->user()->id)
					->first();
	return view('setting/account_setting')
				->with('currentsetting', $settings);
	}
}

