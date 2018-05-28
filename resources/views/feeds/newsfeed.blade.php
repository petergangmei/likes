@extends('layouts.app5')
@section('content')


<div class="container-fluid">
	@if(count($posts)>0)
	
	@foreach($posts as $post)
	<div class="card">
	<div class="card-body">
<a href="/viewpost{{$post->id}}" style="text-decoration: none; color: black;">
		
	@guest
	 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
	@else
	 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
	@endguest	

	<span style="font-size: 20px;">{{$post->post}}</span>
	<br>

	<small>{{Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}</small>

	<footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$post->user_id}}">{{$post->user_name}}</a></cite></footer>
		
	</div>
</a>
	
	  <div class="refresh">
	  <div class="card-footer ">
	  	<button class="like btn btn-light cursor-pointer float-left" value="{{$post->id}}">
	  	<i class="fa fa-heart-o" value="1" style="font-size: 20px;"></i>
	  	</button>
	  	<span class="float-left" style="margin: 4px -7px;" id="">{{$post->likes}}</span>
	  	<a href="/viewpost{{$post->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
	  	<span class="float-left" style="margin: 4px -2px;" id="">{{$post->comments}}</span>
	    @csrf
	  </div>
	</div>
	<br><br>
	</div>
	
	@endforeach
	@else
	no post
	@endif
</div>

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