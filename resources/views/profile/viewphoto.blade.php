@extends('layouts.app_blank')
@section('content')
<div>
	<div class="card">
		<div class="card-body">
			@if($photo->image_type == 'featured_photo')
			<img src="/public/storage/photos/{{$photo->user_id}}/{{$photo->image}}" style="width: 100%;">
			@else
			<img src="{{$photo->image}}" style="width: 100%;">

			@endif
		</div>
	</div>
</div>
<script>
$('#custom-text').html('Photo');
</script>
@endsection