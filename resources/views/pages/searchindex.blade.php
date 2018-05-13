<<<<<<< HEAD
@extends('layouts.app4')
@section('content')
@if($mypref->coffeeTea == '')
<div class="container text-center">
	<h4>You have not updated your preference</h4>
	<p>Please set up your preference to find a match..</p>
	<a href="/preferencepage1"> <button type="button" class="btn btn-info">Set preference</button></a>
</div>


@else

=======
@extends('layouts.app3')
@section('content')
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34
<div class="container" style=" height: 500px; background:url('public/storage/default_image/search-index-image-one.jpg');">
<div class="pref">

	<span class=""><b style="font-size: 19px;">Select what your friend and you should have in common...</b></span>
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
<<<<<<< HEAD
  	<b style="font-size: 12px;">Search by name?<a href="/search2">Click here</a></b>
</div>

=======
  	<b style="font-size: 12px;">Search by name?<a href="">Click here</a></b>
</div>
<div class="sbyname" style="display: none;">
	 <b>Or</b>
	<input type="text" name="" class="form-control" placeholder="Searh by name">
	<button type="buutton" class="btn btn-block btn-info">Find</button>
	<br><br>
</div>
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34
	
	<div class="result">
		<img src="">
    </div>

 </div>
</div>
<<<<<<< HEAD

@endif


=======
>>>>>>> 09edcf30ca9665c4cf76d2e73fa7ec2936991d34
@endsection