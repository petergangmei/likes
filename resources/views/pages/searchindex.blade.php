@extends('layouts.app4')
@section('content')
@if($mypref->coffeeTea == '')
<div class="container text-center">
	<h4>You have not updated your preference</h4>
	<p>Please set up your preference to find a match..</p>
	<a href="/preferencepage1"> <button type="button" class="btn btn-info">Set preference</button></a>
</div>
<br>
<div class="container" style="height: 760px; border-top: 1px solid black; ">
	<article class="mx-auto" style="text-align: center; font-size: 20px;"><b>Recent Registers</b></article>
	<div>
		@if(count($newusers) > 0)
		@foreach($newusers as $nuser)
		<a href="/profileid-{{$nuser->id}}" style="text-decoration: none; color: black;">
		<div style="; width: 50%; float: left; border:1px solid white;">
		<div style="border:0px solid black; background-color: #E4ECEC; height: 35px; width:46%; position: absolute; opacity: 0.8; text-align: center; color: black; padding: 5px;" >
			Join <b>{{Carbon\Carbon::createFromTimestamp(strtotime($nuser->created_at))->diffForHumans()}} </b>
		</div>
		@if($nuser->profile_image == "null")
		<img src="public/storage/default_image/avatar.png" width="100%" height="180">
		@else
		<img src="public/storage/profile_image/{{$nuser->id}}/{{$nuser->profile_image}}" width="100%" height="180">
		@endif
		<article style="padding: 5px; text-align: center; background-color: #E4ECEC;">
		<b>{{$nuser->name}}</b> <small>({{$nuser->gender}})</small>

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
			<option value="coffeeTea">Coffee/tea</option>
			<option value="softdrinksHarddrinks">Drinks</option>
			<option value="vegNonveg">Food</option>
			<option value="bikeCar">Travel</option>
			<option value="summerWinter">Vacation</option>
			<option value="dayNight">Time</option>
			<option value="catDog">Pet</option>
			<option value="familyFriends">Surrounding</option>
			<option value="movie">Moives</option>
			<option value="sleepHours">Sleep hours</option>
		</select>
		<button type="submit" class="btn btn-block btn-outline-info  ">Find</button>
  	</form>
  	<b style="font-size: 12px;">Search by name?<a href="/search2">Click here</a></b>
</div>

</div>
<br>
<div class="container" style="height: 760px; border-top: 1px solid black; ">
	<article class="mx-auto" style="text-align: center; font-size: 20px;"><b>Recent Registers</b></article>
	<div>
		@if(count($newusers) > 0)
		@foreach($newusers as $nuser)
		<a href="/profileid-{{$nuser->id}}" style="text-decoration: none; color: black;">
		<div style="; width: 50%; float: left; border:1px solid white;">
		<div style="border:0px solid black; background-color: #E4ECEC; height: 35px; width:46%; position: absolute; opacity: 0.8; text-align: center; color: black; padding: 5px;" >
			Join <b>{{Carbon\Carbon::createFromTimestamp(strtotime($nuser->created_at))->diffForHumans()}} </b>
		</div>
		@if($nuser->profile_image == "null")
		<img src="public/storage/default_image/avatar.png" width="100%" height="180">
		@else
		<img src="public/storage/profile_image/{{$nuser->id}}/{{$nuser->profile_image}}" width="100%" height="180">
		@endif
		<article style="padding: 5px; text-align: center; background-color: #E4ECEC;">
		<b>{{$nuser->name}}</b> <small>({{$nuser->gender}})</small>

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