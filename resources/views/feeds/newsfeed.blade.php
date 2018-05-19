@extends('layouts.app5')
@section('content')

<div class="container">
	<button type="button" class="btn btn-primary">Global Feed</button>
	<button type="button" class="btn btn-outline-primary">Friends Feed</button>
	<a href="/myfeeds"><button type="button" class="btn btn-outline-primary">My Feed</button></a>

</div>
<br>
<div class="container-fluid">
	@if(count($posts)>0)
	
	@foreach($posts as $post)
	<div class="card">
	<div class="card-body">
		
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


@endsection