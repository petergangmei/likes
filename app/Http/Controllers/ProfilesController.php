<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\storage;
use App\Userdetail;
use App\User;
use DB;

class ProfilesController extends Controller
{
	public function u_p_p_index(){

		return view('profile/upload_profile_picture_index');
	}

	public function uploadprofile_img(Request $request){

	$this->validate($request, [
		'image'=>'required'
	]);
			$u_id = auth()->user()->id;
			// $u_name = auth()->user()->name;

		     // handle file upload
	     // if($request->hasFile('profile_pic')){
	     //    //Get Filename with the extentionn
	     //    $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
	     //    // Get just file name
	     //    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	     //    // Get just ext
	     //    $extension = $request->file('profile_pic')->getClientOriginalExtension();
	     //    //file name to store

	     //    $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
	     //    //upload image
	     //    $path = $request->file('profile_pic')->storeAs('public/profile_image/'.$u_id.'/', $fileNameToStore);
	     //    $path2 = $request->file('profile_pic')->storeAs('public/photos/'.$u_id.'/', $fileNameToStore);
	     // }else{
	     //    $fileNameToStore = 'null';
	     // }


   //          DB::table('photos')
			// ->insert([ 
			// 	'image' => $fileNameToStore,
			// 	 'user_id' => $u_id,
			// 	  'user_name'=>$u_name,
			// 	   'image_type' => 'featured_photo',
			// 	   'deleted'=> 'false',
			// 	   'created_at' => now()
			// 	    ]);    

			 DB::table('users')
            ->where('id', $u_id)
            ->update([
            	'profile_image' => $request->image
            	]);

			 DB::table('profilevisitor')
            ->where('visitor_id', $u_id)
            ->update(['profile_image' => $request->image]);  


            return 123;
    	// return redirect('/home')->with('success','Post image!');
	}
	public function update_active(Request $request){
		DB::table('users')
			->where('id', auth()->user()->id)
			->update([
				'activeness' => now()
			]);
		return 123;
	}
}
