@extends('layouts.app5')
@section('content')
<div class="card">
<div class="card-body">
	<!-- <i class="	fa fa-ellipsis-v cursor-pointer" style="float: right;"></i> -->
    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px; float: right;" data-toggle="modal" data-target="#Model2" ></i>

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

    <div class="modal fade" id="Model2"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

					<div class="card" style="width: 100%; text-align:center;">
					  <ul class="list-group list-group-flush">
					    <a href="/deletepostid-{{$post->id}}">
					    <li class="list-group-item cursor-pointer color-black">Share</li></a>
					    <a href="/deletepostid-{{$post->id}}">
					    <li class="list-group-item cursor-pointer color-black">Edit</li></a>
					    <a href="/deletepostid-{{$post->id}}">
					    <li class="list-group-item cursor-pointe color-black">Delete</li></a>
					  </ul>
					</div>

          </div>
        </div>
      </div>

@endsection