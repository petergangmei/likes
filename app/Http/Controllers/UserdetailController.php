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
	     }else{
	        $fileNameToStore = 'nofile';
	     }



			 DB::table('users')
            ->where('id', auth()->user()->id)
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
			DB::table('photos')->insert([ 'image' => $fileNameToStore, 'user_id' => $u_id, 'user_name'=>$u_name, 'deleted'=> 'false' ]);

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
		$photo = DB::table('photos')->where('id', $id)->first();

		return view('pages/viewphoto')->with('photo', $photo);
	}

	public function delete_photo($id){
		DB::table('photos')->where('id', $id)->update(['deleted' => 'true']);
		return redirect('/home');
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
		return redirect('/home');
	}

}
