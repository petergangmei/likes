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
	<br><br>
	<h3>Find user by name..</h3>
	<form method="post" action="">
       @csrf
		<input type="text" name="username" class="form-control" placeholder="Enter name">
		<button type="button" class="btn btn-info">Search</button>
	</form>
</div>

@endif
@endsection