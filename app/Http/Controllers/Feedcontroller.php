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

    return view('feeds/newsfeed')->with('unread', $unread);
   }

   public function myfeeds(){
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

        $post = DB::table('post')
        ->where('user_id', auth()->user()->id)
        ->get();

   	return view('feeds/myfeeds')
    ->with('unread', $unread)
    ->with('post', $post);
   }

    public function addfeed(){

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

      return view('feeds/addfeed')->with('unread', $unread);

    }

    public function post_feed(Request $request){
      DB::table('post')
      ->insert([
        'user_id' => auth()->user()->id,
        'user_name' => auth()->user()->name,
        'post' => $request->post,
        'created_at' => now(),
      ]);

      return redirect('myfeeds');
    }

    public function like_post(Request $request){
      $dacheck = DB::table('likes')
      ->where('user_id', auth()->user()->id)
      ->where('post_id', $request->post_id)
      ->get();

      if(count($dacheck) == 0){
      DB::table('likes')
      ->insert([
        'user_id' => auth()->user()->id,
        'post_id' => $request->post_id,
      ]);
      }else{

        DB::table('likes')
        ->where('user_id', auth()->user()->id)
        ->where('post_id', $request->post_id)
        ->delete();

      }




      return 3;
    }
}
