@extends('layouts.app_viewprofile')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-xs-12" style="width: 100%;">
            <div class="card profile-section">
                <div class="card-body  border-blac">
                    
                    <?php if("null" !== $data->profile_image){ ?>
                    <img src="/public/storage/profile_image/{{$data->id}}/{{$data->profile_image}} " class="profile-pic" data-toggle="modal" data-target="#Model2">

                    <?php } else { ?>
                    <img src="/public/storage/default_image/avatar.png " class="profile-pic">

                    <?php } ?>
                  <br> <b>{{ $data->name }}</b>
                    <?php if('Mars' == $data->gender){ ?>
                  <br> <i class="fa fa-mars"> 
                    <?php } else { ?>
                  <br> <i class="fa fa-venus"> 
                    <?php } ?>

                    {{$data->gender}} </i>                     
                  <br>
                     
                  <span id="bio"><?php echo $data->bio; ?> </span><br>

                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#Model-matchout">{{$visitor}}</button>
                  
                </div>
                <hr>
                <div class="card-body border-blac" style="min-height: 150px;">
                    @if(count($photos)> 0 )
                                <div class="col-md-12">
                                  @foreach($photos as $photo)

                                    <div style="border:1px solid silver; width: 140px; float:left; margin:2px 2px; " class="border-black  cursor-pointer">
                                        <a href="photoid-{{$photo->id}}"><img style="width: 100%; height: 100%;" src='public/storage/photos/{{$data->id}}/{{ $photo->image }}'>
                                          </a>
                                    </div>
                                    @endforeach
                                </div>
                    @else
                        <div class="text-center padding-lg">
                        <p>Feature photos not uploated by, {{$data->name}}</p>
                        </div>
                    @endif

                    <!-- <img src="public/storage/photos/{{auth()->user()->id}} " class="photo" style="float: left;"> -->
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="modal fade" id="Model-matchout"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <span class="modal-title" id="exampleModalLongTitle"><span style="font-size: 13px;">Find out what <b>{{$data->name}}</b> and your common likes.</span></span>

              <form method="POST" enctype='multipart/form-data' action="/matchout">
            @csrf
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <input type="hidden" name="profile_type", value="profile_image">
            <input type="hidden" name="userid" value="{{$data->id}}">
            <input type="hidden" name="mycoins" id="mycoins" value="{{$data->coins}}">
            <input type="hidden" name="profile_image" id="profile_image" value="{{$data->profile_image}}">
            <input type="hidden" name="gender" id="gender" value="{{$data->gender}}">
            <input type="hidden" name="matched" id="matched" value="{{$visitor}}">
              <span id="text1"><i>It will consum <b>10 coins</b> to uncover</i>, you currently have <b >{{$coins->coins}} coins!</b> Wanna continue?</span>
            </div>
                <input type="submit" class="btn btn-default" name="" value="Continue">
            </form>
          </div>
        </div>
      </div>

@endsection