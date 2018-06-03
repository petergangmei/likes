@extends('layouts.app3')
@section('content')
<br>
<div class="container">

<form method="post" enctype='multipart/form-data' action="/addfeed">
	@csrf
	<textarea class="form-control" placeholder="New post.." style="height: 80px;" name="post"></textarea><br>
	<input type="file" name="post_image">
	<br><br>
	<button type="submit" class="btn btn-primary btn-block">Post</button>
</form>

</div>


@endsection