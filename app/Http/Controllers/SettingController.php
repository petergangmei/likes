<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function update_profile(Request $request){
    	DB::table('users')
    	->where('id', auth()->user()->id)
    	->update([
    		'name' => $request->name,
    		'location' => $request->location,
    		'country' =>  $request->country,
    		'email' => $request->email
    	]);
    	return 123;
    }
    public function update_accountSetting(Request $request){
        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update([
            'message_privacy' => $request->message_privacy,
            'message_privacy2' => $request->message_privacy2,
            'comment_privacy' => $request->comment_privacy
        ]);
        return 123;
    }
    public function update_accountStatus(Request $request){
        DB::table('users')
        ->where('id', auth()->user()->id)
        ->update([
            'account_status' => $request->account_status,
            'account_adTime' => now()
        ]);
        return 123;  
    }
}
