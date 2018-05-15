@extends('layouts.app5')
@section('content')

<div class="container">
	<br>
	<form>
		<select class="form-control btn-outline-info btn-sm float-left" style="width: 100px;">
			<option>Global</option>
			<option>Local</option>
			<option>Global</option>
			<option>Myfeeds</option>
		</select>
		<button type="submit" class="btn btn-outline-info btn-md float-left">Filter</button>
	</form>
</div>


@endsection