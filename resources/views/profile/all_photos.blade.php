@extends('layouts.app_blank')
@section('content')
<div class="card">

<!-- feature photos -->
<div class="card-body border-blac" style="min-height: 150px; height: 100%;">
<article class="text-center" style="border:1px solid #F6F3F3; padding: 5px;">
<i class="fa fa-object-group glclick" id="active" value="Grid" style="font-size: 21px; color:#A0A0A0;">Grid</i>
<i class="fa fa-navicon glclick" id="notactive" value="List" style="font-size: 21px; margin-left: 8px; color:#A0A0A0;">List</i>
</article>  
	@foreach($photos as $photo)
  <div class="col-md-12 " >
    @if($photo->image_type == 'featured_photo')
    <div  style="border:1px solid silver; width: 140px; float:left; margin:2px 2px; " 
    class="fdivs border-black  cursor-pointer">
          <a href="{{$photo->id}}">
            <img class="fphotos" style="width: 140px; height: 140px;" src="{{$photo->image}}">

            </a>
      </div> 
    @else
    <div  style="border:1px solid silver; width: 140px; float:left; margin:2px 2px; " 
    class="fdivs border-black  cursor-pointer">
          <a href="{{$photo->id}}">				
            <img class="fphotos" style="width: 140px; height: 140px;" src='{{ $photo->image }}'>
            </a>
      </div>
    @endif
  </div>

                <!-- end feature photos -->



	@endforeach
</div>
<script>
$('#custom-text').html('Photos');
</script>
@endsection