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
	public function move_file(){

		// $data = $request->input('image');
		// $name = time() . '.png';
		// file_put_contents('public/storage/default_image/'.$name, $data);

		$data ="



		";
			$uid = auth()->user()->id;
			list($type, $data) = explode(';', $data);
			list(, $data) = explode(',', $data);
			$data = base64_decode($data);
			$path = 'public/storage/profile_image/'. $uid .'/';
			$filename = time() .'.png';
			$movefile = file_put_contents($path .$filename, $data);

			if($movefile){
				echo "File moved sucessfully";
			}else{
				echo "File moved failed";

			}


	}

	public function uploadprofile_img(Request $request){

	// $this->validate($request, [
	// 	'image'=>'required'
	// ]);
			$u_id = auth()->user()->id;

			$data = $request->image;

			list($type, $data) = explode(';', $data);
			list(, $data) = explode(',', $data);
			$data = base64_decode($data);

			$uid = auth()->user()->id;
			$path = 'public/storage/profile_image/'. $uid .'/';

			if (!is_dir($path)) {
			//Create our directory if it does not exist
			mkdir($path);
			}


			$filename =  date("Y_m_d").'_'. $uid .'_'. time() .'.png';
			$movefile = file_put_contents($path .$filename, $data);


			 DB::table('users')
            ->where('id', $u_id)
            ->update([
            	'profile_image' => $filename
            	]);

			 DB::table('profilevisitor')
            ->where('visitor_id', $u_id)
            ->update(['profile_image' => $filename]);  




            return $movefile;


	        // $path = ('public/default_image/'. $fileNameToStore);
	        // file_put_contents($path, $data);
	        // $path = ('public/default_image/'. $fileNameToStore);
	         // move_uploaded_file($fileNameToStore, $path);
	        // move_uploaded_file( $fileNameToStore, $path);

			// var unicode = atob($request->image);

			// $u_name = auth()->user()->name;


			// $data = base64_decode($data);
			// $imageName = time().'.png';
			// $path  = public_path('default_image');
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

			 // DB::table('users')
    //         ->where('id', $u_id)
    //         ->update([
    //         	'profile_image' => $request->image
    //         	]);

			 // DB::table('profilevisitor')
    //         ->where('visitor_id', $u_id)
    //         ->update(['profile_image' => $request->image]);  


    	// return redirect('/home')->with('success','Post image!');
	}
	public function update_active(Request $request){
		DB::table('users')
			->where('id', auth()->user()->id)
			->update([
				'activeness' => now()
			]);
		DB::table('activeness')
		->insert([
		'userid' => auth()->user()->id,
		'username' =>auth()->user()->name,
		'created_at' => now()
		]);
		return 135;
	}
}
