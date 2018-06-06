<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\storage;
use App\Userdetail;
use App\User;
use DB;

class UserdetailController extends Controller
{
public function uploadprofile_img(Request $request){

	$this->validate($request, [
		'profile_pic'=>'required',
		'profile_pic'=> 'image|nullable|max:1999'
	]);
			$u_id = auth()->user()->id;
			$u_name = auth()->user()->name;

		     // handle file upload
	     if($request->hasFile('profile_pic')){
	        //Get Filename with the extentionn
	        $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
	        // Get just file name
	        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	        // Get just ext
	        $extension = $request->file('profile_pic')->getClientOriginalExtension();
	        //file name to store

	        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
	        //upload image
	        $path = $request->file('profile_pic')->storeAs('public/profile_image/'.$u_id.'/', $fileNameToStore);
	        $path2 = $request->file('profile_pic')->storeAs('public/photos/'.$u_id.'/', $fileNameToStore);
	     }else{
	        $fileNameToStore = 'null';
	     }


            DB::table('photos')
			->insert([ 
				'image' => $fileNameToStore,
				 'user_id' => $u_id,
				  'user_name'=>$u_name,
				   'image_type' => 'featured_photo',
				   'deleted'=> 'false',
				   'created_at' => now()
				    ]);    

			 DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['profile_image' => $fileNameToStore]);

			 DB::table('profilevisitor')
            ->where('visitor_id', auth()->user()->id)
            ->update(['profile_image' => $fileNameToStore]);  



    	return redirect('/home')->with('success','Post created!');
	}

	public function add_photo(Request $request){

	$this->validate($request, [
		'profile_pic2'=>'required',
		'profile_pic2'=> 'image|nullable|max:1999'
	]);
			$u_id = auth()->user()->id;
			$u_name = auth()->user()->name;
		     // handle file upload
	     if($request->hasFile('profile_pic2')){
	        //Get Filename with the extentionn
	        $filenameWithExt = $request->file('profile_pic2')->getClientOriginalName();
	        // Get just file name
	        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	        // Get just ext
	        $extension = $request->file('profile_pic2')->getClientOriginalExtension();
	        //file name to store

	        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
	        //upload image
	        $path = $request->file('profile_pic2')->storeAs('public/photos/'.$u_id.'/', $fileNameToStore);
	     }else{
	        $fileNameToStore = 'nofile';
	     }

			 // add profile image to user_profile_img table
			DB::table('photos')
			->insert([ 
				'image' => $fileNameToStore,
				 'user_id' => $u_id,
				  'user_name'=>$u_name,
				   'image_type' => 'featured_photo',
				   'deleted'=> 'false',
				   'created_at' => now()
				    ]);

    	return redirect('/home')->with('success','Post created!');
	}
	public function update_bio(Request $request){
		$this->validate($request, [
			'bio' =>'required|max:300'
		]);
		DB::table('users')->where('id', auth()->user()->id)->update([
			'bio' =>  $request->input('bio')
		]);

		return redirect('/home')->with('success', "Bio Updated!");
	}


	public function view_photo($id){
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

		$photo = DB::table('photos')->where('id', $id)->first();

		return view('pages/viewphoto')->with('photo', $photo)->with('unread', $unread);
	}

	public function delete_photo($id){
		DB::table('photos')->where('id', $id)->update(['deleted' => 'true']);
		return redirect('/home');
	}

	public function report_photo($id){
		// check if report have already submited by the same user
		$check1 = DB::table('reports')
		->where('reporter_id', auth()->user()->id)
		->where('post_id', $id)
		->get();
		if(count($check1)>0){
		
		return view('pages/reported_already');

		}else{
		$userid = DB::table('photos')
		->where('id', $id)
		->first();

		$userdetail = DB::table('users')
		->where('id', $userid->user_id)
		->first();

		DB::table('reports')
		->insert([
			'user_id' => $userid->user_id,
			'post_id' => $id,
			'type' => 'feature_photo',
			'reporter_id' => auth()->user()->id,
			'reporter_name' => auth()->user()->name, 
			'reason' => 'not appropriate ',
			'status' => 'justReported',
			'created_at' =>now()
		]);
		DB::table('customnotification')
		->insert([
			'user_id' => $userdetail->id,
			'visitor_id' => auth()->user()->id,
			'visitor_name' => auth()->user()->name,
			'img' => auth()->user()->profile_image,
			'data' => 'reported your photo as Inappropriate',
			'read' => 'unread',
			'type' => 'report',
			'post_id' => $id,
			'created_at' => now()
		]);
		}

		return view('pages/reportsuccess');
	}
	// report comment
	public function report_comment($id){
		// check if report have already submited by the same user
		$check1 = DB::table('reports')
		->where('reporter_id', auth()->user()->id)
		->where('post_id', $id)
		->get();
		if(count($check1)>0){
		
		return view('pages/reported_already');

		}else{
		$userid = DB::table('comment')
		->where('id', $id)
		->first();

		$userdetail = DB::table('users')
		->where('id', $userid->user_id)
		->first();

		DB::table('reports')
		->insert([
			'user_id' => $userid->user_id,
			'post_id' => $id,
			'type' => 'comment',
			'reporter_id' => auth()->user()->id,
			'reporter_name' => auth()->user()->name, 
			'reason' => 'not appropriate ',
			'status' => 'justReported',
			'created_at' =>now()
		]);
		DB::table('customnotification')
		->insert([
			'user_id' => $userdetail->id,
			'visitor_id' => auth()->user()->id,
			'visitor_name' => auth()->user()->name,
			'img' => auth()->user()->profile_image,
			'data' => 'reported your comment as Inappropriate from one post. Tap here to see the post',
			'read' => 'unread',
			'type' => 'report',
			'post_id' => $id,
			'created_at' => now()
		]);
		}

		return view('pages/reportsuccess');
	}	

	// update preference
	public function update_preference(Request $request){
		$this->validate($request,[
			'coffee-tea' =>'required'
		]);
		DB::table('Users')->where('id', auth()->user()->id)->update([
			'coffeeTea'=> $request->input('coffee-tea'),
			'softdrinksHarddrinks'=> $request->input('softdrinks-harddrinks'),
			'vegNonveg'=> $request->input('veg-nonveg'),
			'bikeCar'=> $request->input('bike-car'),
			'summerWinter'=> $request->input('summer-winter'),
			'dayNight'=> $request->input('day-night'),
			'catDog'=> $request->input('cat-dog'),
			'familyFriends'=> $request->input('family-friends'),
			'movie'=> $request->input('movie'),
			'sleepHours'=> $request->input('sleep-hours')
		]);
  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();
        		
		return redirect('/search')
		->with('unread', $unread);
	}

}
