@extends('layouts.app5')
@section('content')

<div class="container">
	<button type="button" class="btn btn-outline-primary">Global Feed</button>
	<button type="button" class="btn btn-outline-primary">Friends Feed</button>
	<button type="button" class="btn btn-primary">My Feed</button>
<br>
<div class="">
@if(count($post)>0)
 
 @foreach($post as $p)
<div class="card">
  <div class="card-body">
@guest
 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
@else
 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
@endguest
<span style="font-size: 20px;">{{$p->post}}</span>
<br>

<small>{{Carbon\Carbon::createFromTimestamp(strtotime($p->created_at))->diffForHumans()}}</small>

<footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$p->user_id}}">{{$p->user_name}}</a></cite></footer>

  </div>
  <div class="card-footer">
  	<button class="like btn btn-light cursor-pointer float-left" value="{{$p->id}}">
  	<i class="fa fa-heart-o" value="1" style="font-size: 20px;"></i>
  	</button>
  	<i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 5px 7px;"></i>
    @csrf

  	<form>
  		<input type="text" class="form-control float-left" placeholder="comment" style="width: 70%; margin: -5px 10px; height: 30px; border-radius: 10px; display: none;">
  		<button type="button" class="btn btn-primary btn-sm float-left" style=" margin: -5px 0px; display: none;">Post</button>
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