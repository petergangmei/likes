@extends('layouts.app4')
@section('content')
@csrf
@if($mypref->coffeeTea == '')
<div class="container text-center">
	<h4>You have not updated your preference</h4>
	<p>Please set up your preference to find a match..</p>
	<a href="/preferencepage1"> <button type="button" class="btn btn-info">Set preference</button></a>
</div>
<br>
<div class="container" style="height: 760px; ">
	<article class="mx-auto" style="text-align: center; font-size: 20px;"><b>Recent Registers</b></article>
	<div>
		@if(count($newusers) > 0)
		@foreach($newusers as $nuser)
		<a href="/profileid-{{$nuser->id}}" style="text-decoration: none; color: black;">
		<div style="; width: 33.33%; float: left; border:1px solid white;">
		<div style="border:0px solid black; background-color: #CECECE ; height: 30px; width:30.33%; position: absolute; opacity: 0.8; text-align: center; color: black; padding: 5px; font-size: 10px;">
			Join <b>{{Carbon\Carbon::createFromTimestamp(strtotime($nuser->created_at))->diffForHumans()}} </b>
		</div>
		@if($nuser->profile_image == "null")
		<div style="height:120px; background-image: url(public/storage/default_image/avatar.png);     background-repeat: no-repeat;  background-position: center;
  background-size: 100% 100%;">
		<!-- <img src=""  height="120"> -->
		</div>
		@else
		<div style="height:120px; background-image: url(public/storage/profile_image/{{$nuser->id}}/{{$nuser->profile_image}});     background-repeat: no-repeat;  background-position: center;
  background-size: 100% 100%;">
		<!-- <img src=""  height="120"> -->
		</div>
		@endif
		<article style="padding: 2px; height: 40px; text-align: center; background-color: #E4ECEC; font-size: 13px;">
		<b> {{substr($nuser->name,0,10)}}</b> <br>
		<small>({{$nuser->gender}})</small>

		</article>
		</div>
		</a>
		@endforeach
		@else
		<div style="padding: 5px; text-align: center;">No recent register..</div>
		@endif

	</div>
</div>

@else

<div class="container" style=" height: ; ">
<div class="pref">

	<span class=""><b style="font-size: 15px;">Select what your friend and you should have in common...</b></span>
	<form method="post" action="/searchfilter">
       @csrf
		<select class="form-control form-control " name="pref1" style="width: 100%;">
			<option value="coffeeTea">{{$mypref->coffeeTea}}</option>
			<option value="softdrinksHarddrinks">{{$mypref->softdrinksHarddrinks}}</option>
			<option value="vegNonveg">{{$mypref->vegNonveg}}</option>
			<option value="bikeCar">{{$mypref->bikeCar}}</option>
			<option value="summerWinter">{{$mypref->summerWinter}}</option>
			<option value="dayNight">{{$mypref->dayNight}}</option>
			<option value="catDog">{{$mypref->catDog}}</option>
			<option value="familyFriends">{{$mypref->familyFriends}}</option>
			<option value="movie">{{$mypref->movie}}</option>
			<option value="sleepHours">{{$mypref->sleepHours}} Hours</option>
		</select>
		<button type="submit" class="btn btn-block btn-outline-info  ">Find</button>
  	</form>
  	<b style="font-size: 12px;">Search by name?<a href="/search2">Click here</a></b>
</div>

</div>
<br>
<div class="container" style="height: 760px; ">
	<article class="mx-auto" style="text-align: center; font-size: 20px;"><b>Recent Registers</b></article>
	<div>
		@if(count($newusers) > 0)
		@foreach($newusers as $nuser)
		<a href="/profileid-{{$nuser->id}}" style="text-decoration: none; color: black;">
		<div style="; width: 33.33%; float: left; border:1px solid white;">
		<div style="border:0px solid black; background-color: #CECECE ; height: 30px; width:30.33%; position: absolute; opacity: 0.8; text-align: center; color: black; padding: 5px; font-size: 10px;">
			Join <b>{{Carbon\Carbon::createFromTimestamp(strtotime($nuser->created_at))->diffForHumans()}} </b>
		</div>
		@if($nuser->profile_image == "null")
		<div style="height:120px; background-image: url(public/storage/default_image/avatar.png);     background-repeat: no-repeat;  background-position: center;
  background-size: 100% 100%;">
		<!-- <img src=""  height="120"> -->
		</div>
		@else
		<div style="height:120px; background-image: url(public/storage/profile_image/{{$nuser->id}}/{{$nuser->profile_image}});     background-repeat: no-repeat;  background-position: center;
  background-size: 100% 100%;">
		<!-- <img src=""  height="120"> -->
		</div>
		@endif
		<article style="padding: 2px; height: 40px; text-align: center; background-color: #E4ECEC; font-size: 13px;">
		<b> {{substr($nuser->name,0,10)}}</b> <br>
		<small>({{$nuser->gender}})</small>

		</article>
		</div>
		</a>
		@endforeach
		@else
		<div style="padding: 5px; text-align: center;">No recent register..</div>
		@endif

	</div>
</div>

<div class="sbyname" style="display: none;">
	 <b>Or</b>
	<input type="text" name="" class="form-control" placeholder="Searh by name">
	<button type="buutton" class="btn btn-block btn-info">Find</button>
	<br><br>
</div>
	
	<div class="result">
		<img src="">
    </div>


 </div>
</div>


@endif


@endsection