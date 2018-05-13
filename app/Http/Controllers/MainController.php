<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
   public function search(){
   	$mypref = DB::table('Users')->where('id', auth()->user()->id)->first();
<<<<<<< HEAD
   	return view('pages/searchindex')->with('mypref', $mypref);
   }

      public function search2(){
    $mypref = DB::table('Users')->where('id', auth()->user()->id)->first();
    return view('pages/searchindex2')->with('mypref', $mypref);
=======

   	return view('pages/searchindex')->with('mypref', $mypref);
   	
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34
   }

   public function searchfilter(Request $request){
   	$mypref = DB::table('Users')->where('id', auth()->user()->id)->first();
      $val = $request->pref1;
      $def = $mypref->$val;
      $datas = DB::table('Users')->where($request->pref1, $def)->where('id', '!=' , auth()->user()->id)->orderBy('profile_visits', 'desc')->get();


   	return view('pages/searchresult')->with('datas', $datas)->with('mypref', $mypref)->with('val', $val);
   }

<<<<<<< HEAD


=======
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34
   public function viewprofile($id){
      $matched = DB::table('profilevisitor')->where('user_id', $id)->where('visitor_id', auth()->user()->id)->get();
      $matched2 = DB::table('profilevisitor')->where('user_id', $id)->where('visitor_id', auth()->user()->id)->first();

      if(count($matched)>0){
        $visitor_id = "Matchresult";
      }else{
        $visitor_id = "Matchout";
      }
      $photos = DB::table('photos')->where('user_id', $id)->where('deleted', 'false')->get();
      $data = DB::table('Users')->where('id', $id)->first();
      $coins = DB::table('Users')->where('id', auth()->user()->id)->first();

      $visitor = $data->profile_visits;
      $newvisitor = $visitor + '10';
      DB::table('Users')->where('id', $id)->update([
         'profile_visits' =>  $newvisitor
      ]);
      return view('profile/viewprofile')
      ->with('data', $data)
      ->with('photos', $photos)
      ->with('coins', $coins)
      ->with('visitor', $visitor_id);
   }

   public function matchout(Request $request){

    // checking if the usered have alreday matched 
    if($request->matched == 'Matchout'){

      // check if user alredy matched
      $checkdata = DB::table('profilevisitor')
      ->where('visitor_id', auth()->user()->id)
      ->where('user_id', $request->userid)
      ->get();
      
      if(count($checkdata)> 0){
        return 1;
      }else{
      // update coins
      $current_coins = DB::table('Users')->where('id', auth()->user()->id)->first();
      $mycoins = $current_coins->coins;
      if($mycoins < 10){
         return 1;
      }else{
         $newcoins = $mycoins - '10';
         DB::table('Users')->where('id', auth()->user()->id)
         ->update([
         'coins' =>  $newcoins
      ]);
      }
      // add in visitor table.
      DB::table('profilevisitor')
      ->insert(['user_id' => $request->userid , 
        'visitor_id' => auth()->user()->id, 
        'visitor_name' => auth()->user()->name, 
        'profile_image' => auth()->user()->profile_image,
        'gender' => auth()->user()->gender,
        'status' => 'Request' ]);;
      }

      $da = DB::table('Users')->where('id', $request->userid)->first();
    // update visitors
      $visitor = $da->profile_visits;
      $newvisitor = $visitor + '10';
      DB::table('Users')
      ->where('id', $request->user_id)
      ->update([
         'profile_visits' =>  $newvisitor
      ]);  

    }
      $data1 = DB::table('Users')->where('id', $request->userid)->first();
      $data2 = DB::table('Users')->where('id', auth()->user()->id)->first();
       if($data1->coffeeTea == $data2->coffeeTea) { 
         $v1 = '10';
         $vv1 = "You and $data1->name  like $data1->coffeeTea (match).";
      }else{
         $v1 = '0';
         $vv1 = "You like $data2->coffeeTea but $data1->name like $data1->coffeeTea";
       }
       if($data1->softdrinksHarddrinks == $data2->softdrinksHarddrinks) { 
         $v2 = '10';
         $vv2 = "You both prefer $data1->softdrinksHarddrinks (match).";
      }else{
         $v2 = '0';
         $vv2 ="$data1->name prefer $data1->softdrinksHarddrinks but yoou don't.";
       }
       if($data1->vegNonveg == $data2->vegNonveg) { 
         $v3 = '10';
         $vv3 = "You both eats $data1->vegNonveg (match).";
      }else{
         $v3 = '0';
         $vv3 ="You like $data2->vegNonveg but $data1->name like $data1->vegNonveg more.";
       }
       if($data1->bikeCar == $data2->bikeCar) { 
         $v4 = '10';
         $vv4 = "You both like travelling in $data1->bikeCar (match).";
      }else{
         $v4 = '0';
         $vv4 ="You like travelling in $data2->bikeCar but $data1->name like $data1->bikeCar";
       }
       if($data1->summerWinter == $data2->summerWinter) { 
         $v5 = '10';
         $vv5 = "You both enjoy $data1->summerWinter vacation than"; 
       if($data1->summerWinter = "Winter"){ $sow ="Summer vacation (match).";} else { $sow = "Winter vacation (match).";};
      }else{
         $v5 = '0';
         $vv5 ="$data1->name like $data1->summerWinter vacation while you like $data2->summerWinter vacation.";
       if($data1->summerWinter = "Winter"){ $sow =" ";} else { $sow = " ";};
       }
       if($data1->dayNight == $data2->dayNight) { 
         $v6 = "10";
         $vv6 = "You like to hangout in Night, gust what $data1->name also like that (match).";
      }else{
         $v6 = '0';
         $vv6 ="You like to hang out with friends  during $data2->dayNight but $data1->name don't.";
       }
       if($data1->catDog == $data2->catDog) { 
         $v7 = "10";
         $vv7 = "$data1->name will like to have $data1->catDog as a pet like you! (match).";
      }else{
         $v7 = '0';
         $vv7 = "$data1->name would like $data1->catDog as pet but you don't.";
       }
       if($data1->familyFriends == $data2->familyFriends) { 
         $v8 = '10';
         $vv8 = "You both prefer to hangout more with $data1->familyFriends (match).";
      }else{
         $v8 = '0';
         $vv8 ="You like hagging out with $data2->familyFriends while $data1->name like $data1->familyFriends";
       }
       if($data1->movie == $data2->movie) { 
         $v9 = '10';
         $vv9 = "You both love $data1->movie (match).";
      }else{
         $v9 = '0';
         $vv9 ="You like $data2->movie and $data1->name like $data1->movie";
       }
       if($data1->sleepHours == $data2->sleepHours) { 
         $v10 = '10';
         $vv10 ="You and $data1->name can sleep for $data1->sleepHours hours without any break. :-D (match).";
      }else{
         $v10 = '0';
         $vv10 ="You do want to sleep for more or lest than $data2->sleepHours hours but $data1->name like to sleep for $data1->sleepHours hours";

       }
       $result_val = $v1 + $v2 + $v3 + $v4 + $v5 + $v6 + $v7 + $v8 + $v9 + $v10;

       $status = DB::table('profilevisitor')
       ->where('user_id', $request->userid)
       ->where('visitor_id', auth()->user()->id)
       ->first();

      return view('pages/matchoutresult')
      ->with('status', $status)
      ->with('result_val', $result_val)
      ->with('data1', $data1)
      ->with('data', $data2)
      ->with('vv1', $vv1)
      ->with('vv2', $vv2)
      ->with('vv3', $vv3)
      ->with('vv4', $vv4)
      ->with('vv5', $vv5)
      ->with('vv6', $vv6)
      ->with('vv7', $vv7)
      ->with('vv8', $vv8)
      ->with('vv9', $vv9)
      ->with('vv10', $vv10)
      ->with('sow', $sow);
   }

  public function add_friend(Request $request){
    DB::table("profilevisitor")
    ->where('user_id', $request->user_id)
    ->where('visitor_id', auth()->user()->id)
    ->update([
      'status' => 'Requested'
    ]);
    return 111;
  }

    public function cancel_request(Request $request){
    DB::table("profilevisitor")
    ->where('user_id', $request->user_id)
    ->where('visitor_id', auth()->user()->id)
    ->update([
      'status' => ' Rquest'
    ]);
    return 111;
  }

  public function accept_request(Request $request){
    DB::table("profilevisitor")
    ->where('visitor_id', $request->visitor_id)
    ->where('user_id', auth()->user()->id)
    ->update([
      'status' => 'Friend'
    ]);

    $visitor = DB::table('users')
    ->where('id', $request->visitor_id)->first();

    DB::table('customnotification')
    ->insert([ 
      'user_id' =>  auth()->user()->id,
      'visitor_id' => $visitor->id, 
      'visitor_name'=> $visitor->name, 
      'visitor_image' => $visitor->profile_image, 
      'data'=>' have accepted your request. Start chatting right away! ', 
      'notification_type' => 'requestaccept' , 
      'read'=> 'unread' ]);

      return 11;

  }

}
