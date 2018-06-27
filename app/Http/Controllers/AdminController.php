<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
    	if(auth()->user()->id != '1'){
    		return view('admin/notadmin');
    	}
    	return view('admin/index');
    }
    public function postnews_index(){
    	if(auth()->user()->id != '1'){
    		return view('admin/notadmin');
    	}

    	return view('admin/postnews_index');
    }
    public function postnews(Request $request){
 //    	$this->validate($request, [
	// 	'news'=>'required',
	// 	'Category'=> 'image|nullable|max:1999'
	// ]);
    	DB::table('news')
    	->insert([
    	'newstype' =>  $request->input('Category'),
    	'description' =>  $request->input('news'),
    	'created_at' => now()

    	]);
    	return redirect('admin/postnews');
    }
}
