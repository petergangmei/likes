@extends('layouts.app4')
@section('content')
<div class="container">
<div class="pref">
	<span class="float-left"><b style="font-size: 19px;">Pref.</b></span>
	<form method="post" action="/searchfilter">
       @csrf
		<select class="form-control form-control-sm float-left" name="pref1" style="width: 110px;">
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

		<span class="float-left" style="color: #F9F5F4;">_</span>
		<button type="submit" class="btn btn-outline-info btn-sm float-left">Find</button>
  	</form>
</div>
<br>
	<div class="result">
		@if(count($datas)>1)
		<br>
		{{$datas->count()}} Match found <b>
		<?php if($val == "coffeeTea") {?>
		Coffe/tea
		<?php } ?>
		<?php if($val == "softdrinksHarddrinks") {?>
		Drinks
		<?php } ?>
		<?php if($val == "vegNonveg") {?>
		Food
		<?php } ?>
		<?php if($val == "bikeCar") {?>
		Drinks
		<?php } ?>
		<?php if($val == "summerWinter") {?>
		Vacation
		<?php } ?>
		<?php if($val == "dayNight") {?>
		Time
		<?php } ?>
		<?php if($val == "catDog") {?>
		Pet
		<?php } ?>
		<?php if($val == "familyFriends") {?>
		Surronding
		<?php } ?>				
		<?php if($val == "movie") {?>
		Movie
		<?php } ?>
		<?php if($val == "sleepHours") {?>
		Sleephours
		<?php } ?>
		</b><br>
		@foreach($datas as $data)
		<a href="/profileid-{{$data->id}}" style="text-decoration: none; color: black; ">
		<div class="card cursor-pointer" style=" padding: 1px ; text-align: ;">
			<div class="card-body">
			<?php if($data->profile_image != "") {?>
			<img src="/public/storage/profile_image/{{$data->id}}/{{$data->profile_image}}" class="small-icon">
			<?php } else{ ?>
	         <img src="/public/storage/default_image/avatar.png " class="small-icon">
			<?php } ?>
			<b class="margin-left">{{$data->name}}</b> <span style="font-size: 13px;">({{$data->gender}})</span> <br>
			<i class="margin-left">{{$data->bio}}</i><br>
			<span class="margin-left">New delhi</span>
				
			</div>
		</div>
		</a>
		@endforeach
		@else
		<br>
		No match
		@endif

    </div>

 </div>
</div>
<br>
<br>
<br>
@endsection