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
                  <span id="bio"><?php echo $data->bio; ?> </span><hr>
                  
                  <div style="border:0px solid black; height: 50px;">
                  <article class="float-left cuswidth1" style="background-color: #F4FCFB; width: 20%; border-radius: 5px;">
                  {{count($likes)}} <br> Likes
                  </article>      
                  <article class="float-left cuswidth1" style="margin-left: 5px; background-color: #F4FCFB; width: 20%; border-radius: 5px;">
                  {{count($posts)}} <br> Posts
                  </article>
                  <article class="float-left cuswidth1" style="margin-left: 5px; background-color: #F4FCFB; width: 20%; border-radius: 5px;">
                  {{count($tphotosc)}} <br> Photos
                  </article>                                                  
                  <article class="float-left cuswidth1" style="margin-left: 5px; background-color: #F4FCFB; width: 20%; border-radius: 5px;">
                  {{$data->friends}} <br> Friends
                  </article>

                  </div>
                  <br>

                  @if($visitor == 'Matchresult')
                  <br>
                  <span data-toggle="modal" data-target="#Model-matchout" style="border:1px solid silver; border-radius:5px; padding: 10px; margin-right: 5px;" class="cursor-pointer"></i>
                    <i class="fa fa-bar-chart" style="font-size: 20px;"></i>
                  View Match Result
                </span>
                 @if($data->message_privacy == "Everyone")
                  <a href="/messages/{{$data->name}}/{{$data->id}}" style="text-decoration: none; color: black;">
                  <span  style="border:1px solid silver; border-radius:5px; padding: 10px;"></i>
                  <i class="fa fa-comments-o" style="font-size: 25px;"></i>Message
                  </span>
                  </a>
                 @else
                  @if($friendresult == 'Friend')
                  <a href="/messages/{{$data->name}}/{{$data->id}}" style="text-decoration: none; color: black;">
                  <span  style="border:1px solid silver; border-radius:5px; padding: 10px;"></i>
                  <i class="fa fa-comments-o" style="font-size: 25px;"></i>Message
                  </span>
                  </a>
                  @else
                 <span data-toggle="modal" data-target="#message_notallow" style="border:1px solid silver; border-radius:5px; padding: 10px;"></i>
                  <i class="fa fa-comments-o"  style="font-size: 25px;"></i>Message
                  </span>
                  @endif                  
         

                 @endif

                 

                  @else
                  <div style="border:1px solid #F9FFFE;  border-radius: 5px; background-color: #F9FFFE; border:1px solid gray; " class="cursor-pointer" data-toggle="modal" data-target="#Model-matchout">
                  <span style="font-size: 15px;">
                    You
                  <img src="/public/storage/default_image/icons/logo1.png" height="80" width="80">
                   {{$data->name}}
                  </span>
                  <p><i>Click here to match up!</i></p>
                  </div>
                  @endif
                  <div style="border:0px solid silver;">
                </div>
                </div>
                <!-- feature photos -->
                <div class="card-body border-blac" style="min-height: 150px; height: 100%;">
                    @if(count($photos)> 0 )
                  <article class="text-center" style="border:1px solid #F6F3F3; padding: 5px;">
                  <i class="fa fa-object-group glclick" id="active" value="Grid" style="font-size: 21px; color:#A0A0A0;">Grid</i>
                  <i class="fa fa-navicon glclick" id="notactive" value="List" style="font-size: 21px; margin-left: 8px; color:#A0A0A0;">List</i>
                  </article>                    
                      <div class="col-md-12 " style="height: 80px;">
                        @foreach($photos as $photo)
                        @if($photo->image_type == 'featured_photo')
                        <div  style="border:1px solid silver; width: 48%; float:left; margin:2px 2px; " class="fdivs border-black  cursor-pointer">
                              <a href="photoid-{{$photo->id}}">
                                <img class="fphotos" style="width: 140px; height: 140px;" src='public/storage/photos/{{$data->id}}/{{ $photo->image }}'>
                                </a>
                          </div> 
                        @else
                        <div  style="border:1px solid silver; width: 140px; float:left; margin:2px 2px; " class="fdivs border-black  cursor-pointer">
                              <a href="photoid-{{$photo->id}}">
                                <img class="fphotos" style="width: 140px; height: 140px;" src='public/storage/posts_image/{{$data->id}}/{{ $photo->image }}'>
                                </a>
                          </div>
                        @endif
                          @endforeach
                      <a href="/{{$data->name}}/{{$data->id}}/photos" class="btn-link"><p>See more</p></a>
                      </div>
                    @else

                        <div class="text-center padding-lg">
                        <p>Feature photos not uploated by, {{$data->name}}</p>
                        </div>
                    @endif
                </div>
                <!-- end feature photos -->
                <!-- Recent post -->
                <div class="card">
                  <div class="card-body">
                  <i class="fa fa-history"><b>Rcent Post</b></i>
                    
                    @if(count($posts)>0)
                    @foreach($posts as $post)
                     
                      @if($post->image == 'null')

                      <div class="card">
                        <div class="card-body">
                        <a href="/viewpost{{$post->id}}" style="text-decoration: none; color: black;">
                        <span style="font-size: 20px;">{{$post->post}}</span>
                        <br>
                        <small>{{Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}</small>
                        <footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$post->user_id}}">{{$post->user_name}}</a></cite></footer>
                        </a></div>


                        <div class="card-footer " id="">
                          <button class="like btn btn-light cursor-pointer float-left" id="{{$post->id}}" value="{{$post->id}}" style="padding: ;">

                          <img src="public/storage/default_image/icons/heart1.png" class="like-heart"  id="{{$post->id}}" value="{{$post->likes}}" alt="{{$post->id}}" style="margin:-15px 0px;  ">
                          
                            @if(count($likes)>0)
                        @foreach($likes as $like)
                        @if($like->post_id == $post->id)
                        @if($like->user_id == auth()->user()->id)
                          <img src="public/storage/default_image/icons/heart2.png" class="like-heart"  id="{{$post->id}}"  value="{{$post->likes}}" alt="{{$post->id}}" style="margin: 4px -20px; position: absolute;">

                        @endif
                        @endif
                        @endforeach
                        @endif
                          </button>
                          <span class="float-left _{{$post->id}}" style="margin: 4px -7px;" id="_{{$post->id}}">{{$post->likes}}</span>
                          <a href="/viewpost{{$post->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
                          <span class="float-left" style="margin: 4px -2px;" id="">{{$post->comments}}</span>
                          @csrf
                          </div>
                        </div>
                        @else
                        <!-- image content in this post -->
                        <div class="card">
                        <div class="card-body">
                        <a href="/viewpost{{$post->id}}" style="text-decoration: none; color: black;">
                        <img src="/public/storage/posts_image/{{$post->user_id}}/{{$post->image}}" class="w-100">   
                        
                        <span style="font-size: 15px;">{{$post->post}}</span>

                        <br>
                        <small>{{Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}</small>
                        <footer class="blockquote-footer">Posted by <cite title="Source Title"><a href="/profileid-{{$post->user_id}}">{{$post->user_name}}</a></cite></footer>
                        </a></div>


                        <div class="card-footer " id="">
                          <button class="like btn btn-light cursor-pointer float-left" id="{{$post->id}}" value="{{$post->id}}" style="padding: ;">

                          <img src="public/storage/default_image/icons/heart1.png" class="like-heart"  id="{{$post->id}}" value="{{$post->likes}}" alt="{{$post->id}}" style="margin:-15px 0px;  ">
                          
                            @if(count($likes)>0)
                        @foreach($likes as $like)
                        @if($like->post_id == $post->id)
                        @if($like->user_id == auth()->user()->id)
                          <img src="public/storage/default_image/icons/heart2.png" class="like-heart"  id="{{$post->id}}"  value="{{$post->likes}}" alt="{{$post->id}}" style="margin: 4px -20px; position: absolute;">

                        @endif
                        @endif
                        @endforeach
                        @endif
                          </button>
                          <span class="float-left _{{$post->id}}" style="margin: 4px -7px;" id="_{{$post->id}}">{{$post->likes}}</span>
                          <a href="/viewpost{{$post->id}}"> <i class="fa fa-comment-o cursor-pointer float-left" style="font-size: 21px; margin: 3px 7px; color: black;"></i></a>
                          <span class="float-left" style="margin: 4px -2px;" id="">{{$post->comments}}</span>
                          @csrf
                          </div>
                        </div>
                        @endif

                    @endforeach
                    @else
                    post not available
                    @endif
                  </div>
                  
                </div>
                <!-- end recent post -->
            </div>
        </div>
    </div>
</div>
<br><br>

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

<!-- Modal -->
<div class="modal fade" id="message_notallow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Notice!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       You can send  text message only once you and {{$data->name}} bcomes friend.<br>
       <!-- <small><i><b>{{$data->name}}</b> set's privacy that only friends can send a message.</i></small>  -->

      </div>
    </div>
  </div>
</div>

@endsection