@extends('layouts.app5')
@section('content')
@csrf
<div class="container">
@if(count($post)>0)
 
 @foreach($post as $p)
<div class="card ">
<a href="/viewpost{{$p->id}}" style="text-decoration: none; color: black;">
  <div class="card-body">
@guest
 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
@else
 <i class="fa fa-ellipsis-v cursor-pointer" style="float: right;"></i>
@endguest

@if($p->image == 'null')
@else
<img src="/public/storage/posts_image/{{$p->user_id}}/{{$p->image}}" class="w-100" style="margin: 5px 0px;">
@endif
<span style="font-size: 20px;">{{$p->post}}</span>
<br>

<small>{{Carbon\Carbon::createFromTimestamp(strtotime($p->created_at))->diffForHumans()}}</small>

<footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$p->user_id}}">{{$p->user_name}}</a></cite></footer>

  </div>
</a>
  <div class="card-footer ">
  	<button class="like btn btn-light cursor-pointer float-left" value="{{$p->id}}">
  	<i class="fa fa-heart-o" value="1" style="font-size: 20px;"></i>
  	</button>
  	<span class="float-left" style="margin: 4px -7px;" id="">{{$p->likes}}</span>
  	<a href="/viewpost{{$p->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
  	<span class="float-left" style="margin: 4px -2px;" id="">{{$p->comments}}</span>
    @csrf
  </div>

</div>

 @endforeach

@else
<div class=" text-center">
  <p>You haven't post anything yet..</p>

  <img src="/public/storage/default_image/icons/suggestpost.png" style="float: bottom;">
</div>
@endif
</div>


</div>
<br>
<br>
<br>
<script>
$(document).ready(function(){
// maintain filter gobal news feed
$('.g2').hide();
$('.l2').hide();
$('.f1').hide();
$('.m2').hide();

});
</script>

@endsection