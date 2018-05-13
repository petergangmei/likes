<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Feedcontroller extends Controller
{

   public function feeds(){

    return view('pages/newsfeed');
   }

   public function myfeeds(){
   	
   	return view('pages/myfeeds');
   }

    public function addfeed(){

    }
}
