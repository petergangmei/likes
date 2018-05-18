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
        ->orderBy('id', 'desc')
        ->get();

   	return view('feeds/myfeeds')
    ->with('unread', $unread)
    ->with('post', $post);
   }

   public function view_post($id){
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();
        $post = DB::table('post')
        ->where('id', $id)
        ->first();

        $comments = DB::table('comment')
        ->where('post_id', $id)
        ->get();

    return view('feeds/viewpost')
    ->with('post', $post)
    ->with('unread', $unread)
    ->with('comments', $comments);
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
      // update like count +
      $checklike = DB::table('likes')
      ->where('post_id', $request->post_id)
      ->get();
      $count = $checklike->count();
      if($count == 1){
        $newcount = '1';
      }else{
      $newcount = $count + '1';
      }
      DB::table('post')
      ->where('id', $request->post_id)
      ->update([
        'likes' => $newcount,
      ]);

      }else{

      // update like count -
     $checklike = DB::table('likes')
      ->where('post_id', $request->post_id)
      ->get();
      $count = $checklike->count();
      if($count == 1){
        $newcount = '0';
      }else{
      $newcount = $count - '1';
      }
      DB::table('post')
      ->where('id', $request->post_id)
      ->update([
        'likes' => $newcount,
      ]);

        DB::table('likes')
        ->where('user_id', auth()->user()->id)
        ->where('post_id', $request->post_id)
        ->delete();
      }
      return 3;
    }

    public function post_comment(Request $request){
      DB::table('comment')
      ->insert([
        'post_id' => $request->postid,
        'user_id' => auth()->user()->id,
        'user_name' => auth()->user()->name,
        'comment' => $request->comment,
        'created_at' => now()
      ]);

       $dacheck = DB::table('comment')
      ->where('user_id', auth()->user()->id)
      ->where('post_id', $request->postid)
      ->get();

      $dacheckcomment = DB::table('post')
      ->where('user_id', auth()->user()->id)
      ->where('id', $request->postid)
      ->first();


      if($dacheckcomment->comments == 0){

        $commentcount = '1';

      }else{

      $count = $dacheck->count();

        $commentcount = $dacheckcomment->comments + '1';

      }

      DB::table('post')
      ->where('user_id', auth()->user()->id)
      ->where('id', $request->postid)
      ->update([
        'comments' => $commentcount
      ]);

      $id = $request->postid;
      return redirect('/viewpost'.$id);
    }

    public function delete_post($id){

      DB::table('post')
      ->where('id', $id)
      ->delete();

      return redirect('/myfeeds');
    }
}
