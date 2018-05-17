@extends('layouts.app5')
@section('content')
<div class="card">
<div class="card-body">
	{{$post->post}}
</div>
<div class="card-footer">
  	<button class="like btn btn-light cursor-pointer float-left" value="">
  	<i class="fa fa-heart-o" value="1" style="font-size: 20px;"></i>
  	</button>
  	<span class="float-left" style="margin: 4px -7px;">{{$post->likes}} </span>
  	<a href="/viewpost" class="color-black"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px;"></i></a>
  	<span class="float-left" style="margin: 4px -2px;">{{$post->comments}} </span>
</div>
<div class="card">
	@if(count($comments)> 0)

	@foreach($comments as $comment)
	<ul class="list-group">
  	<li class="list-group-item">
  	<a href="/profileid-{{$comment->user_id}}"><small><b>{{$comment->user_name}}</b></small></a>
	{{$comment->comment}}
	
	</li>
	</ul>
	@endforeach

	@else
	@endif
	<br>

  	<form class="comment-form" method="post" action="/postcomment">
    @csrf
  		<input type="text" class="form-control float-left" placeholder="Comment" name="comment" style="width: 70%; margin: -5px 10px; height: 30px; border-radius: 10px; ">
  		<input type="hidden" name="postid" value="{{$post->id}}">
  		<button type="submit" class="btn btn-primary btn-sm float-left" style=" margin: -5px 0px; ">Post</button>
  	</form>	
<br>
</div>
</div>
@endsection