@extends('layouts.app3')
@section('content')
<br>
<div class="container">

<form method="post" action="/addfeed">
	@csrf
	<textarea class="form-control" placeholder="New post.." style="height: 80px;" name="post"></textarea><br>
	<input type="file" name="pic">
	<br><br>
	<button type="submit" class="btn btn-primary btn-block">Post</button>
</form>

</div>


@endsection