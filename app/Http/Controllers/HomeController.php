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
        ->where('image_type', 'featured_photo')
        ->orderBy('created_at', 'DESC')
        ->where('deleted', 'false')
        ->get();
        $totalphotos = DB::table('photos')
        ->where('user_id', auth()->user()->id)
        ->where('deleted', 'false')
        ->orderBy('created_at', 'DESC')
        ->get();
        $bio = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

        $visitors = DB::table('profilevisitor')
        ->where('status', 'Requested')
        ->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'DESC')

        ->get();

        $friends = DB::table('profilevisitor')
        ->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'DESC')
        ->where('status', 'Friend')
        ->get();
        $coins = DB::table('Users')->where('id', auth()->user()->id)->first();

        $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

      $post = DB::table('post')->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'DESC')
        ->get();

      $likes = DB::table('likes')->where('posted_by', auth()->user()->id)->get();

    
    return view('home')
    ->with('userdetail', $userdetail)
    ->with('photos', $photos)
    ->with('tphotosc', $totalphotos)
    ->with('bio', $bio)
    ->with('visitors', $visitors)
    ->with('friends', $friends)
    ->with('likes', $likes)
    ->with('posts', $post)
    ->with('user', $userdetailfirst)
    ->with('coins', $coins)
    ->with('unread', $unread);
    }
    public function preference_page(){

  $unread = DB::table('customnotification')
        ->where('user_id', auth()->user()->id)
        ->where('read', 'unread')
        ->get();

        return view('pages/setpreference')->with('unread', $unread);
    }
}
