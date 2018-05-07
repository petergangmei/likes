@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-xs-12" style="width: 100%;">
            <div class="card profile-section">
                <div class="card-body  border-blac">
                    <button class="btn btn-default btn-sm" style="opacity: 0.8; background-color: black; color: white; position: absolute; margin: 75px 15px; border-radius: 100%; height: 25px; width: 25px;" data-toggle="modal" data-target="#Model1"><i class="fa fa-plus" style="font-size: 10px;"></i></button>
                    
                    <?php if("" != auth()->user()->profile_image){ ?>
                    <img src="/public/storage/profile_image/{{auth()->user()->id}}/{{auth()->user()->profile_image}} " class="profile-pic">

                    <?php } else { ?>
                    <img src="/public/storage/default_image/avatar.png " class="profile-pic">

                        <?php } ?>

                  <br> <b>{{ Auth::user()->name }}</b>
                    <?php if('Mars' == auth()->user()->gender){ ?>
                  <br> <i class="fa fa-mars"> 

                    <?php } else { ?>

                  <br> <i class="fa fa-venus"> 

                    <?php } ?>
                    {{Auth::user()->gender}} </i>                     
                  <br>
                     
                  <span id="bio"><?php echo $bio->bio; ?> </span>
                   <i class="fa fa-edit cursor-pointer" id="bio-edit"></i> 
                <form method="POST" action="update_bio">
                    @csrf
                  <textarea class="form-control" name="bio" id="bioTextarea"><?php echo $bio->bio; ?>
                  </textarea>
                  <button type="button" id="cancel-bio" class="btn btn-danger btn-sm" style="display: none;">Cancel</button>
                  <button type="submit" id="update-bio" class="btn btn-default btn-sm" style="display: none;">Update</button>
                </form>
                </div>
 
                <div class="card-body border-blac" style="min-height: 150px;">

<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active color-black" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Friends </a>
  </li>

  <li class="nav-item">
    <a class="nav-link  color-black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Photos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link color-black" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">About</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <!-- photo -->
  <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
      @if(count($photos)> 0 )
                  <div class="col-md-12">
                    @foreach($photos as $photo)

                      <div style="border:1px solid silver; width: 120px; float:left; margin:2px 2px; " class="border-black  cursor-pointer">
                          <a href="photoid-{{$photo->id}}"><img style="width: 100%; height: 100%;" src='public/storage/photos/{{auth()->user()->id}}/{{ $photo->image }}'>
                            </a>
                      </div>
                      @endforeach
                  </div>
      @else
          <div class="text-center padding-lg">
          <p>You haven't uploaded anything photo yet.</p>
          </div>
      @endif
          <i class="fa fa-plus-square-o cursor-pointer" style="font-size: 80px; margin: 15px 10px; position: ; float: left;" data-toggle="modal" data-target="#Model2"></i>

  </div>
  <!-- friends -->
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<ul class="list-group">


<ul class="nav nav-pills  nav-fill" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active btn-sm color-black" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Friends <span class="badge badge-info"> {{$friends->count()}} </span> </a>
  </li>
  <li class="nav-item">
    <a class="nav-link  btn-sm color-black" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Request <span class="badge badge-info"> {{$visitors->count()}} </span> </a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    @if(count($friends)> 0)
      @foreach($friends as $friend)
          <li class="list-group-item"><img src="/public/storage/profile_image/{{$friend->visitor_id}}/{{$friend->profile_image}}" class="float-left" style="width: 50px; height: 50px; border: 1px solid black;"> 
      <b class="magin-left ">{{$friend->visitor_name}}</b> <b style="font-size: 10px;">({{$friend->gender}})</b> <br> 
       <button  class="btn-outline-primary padding-sm border-radius cursor-pointer accept" value="{{$friend->visitor_id}}"><i  class="fa fa-comments "  id="accept"> </i> Message</button> 
    </li>
      @endforeach
    @else
    <p>You still do not have any friends in likesss. </p>
    @endif

  </div>
  <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
  <div class="request_list"> 
    @if(count($visitors)> 0)
    @foreach($visitors  as $visitor)
    <li class="list-group-item"><img src="/public/storage/profile_image/{{$visitor->visitor_id}}/{{$visitor->profile_image}}" class="float-left" style="width: 50px; height: 50px; border: 1px solid black;"> 
      <b class="magin-left ">{{$visitor->visitor_name}}</b> <b style="font-size: 10px;">({{$visitor->gender}})</b> <br> 
       <button  class="btn-info padding-sm border-radius cursor-pointer accept" value="{{$visitor->visitor_id}}"><i  class="fa fa-check  " value="1"  id="accept">accept</i></button> 
       <button  class=" btn-danger border-radius cursor-pointer cancel" value="{{$visitor->visitor_id}}"><i  class="fa fa-close   " value="1"  id="accept">Cancel</i></button> 
    </li>
    @endforeach
  @else
  @endif  
  </div>

</div>
</div>



</ul>


  </div>
  <!-- about -->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h3>{{$user->name}}</h3>

    <?php if('Mars' == auth()->user()->gender){ ?>
  <br> <i class="fa fa-mars"> 

    <?php } else { ?>

  <br> <i class="fa fa-venus"> 

    <?php } ?>
    {{Auth::user()->gender}} </i> <br>
  {{$user->date}}/{{$user->month}}/{{$user->year}}    
  </div>
</div>


                    <!-- <img src="public/storage/photos/{{auth()->user()->id}} " class="photo" style="float: left;"> -->


                </div>
            </div>

                <div class="modal fade" id="Model1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Uploade profile image</h5>

                          <form method="POST" enctype='multipart/form-data' action="/uploadprofile_img">
                        @csrf
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="profile_type", value="profile_image">

                          <div class="custom-file">
                          <input type="file" class="custom-file-input" name="profile_pic" id="validatedCustomFile" required>
                          <label class="custom-file-label" id="file1" for="validatedCustomFile">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Upload</button>
                        </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="modal fade" id="Model2"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Add Photo</h5>

                          <form method="POST" enctype='multipart/form-data' action="/add_photo">
                        @csrf
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="profile_type", value="profile_image">

                          <div class="custom-file">
                          <input type="file" class="custom-file-input" name="profile_pic2" id="validatedCustomFile" required>
                          <label class="custom-file-label" id="file1" for="validatedCustomFile">Choose file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-default" name="" value="Upload">
                        </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>





        </div>
    </div>
</div>
<br><br>
@endsection
