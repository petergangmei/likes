<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ChatController extends Controller
{

	public function messageindex($username, $id){
        $supercheck = DB::table('chats')->get();

    	$check1 = DB::table('chats')
    	->where('uid1', auth()->user()->id )
    	->where('uid2', $id)
    	->get();
    	$ckk1 = DB::table('chats')
    	->where('uid1', auth()->user()->id )
    	->where('uid2', $id)
    	->first();

    	if(count($check1)>0){
		$message = DB::table('chats_messages')
		->where('chat_id', $ckk1->chat_id)
		->orderBy('created_at')
		->get();
    	}else{
    	$message = DB::table('chats_messages')
		->where('chat_id', '0')
		->orderBy('created_at')
		->get();

    	}

    	$userimg = DB::table('users')
    	->where('id', $id)
    	->first();
		// $chat = DB::table('chats')
		// ->where('created_at', 'DESC')
		// ->where('uid1', auth()->user()->id)
		// ->where('uid2', $id)
		// ->first();

		return view('chat/messageindex')
		->with('username', $username)
		->with('messages', $message)
		->with('uid2', $id)
		->with('user2', $username)
		->with('userimg', $userimg);			


	}

    public function sendMessage(Request $request){

        $supercheck = DB::table('chats')->get();
        if(count($supercheck)>0){

        // check if sender and receiver id is avilale in chats table
    	$check1 = DB::table('chats')
    	->where('uid1', auth()->user()->id)
    	->where('uid2', $request->uid2)
    	->get();

    	$check11 = DB::table('chats')
    	->where('uid1', $request->uid2)
    	->where('uid2',  auth()->user()->id)
    	->first();

    	if(count($check1)> 0){
    		DB::table('chats')
    		->where('uid1', $request->uid2)
    		->where('uid2', auth()->user()->id)
    		->update([
    			'seen' => 'unseen',
                'created_at' => now()
    		]);
    	}else{
    	
 $rdm = rand(0,9);
 $tim = time();
 $ui = auth()->user()->id;
 $date = date('Ymd');
 $dfb  = auth()->user()->year;
 $cid =  $ui . $date . $dfb . $rdm . $tim  ;

    		DB::table('chats')
    		->insert([
    			'chat_id' => $cid,
    			'user1' => auth()->user()->name,
    			'user2' => $request->user2,
    			'uid1' => auth()->user()->id,
    			'uid2' => $request->uid2,
    			'seen' => 'unseen',
    			'created_at' => now()
    		]);
    		DB::table('chats')
    		->insert([
    			'chat_id' => $cid,
    			'user1' => $request->user2,
    			'user2' => auth()->user()->name,
    			'uid1' => $request->uid2,
    			'uid2' => auth()->user()->id,
    			'seen' => 'unseen',
    			'created_at' => now()    			
    		]);

    	}

    	$check2 = DB::table('chats')
    	->where('uid1', auth()->user()->id )
    	->where('uid2', $request->uid2)
    	->first();

    	DB::table('chats_messages')
    	->insert([
    	'chat_id' => $check2->chat_id,
    	'sender_username' => auth()->user()->name,
    	'message' => $request->message,
    	'seen' => 'unseen',
    	'created_at' => now()
    	]);


    	return 123;
        
        }else{

 $rdm = rand(0,9);
 $tim = time();
 $ui = auth()->user()->id;
 $date = date('Ymd');
 $dfb  = auth()->user()->year;
 $cid =  $ui . $date . $dfb .  $rdm . $tim;

            DB::table('chats')
            ->insert([
                'chat_id' => $cid,
                'user1' => auth()->user()->name,
                'user2' => $request->user2,
                'uid1' => auth()->user()->id,
                'uid2' => $request->uid2,
                'seen' => 'unseen',
                'created_at' => now()
            ]);
            DB::table('chats')
            ->insert([
                'chat_id' => $cid,
                'user1' => $request->user2,
                'user2' => auth()->user()->name,
                'uid1' => $request->uid2,
                'uid2' => auth()->user()->id,
                'seen' => 'unseen',
                'created_at' => now()               
            ]);

        $check2 = DB::table('chats')
        ->where('uid1', auth()->user()->id )
        ->where('uid2', $request->uid2)
        ->first();

        DB::table('chats_messages')
        ->insert([
        'chat_id' => $check2->chat_id,
        'sender_username' => auth()->user()->name,
        'message' => $request->message,
        'seen' => 'unseen',
        'created_at' => now()
        ]);

        return 234;

        }

    }

    public function checkunseen(Request $request){

        // check any data available in chats table
        $supercheck = DB::table('chats')->get();

        if(count($supercheck)>0){

        // get the chat id for sender and receiver
    	$getcid = DB::table('chats')
    	->where('uid1', auth()->user()->id)
    	->where('uid2', $request->uid2)
    	->first();

        // check if message is available in chat_messages table is unseen
    	$checkunseen = DB::table('chats_messages')
    	->where('chat_id', $getcid->chat_id)
    	->where('sender_username', '!=', auth()->user()->name)
    	->where('seen', 'unseen')
    	->get();

        // check if the message in the chats table is seen or unseen
    	$checkunseen2 = $checkunseen = DB::table('chats')
    	->where('chat_id', $getcid->chat_id)
    	->where('uid1',  auth()->user()->id)
    	->where('seen', 'unseen')
    	->get();

    	if(count($checkunseen2)>0){
    	DB::table('chats')
    		->where('chat_id', $getcid->chat_id)
    		->where('uid1', auth()->user()->id)
    		->update([
    			'seen' => 'seen'
    		]); 
    	}else{

    	}

    	if(count($checkunseen)>0){
    		DB::table('chats_messages')
    		->where('chat_id', $getcid->chat_id)
    		->update([
    			'seen' => 'seen'
    		]);

    	
    		$result = "available";

    	}else{
    		$result = "none";
    	}
    	return $result;

        }else{
             $result = 'none';
        }

    }



    public function check_inbox(Request $request){
    	$check = DB::table('chats')
    	->where('uid1', auth()->user()->id)
    	->where('seen', 'unseen')
    	->get();

    	if(count($check) > 0){
    		$data = 'available';
    	}else{
    		$data = 'none';

    	}
    	return $data;
    }

    public function messages_list(){
    	$messageslist = DB::table('chats')
    	->where('uid1', auth()->user()->id)
    	->orderBy('created_at', 'DESC')
    	->get();
    	$user2 = DB::table('users')
    	->get();
    	return view('chat/messageslist')
    	->with('messages', $messageslist)
    	->with('user2', $user2);
    }
}
