<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $userdetail = DB::table('users')->where('id', auth()->user()->id)->get();
        $userdetailfirst = DB::table('users')->where('id', auth()->user()->id)->first();
        $photos = DB::table('photos')
        ->where('user_id', auth()->user()->id)
        ->where('deleted', 'false')
        ->get();
        $bio = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

        $visitors = DB::table('profilevisitor')
        ->where('status', 'Requested')
        ->where('user_id', auth()->user()->id)
        ->get();

        $friends = DB::table('profilevisitor')
        ->where('user_id', auth()->user()->id)
        ->where('status', 'Friend')
        ->get();

    
    return view('home')
    ->with('userdetail', $userdetail)
    ->with('photos', $photos)
    ->with('bio', $bio)
    ->with('visitors', $visitors)
    ->with('friends', $friends)
    ->with('user', $userdetailfirst);
    }
    public function preference_page(){
        return view('pages/setpreference');
    }
}
