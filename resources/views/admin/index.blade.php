@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-9 ">
      <div class="card">
      <div class="card-body">
        @if(count($users)>0)
        @foreach($users as $user)
        <a href="/profileid-{{$user->id}}" style="color: black; text-decoration: none;">
        <div class="card">
          <div class="card-body">
            @if($user->profile_image == 'null')
           <img src="/public/storage/default_image/avatar.png" height="50" width="50" style="width: 50px; height: 50px; border:1px solid black; border-radius: 100%; float: left;">

            @else
           <img src="/public/storage/profile_image/{{$user->id}}/{{$user->profile_image}}" height="50" width="50" style="width: 50px; height: 50px; border:1px solid black; border-radius: 100%; float: left;">
           @endif 
           <div style="border:0px solid black; float: left; width: 90px;"><b> {{$user->name}}</b></div> <i>({{$user->gender}})</i>
        </a>

           <span class="margin-left" style="float: center;">{{$user->location}} , {{$user->country}}</span> 
          {{$user->email}}
          <b>[{{$user->profile_visits}}]</b>


           <small style="float: right;">
             {{Carbon\Carbon::createFromTimestamp(strtotime($user->activeness))->diffForHumans()}}
            <!-- <button type="button" class="btn btn-success">Deposite coins</button> -->
          <small><b> Coins: </small> {{$user->coins}}</b>
            {{Carbon\Carbon::createFromTimestamp(strtotime($user->created_at))->diffForHumans()}}
           </small>
            
          </div>
        </div>
        
        @endforeach
        @else

        @endif
      </div>
  	  </div>
    </div>
    <div class="col-3 " style="">
      <ul class="list-group">
        <li class="list-group-item" style="background-color: #8BC7F4; color: black;">
            <b>Index </b>
        </li>
        <li class="list-group-item">
        	<a href="/admin/postnews" style="text-decoration: none; color: black;">
            Post News
            </a>
        </li>
        <li class="list-group-item">
          <a href="/admin/setvalue" style="text-decoration: none; color: black;">
        Hard code value
        </a>
      </li>
        <li class="list-group-item">
          <a href="/admin/activeness" style="text-decoration: none; color: black;">
        Check activeness
          </a>
        </li>

        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div>

        <div class="card">
          <div class="card-body">
            <b>Users Registers</b><hr>
            <b>Total users:</b> {{count($users)}}<br>
            <b>Mars users:</b> {{count($mars)}}<br>
            <b>Venus users:</b> {{count($venus)}}
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