@extends('layouts.app4')
@section('content')
<div class="container-fluid">
	<br>
	<h3>Search by name..</h3>
	<form method="post" action="/searhbyname">
       @csrf
		<input type="text" name="username" class="form-control float-left" placeholder="Enter name" style="width: 70%;" value="{{$keyword}}">
		<button type="submit" class="btn btn-info float-left">Search</button>
	</form>
	<br>
	<hr>

@if(count($user)>0)

@foreach($user as $usr)

<ul class="list-group">
  <li class="list-group-item">
  	<a href="/profileid-{{$usr->id}}" style="text-decoration: none; color: black;"> 	
  	 @if($usr->profile_image == "null")
        <img src="/public/storage/default_image/avatar.png" class="float-left" style="width: 50px; height: 50px; border: 1px solid black;">
      @else
        <img src="/public/storage/profile_image/{{$usr->id}}/{{$usr->profile_image}}" class="float-left" style="width: 50px; height: 50px; border: 1px solid black;"> 
      @endif

  	<span class="margin-left"><b>{{$usr->name}}</b> <small>({{$usr->gender}})</small>

  	</span>
  	</a>
  </li>
</ul>

@endforeach

@else
Not found.. try other keyword

@endif



</div>
@endsection