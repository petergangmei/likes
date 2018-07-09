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
    public function setvalue_index(){

        return view('admin/setvalue_index');
    }

    public function set_value(Request $request){
        echo $request->table . ' ' . $request->field .' '. $request->value . '<br>';
        DB::table($request->table)->update([
        $request->field => $request->value
        ]);
        return 021;
    }

    public function activeness(){
        $data = DB::table('activeness')->orderBy('created_at', 'DESC')->paginate(20);
        $t_data = DB::table('activeness')->orderBy('created_at', 'DESC')->get();
        // foreach ($data as $key) {
        //     $later = $key->created_at;
        // }
        $later = '2018-07-07 03:47:09';

        $now = now();

        $total_active = DB::table('users')->whereBetween('activeness', [$later, $now ])->get();

        return view('admin/activeness')
        ->with('dataa', $data)
        ->with('total_active_users', $total_active)
        ->with('t_dataa', $t_data);
    }
}
