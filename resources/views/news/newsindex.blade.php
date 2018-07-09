@extends('layouts.app_blank')
@section('content')
<div class="">
  @if(count($news)>0)
@foreach($news as $nws)
	<div class="card" style="padding:8px; border:1px solid black; margin:5px 0px;">
<small><b>[{{$nws->newstype}} News]</b></small>
  <div class="card-body">
   {!!$nws->description!!}
  </div>
  <div style="background-color: #FFF1E2; padding: 5px; "> <small><b> Update released: </b>{{Carbon\Carbon::createFromTimestamp(strtotime($nws->created_at))->diffForHumans()}}</small></div>
</div>


@endforeach
  @else
no update
  @endif

</div>

<script>
	$('#custom-text').html('News');
</script>
@endsection