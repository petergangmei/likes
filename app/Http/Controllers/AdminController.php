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
        
        $users = DB::table('users')->orderBy('created_at', 'DESC')->get();
        $Mars = DB::table('users')->where('gender', 'Mars')->orderBy('created_at', 'DESC')->get();
        $venus = DB::table('users')->where('gender', 'Venus')->orderBy('created_at', 'DESC')->get();

    	return view('admin/index')
            ->with('mars', $Mars)
            ->with('venus', $venus)
            ->with('users', $users);
    }

    public function postnews_index(){
    	if(auth()->user()->id != '1'){
    		return view('admin/notadmin');
    	}
        $news = DB::table('news')->orderBy('created_at', 'DESC')->get();
    	return view('admin/postnews_index')
            ->with('news', $news);

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

    public function depositecoins(Request $request){
        DB::table('users')
        ->where('id', '!=', auth()->user()->id)
        ->update([
        'coins' => $request->coins
        ]);
        return redirect('/admin');
    }
}
