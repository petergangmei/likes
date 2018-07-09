@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-9 ">
      <div class="card">
      <div class="card-body">
        <form action="/admin/set_default_value" method="post">
          @csrf
          <input type="text" name="table" placeholder="table name">
          <input type="text" name="field" placeholder="field name">
          <input type="text" name="value" placeholder="value">
          <button type="submit">Submit</button>
        </form>
      </div>
  	  </div>
    </div>
    <div class="col-3 " style="">
      <ul class="list-group">
        <li class="list-group-item" >
            <a href="/admin" style="text-decoration: none; color: black;">
            <b>Index </b>
            </a>
        </li>
        <li class="list-group-item">
        	<a href="/admin/postnews" style="text-decoration: none; color: black;">
            Post News
            </a>
        </li>
        <li class="list-group-item" style="background-color: #8BC7F4; color: black;">
        Hard code default value
        </li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div>

        <div class="card">
          <div class="card-body">
            <b>Users Registers</b><hr>
            <b>Total users:</b> <br>
            <b>Mars users:</b><br>
            <b>Venus users:</b> 
          </div>
        </div>
        
        <div class="card">
          <div class="card-body">
            <b>Deposite coins</b> <hr>
            <form action="/admin/depositecoins" method="post">
              @csrf
            <button type="submit" class="btn btn-success" >Deposite Coins</button> 
            <select name="coins" class="form-control" style="width: 40%; float: left;">
              <option value="50">50</option>
              <option value="100">100</option>
              <option value="150">150</option>
            </select>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
	$('#custom-text').html('News');
</script>
@endsection