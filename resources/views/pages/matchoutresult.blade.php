@extends('layouts.app_viewprofile')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-xs-12" style="width: 100%;">
            <div class="card profile-section">
                <div class="card-body  border-blac">
                    <?php if("" != $data->profile_image){ ?>
                    <img src="/public/storage/profile_image/{{$data->id}}/{{$data->profile_image}} " class="profile-pic border-black" data-toggle="modal" data-target="#Model2">
                    <?php } else { ?>
                    <img src="/public/storage/default_image/avatar.png " class="profile-pic">
                    <?php } ?>

                    <?php if("" != $data1->profile_image){ ?>
                    <img src="/public/storage/profile_image/{{$data1->id}}/{{$data1->profile_image}} " class="profile-pic border-black" data-toggle="modal" data-target="#Model2">
                    <?php } else { ?>
                    <img src="/public/storage/default_image/avatar.png " class="profile-pic">
                    <?php } ?>


                  <br> <b>You</b> & <b>{{$data1->name}}</b><br>
                   <input type="hidden" id="result_val" value="{{$result_val}}">
                   <b style="font-size: 50px;">{{$result_val}}%</b><br> 
                    {{ csrf_field() }}
                   <button type="button"  class="btn btn-outline-secondary btn-md"><i class="fa fa-user-plus" id="addrequest"> {{$status->status}} </i></button><br>
                   <b id="cancelrequest" style="font-size: 12px; color: red; cursor: pointer;"></b>
                   <input type="hidden" name="" id="user_id" value="{{$data1->id}}">

                </div>
                <hr>
                <div class="card-body border-blac" style="min-height: 150px; text-align: left;">
                	(1) {{$vv1}}<br><br> 
                	(2) {{$vv2}}<br><br>
                	(3) {{$vv3}}<br><br>
                	(4) {{$vv4}}<br><br>
                	(5) {{$vv5}} {{$sow}}<br><br>
                	(6) {{$vv6}}<br><br>
                	(7) {{$vv7}}<br><br>
                	(8) {{$vv8}}<br><br>
                	(9) {{$vv9}}<br><br>
                	(10) {{$vv10}}<br><br>
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
            <input type="hidden" name="userid" value="{{$data->id}}">
            <input type="hidden" name="mycoins" id="mycoins" value="{{$data->coins}}">
              <i>It will consum <b>10 coins</b> to uncover</i>, you currently have <b > coins!</b> Wanna continue?
            </div>
                <input type="submit" class="btn btn-default" name="" value="Continue">
            </form>
          </div>
        </div>
      </div>

      <br><br><br>

@endsection