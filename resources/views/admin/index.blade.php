@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-9 ">
      <div class="card">
      <div class="card-body">
      	

      </div>
  	  </div>
    </div>
    <div class="col-3 ">
      <ul class="list-group">
        <li class="list-group-item" style="background-color: #8BC7F4; color: black;">
            <b>Post News</b>
        </li>
        <li class="list-group-item">
        	<a href="/admin/postnews" style="text-decoration: none; color: black;">
            Post News
            </a>
        </li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>

  </div>
</div>

<script>
	$('#custom-text').html('News');
</script>
@endsection