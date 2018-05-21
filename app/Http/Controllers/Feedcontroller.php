<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Feedcontroller extends Controller
{

   public function feeds(){
    $posts = DB::table('post')
    ->orderBy('created_at', 'DESC')
    ->get();

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

    return view('feeds/newsfeed')
    ->with('posts', $posts)
    ->with('unread', $unread);
   }

// view my feeds controller 
   // 
   // 
   // 
   // 
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

// view individual post controller starts here
   // 
   // 
   // 
   // 
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


// add feed section starts here
//  
//
// 
public function addfeed(){

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

      return view('feeds/addfeed')->with('unread', $unread);

    }


// post feed to the data basename
    // 
    // 
    // 
    // 
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

// like post controller starts here
    // 
    // 
    // 
    // 
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
        'created_at' => now(),
      ]);
      // update like count +
      $checklike = DB::table('likes')
      ->where('post_id', $request->post_id)
      ->get();

      $count = $checklike->count();
      if($count == 1){
        $newcount = '1';
      }
      if($count >= 2){
      $newcount = $count;
      }

$uid = DB::table('post')
      ->where('id', $request->post_id)
      ->first();
      $ncount = $count -'1';
      if($count == 1){
      $likenotify =  'liked your post';
      }else{
      $likenotify =  'and other '.$ncount.' person have like your post';
      }

      if($count == 1){

      DB::table('customnotification')
      ->insert([
        'user_id' => $uid->user_id,
        'visitor_id' => auth()->user()->id,
        'visitor_name' => auth()->user()->name,
        'img' => auth()->user()->profile_image,
        'data' => $likenotify,
        'read' => 'unread',
        'type' => 'likes',
        'post_id' => $request->post_id,
        'created_at' => now()
      ]);

      }else{

      DB::table('customnotification')
      ->where('post_id', $request->post_id)
      ->where('type', 'likes')
      ->update([
        'user_id' => $uid->user_id,
        'visitor_id' => auth()->user()->id,
        'visitor_name' => auth()->user()->name,
        'img' => auth()->user()->profile_image,
        'data' => $likenotify,
        'read' => 'unread',
        'type' => 'likes',
        'post_id' => $request->post_id,
        'created_at' => now()
      ]);

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

// post comment in post controller starts here
    // 
    // 
    // 
    // 

public function post_comment(Request $request){
      DB::table('comment')
      ->insert([
        'post_id' => $request->postid,
        'user_id' => auth()->user()->id,
        'user_name' => auth()->user()->name,
        'comment' => $request->comment,
        'created_at' => now()
      ]);

      $getcommentid = DB::table('comment')
      ->where('post_id', $request->postid)
      ->where('user_id', auth()->user()->id)
      ->orderBy('id', 'DESC')
      ->first();

       $dacheck = DB::table('comment')
      ->where('user_id', auth()->user()->id)
      ->where('post_id', $request->postid)
      ->get();

      $dacheckcomment = DB::table('post')
      ->where('user_id', $request->userid)
      ->where('id', $request->postid)
      ->first();

      if($dacheckcomment->comments == 0){
        $commentcount = '1';
      }else{
      $count = $dacheck->count();
        $commentcount = $dacheckcomment->comments + '1';
      }

      DB::table('post')
      ->where('id', $request->postid)
      ->update([
        'comments' => $commentcount
      ]);

      $uid = DB::table('post')
      ->where('id', $request->postid)
      ->first();

      DB::table('customnotification')
      ->insert([
        'user_id' => $uid->user_id,
        'visitor_id' => auth()->user()->id,
        'visitor_name' => auth()->user()->name,
        'img' => auth()->user()->profile_image,
        'data' => 'have commented in your post',
        'read' => 'unread',
        'type' => 'comment',
        'post_id' => $request->postid,
        'comment_id' => $getcommentid->id,
        'created_at' => now()

      ]);

      $id = $request->postid;
      return redirect('/viewpost'.$id);
    }

// Delete post from data base controller starts here
    // 
    // 
    // 
    // 
public function delete_post($id){

      DB::table('post')
      ->where('id', $id)
      ->delete();

      return redirect('/myfeeds');
    }

// Delete comment from post controller starts here
    // 
    // 
    // 
    // 
public function delete_comment($id){

      $postid = DB::table('comment')
      ->where('id', $id)
      ->first();

      if($postid->user_id != auth()->user()->id){
        return $postid->user_id . $id;
      }

      //  $dacheck = DB::table('comment')
      // ->where('post_id', $postid->post_id)
      // ->where('user_id', $postid->user_id)
      // ->get();

      // $count = $dacheck->count();


      $checkcomment = DB::table('post')
      ->where('id', $postid->post_id)
      ->first();

      if($checkcomment->comments == '0'){
        $commentcount = '1';
      }else{
        $commentcount = $checkcomment->comments - '1';
      }

      DB::table('post')
      ->where('id', $postid->post_id)
      ->update([
        'comments' => $commentcount
      ]);      

      DB::table('comment')
      ->where('id', $id)
      ->where('user_id', $postid->user_id)
      ->delete();

      DB::table('customnotification')
      ->where('comment_id', $id)
      ->delete();
      return redirect('viewpost'.$postid->post_id);
    }
}
