@extends('layouts.app5')
@section('content')
<div class="reload">
<div class="container-fluid">
	@if(count($posts)>0)
	@foreach($posts as $post)
<div class="card">
	<div class="card-body">
		{{$post->id}}
	<a href="/viewpost{{$post->id}}" style="text-decoration: none; color: black;">
	 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
	<span style="font-size: 20px;">{{$post->post}}</span>
	<br>
	<small>{{Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}</small>
	<footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$post->user_id}}">{{$post->user_name}}</a></cite></footer>
	</a></div>


	<div class="card-footer " id="">
  	<button class="like btn btn-light cursor-pointer float-left" id="{{$post->id}}" value="{{$post->id}}" style="padding: ;">

  	<img src="public/storage/default_image/icons/heart1.png" class="like-heart"  id="{{$post->id}}" value="{{$post->likes}}"  style="margin:-15px 0px;  ">
  	
  		@if(count($likes)>0)
	@foreach($likes as $like)
	@if($like->post_id == $post->id)
	@if($like->user_id == auth()->user()->id)
  	<img src="public/storage/default_image/icons/heart2.png" class="like-heart"  id="{{$post->id}}"  value="{{$post->likes}}" style="margin: 4px -20px; position: absolute;">

	@endif
	@endif
	@endforeach
	@endif
  	</button>
  	<span class="float-left _{{$post->id}}" style="margin: 4px -7px;" id="_{{$post->id}}">{{$post->likes}}</span>
  	<a href="/viewpost{{$post->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
  	<span class="float-left" style="margin: 4px -2px;" id="">{{$post->comments}}</span>
    @csrf
    </div>
	@endforeach
	<br><br>
</div>
</div>
	@else
	no post
	@endif
	@csrf
	<input type="hidden" id="uid2" value="{{auth()->user()->id}}">
<script>
$(document).ready(function(){
// maintain filter gobal news feed
$('.g1').hide();
$('.l2').hide();
$('.f2').hide();
$('.m2').hide();
$('[data-toggle="popover"]').popover(); 
});
$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})
</script>
@endsection