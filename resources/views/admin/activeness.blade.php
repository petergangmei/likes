@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-9 ">
      <div class="card">
      <div class="card-body" style="background-color: black; color: white; ">

        <div class="activeness" style="border-bottom: 1px solid white;">
          @if(count($dataa)>0)
          @foreach($dataa as $data)
        [{{$data->id}}]
        {{$data->created_at}}
        __
      {{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans()}}
        __
        {{$data->userid}}

         -> 
        {{$data->username}}

        <br>
          @endforeach
          @endif
        </div>
        <div class="activeness2">
        <b>Total: </b>{{count($t_dataa)}}
        <b>Total active: </b>{{count($total_active_users)}}
          
        </div>


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
    setInterval(
    function()
        {
          $('.activeness').load(' .activeness');
          $('.activeness2').load(' .activeness2');
                  }, 1000);

	$('#custom-text').html('News');
</script>
@endsection