<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class Feedcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



   public function feeds(){
    $posts = DB::table('post')
    ->orderBy('created_at', 'DESC')
    ->get();
    $likes = DB::table('likes')
    ->get();

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();
    
      $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

    return view('feeds/newsfeed')
    ->with('posts', $posts)
    ->with('messages', $messageslist)
    ->with('likes', $likes)
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

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();        

        $post = DB::table('post')
        ->where('user_id', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->get();

   	return view('feeds/myfeeds')
    ->with('unread', $unread)
    ->with('messages', $messageslist)
    ->with('post', $post);
   }

public function friendsfeeds(){
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();        

      $ids = DB::table('profilevisitor')
                  ->where('user_id', auth()->user()->id)
                  ->where('status', 'Friend')
                  ->get();

  $items[] = "";

foreach ($ids as $key ) {
  $items[] = $key->visitor_id;
}
// print_r($items);
        $post = DB::table('post')
        ->whereIn('user_id', [1,2,3])
        ->orderBy('id', 'desc')
        ->get();

 return view('feeds/friendsfeeds')
      ->with('unread', $unread)
      ->with('messages', $messageslist)
      ->with('post', $post); 
}

public function local_post(){
    $posts = DB::table('post')
    ->where('location', auth()->user()->location)
    ->orderBy('created_at', 'DESC')
    ->get();
    $likes = DB::table('likes')
    ->get();

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();
    
      $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

    return view('feeds/localpost')
    ->with('posts', $posts)
    ->with('messages', $messageslist)
    ->with('likes', $likes)
    ->with('unread', $unread);
}
public function national_post(){
    $posts = DB::table('post')
    ->where('country', auth()->user()->country)
    ->orderBy('created_at', 'DESC')
    ->get();
    $likes = DB::table('likes')
    ->get();

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();
    
      $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

    return view('feeds/nationalpost')
    ->with('posts', $posts)
    ->with('messages', $messageslist)
    ->with('likes', $likes)
    ->with('unread', $unread);
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
      $likes = DB::table('likes')
    ->get();

      $messageslist = DB::table('chats')
      ->where('uid1', auth()->user()->id)
      ->where('seen', 'unseen')
      ->orderBy('created_at', 'DESC')
      ->get();   

     $comments = DB::table('comment')
        ->where('post_id', $id)
        ->get();
     $post_by = DB::table('post')
     ->where('id', $id)
     ->first();
     $userimg = DB::table('users')
              ->where('id', $post->user_id)
              ->first();

      // check if you are friend with the post owner
    $c_friend = DB::table('profilevisitor')
    ->where('user_id', $post->user_id)
    ->where('visitor_id', auth()->user()->id)
    ->where('status', 'Friend')
    ->get();


    return view('feeds/viewpost')
    ->with('post', $post)
    ->with('userimg', $userimg)
    ->with('messages', $messageslist)
    ->with('unread', $unread)
    ->with('likes', $likes)
    ->with('comments', $comments)
    ->with('checkfriend', $c_friend)
    ->with('post_by', $post_by);
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
        $this->validate($request, [
    'post' => 'nullable|max:200',
    'image'=> 'required'
  ]);

        // $imageData = $request->image;
        // $info = base64_decode($imageData);
        // $img1 = Image::make($info);
        // $img1 ->save(public_path('public/storage/1.png'));
      $u_id = auth()->user()->id;
      $u_name = auth()->user()->name;

      $userdetail = DB::table('users')->where('id', $u_id)->first();
     

      $u_id = auth()->user()->id;

      $data = $request->image;

      list($type, $data) = explode(';', $data);
      list(, $data) = explode(',', $data);
      $data = base64_decode($data);

      $path = 'public/storage/posts_image/'. $u_id .'/';

      if (!is_dir($path)) {
      //Create our directory if it does not exist
      mkdir($path);
      }


      $filename =  date("Y_m_d").'_'. $u_id .'_'. time() .'.png';
      $movefile = file_put_contents($path .$filename, $data);


 





      DB::table('post')
      ->insert([
        'user_id' => auth()->user()->id,
        'user_name' => auth()->user()->name,
        'post' => $request->post,
        'image' => $filename,
        'location' => auth()->user()->location,
        'country' => auth()->user()->country,
        'comments_privacy' => $userdetail->comment_privacy,
        'created_at' => now()
      ]);

   return $movefile;       

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
      $postuserid = DB::table('post')
                  ->where('id', $request->post_id)
                  ->first();

      if(count($dacheck) == 0){

      DB::table('likes')
      ->insert([
        'user_id' => auth()->user()->id,
        'post_id' => $request->post_id,
        'posted_by' => $postuserid->user_id,
        'status' => 'fresh',
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

      if($uid->user_id == auth()->user()->id){

      }else{
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
      }
      }else{

      if($uid->user_id == auth()->user()->id){

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

      // check linkes  - 
      $checklike = DB::table('likes')
      ->where('post_id', $request->post_id)
      ->get();

        DB::table('likes')
        ->where('user_id', auth()->user()->id)
        ->where('post_id', $request->post_id)
        ->delete();

      $count = $checklike->count();
      if($count == 1){
        $newcount = '0';
        DB::table('customnotification')
        ->where('post_id', $request->post_id)
        ->delete();        
      }
      if($count >= 1){
      $newcount = $count - '1';
      }

      $uid = DB::table('post')
      ->where('id', $request->post_id)
      ->first();
      $lastlikerid = DB::table('likes')
      ->where('post_id', $request->post_id)
      ->first();
      $lastlikerdetails = DB::table('users')
      ->where('id', $lastlikerid->user_id)
      ->first();

      if($count == 2){
      $likenotify =  'liked your post';
      }else{
      $likenotify =  'and other '.$newcount.' person have like your post';
      }

      DB::table('customnotification')
      ->where('post_id', $request->post_id)
      ->where('type', 'likes')
      ->update([
        'user_id' => $uid->user_id,
        'visitor_id' => $lastlikerdetails->id,
        'visitor_name' => $lastlikerdetails->name,
        'img' => $lastlikerdetails->profile_image,
        'data' => $likenotify,
        'read' => 'read',
        'type' => 'likes',
        'created_at' => $lastlikerid->created_at
      ]);


      }

      return 3;
    }

// post comment in post controller starts here
    // 
    // 
    // 
    // 

public function post_comment(Request $request){

    $this->validate($request, [
    'comment'=>'required',
  ]);
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

      if($uid->user_id == auth()->user()->id){
      // send notification 
      }else{
      DB::table('customnotification')
      ->insert([
        'user_id' => $uid->user_id,
        'visitor_id' => auth()->user()->id,
        'visitor_name' => auth()->user()->name,
        'img' => auth()->user()->profile_image,
        'data' => 'commented on your post',
        'read' => 'unread',
        'type' => 'comment',
        'post_id' => $request->postid,
        'comment_id' => $getcommentid->id,
        'created_at' => now()
      ]);
      }

      $id = $request->postid;
      return redirect('/viewpost'.$id);
    }

// Delete post from data base controller starts here
    // 
    // 
    // 
    // 
public function delete_post($id){
      $getimg_name = DB::table('post')->where('id', $id)->first();


      
    DB::table('photos')->where('image', $getimg_name->image)->update(['deleted' => 'true']);
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



      DB::table('customnotification')
      ->where('comment_id', $id)
      ->delete();

      DB::table('comment')
      ->where('id', $id)
      ->where('user_id', $postid->user_id)
      ->delete();
      return redirect('viewpost'.$postid->post_id);
    }

}
