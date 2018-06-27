<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NewsController extends Controller
{
    //
    public function index(){
    	$news = DB::table('news')->orderBy('created_at', 'DESC')->get();
    	return view('news/newsindex')
    	->with('news', $news);
    }
}
