@extends('layouts.app5')
@section('content')

<div class="container">
	<br>
	<form>
		<select class="form-control btn-outline-info btn-sm float-left" style="width: 100px;">
			<option>Global</option>
			<option>Local</option>
			<option>Global</option>
			<option selected>Myfeeds</option>
		</select>
		<button type="submit" class="btn btn-outline-info btn-md float-left">Filter</button>
	</form>
<br><br>
<div class="">
@if(count($post)>0)
 
 @foreach($post as $p)
<div class="card">
  <div class="card-body">

<span style="font-size: 20px;">{{$p->post}}</span><br>

<small>{{Carbon\Carbon::createFromTimestamp(strtotime($p->created_at))->diffForHumans()}}</small>

<footer class="blockquote-footer">Posted by <cite title="Source Title">{{$p->user_name}}</cite></footer>

  </div>
  <div class="card-footer">
  	<i class="fa fa-heart-o cursor-pointer float-left" style="font-size: 20px;"></i>
  	<form>
  		<input type="text" class="form-control float-left" placeholder="comment" style="width: 70%; margin: -5px 10px; height: 30px; border-radius: 10px;">
  		<button type="button" class="btn btn-primary btn-sm float-left" style=" margin: -5px 0px;">Post</button>
  	</form>
  </div>
</div>

 @endforeach

@else
<p>You haven't post anything yet..</p>
@endif
</div>


</div>


@endsection