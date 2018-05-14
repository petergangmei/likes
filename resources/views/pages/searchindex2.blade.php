@extends('layouts.app4')
@section('content')
@if($mypref->coffeeTea == '')
<div class="container text-center">
	<h4>You have not updated your preference</h4>
	<p>Please set up your preference to find a match..</p>
	<a href="/preferencepage1"> <button type="button" class="btn btn-info">Set preference</button></a>
</div>


@else

<div class="container">
	<br>
	<h3>Search by name..</h3>
	<form method="post" action="/searhbyname">
       @csrf
		<input type="text" name="username" class="form-control float-left" placeholder="Enter name" style="width: 70%;">
		<button type="submit" class="btn btn-info float-left">Search</button>
	</form>
</div>

@endif
@endsection