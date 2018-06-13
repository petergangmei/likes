@extends('layouts.app_edit')
@section('content')
<div class="">
@csrf
<div class="card">
<div class="card-body"> 
	  	<div class="row">
	  		<div class="col-8">
	   			<b>Messaging</b><br>
	   			<Span>
	   				<small>
	   				Who can send youu a message.
	   				</small>
	   			</span>
	   		</div>
	   		<div class="col-4">
	   			<select class="form-control btn-sm" name="message_privacy" id="message_privacy" style="padding:0; font-size: 10px;">
	   				@if($currentsetting->message_privacy == 'Everyone')
	   				<option value="Everyone">Everyone</option>
	   				<option value="Friends">Friends</option>
	   				@else
	   				<option value="Friends">Friends</option>
					<option value="Everyone">Everyone</option>
	   				@endif
	   			</select>
	   		</div>
	   </div>
</div>
<div class="card-body" style="border-top: 1px solid silver;"> 
	  	<div class="row">
	  		<div class="col-8">
	   			<b>Comments</b><br>
	   			<Span>
	   				<small>
	   				Who can comment in your post.
	   				</small>
	   			</span>
	   		</div>
	   		<div class="col-4">
	   			<select class="form-control btn-sm" name="comment_privacy" id="comment_privacy" style="padding:0; font-size: 10px;">
	   				@if($currentsetting->comment_privacy == 'Everyone')
	   				<option value="Everyone">Everyone</option>
	   				<option value="Friends">Friends</option>
	   				@else
	   				<option value="Friends">Friends</option>
					<option value="Everyone">Everyone</option>
	   				@endif
	   			</select>
	   		</div>
	   </div>
</div>
<div class="card-body" style="border-top: 1px solid silver;"> 
	  	<div class="row">
	  		<div class="col-8">
	   			<b>Message count</b> <br>
	   			<Span>
	   			<small>How many peoples can send you a message in 24 hours.
	   			</small>
	   		</span>
	   		</div>
	   		<div class="col-4">
	   			<select class="form-control btn-sm" name="message_privacy2" id="message_privacy2" style="width: 100%; padding: 0; font-size: 10px;">
	   				<option value="{{$currentsetting->message_privacy2}}">
	   					{{$currentsetting->message_privacy2}} Peoples
	   				</option>
	   				<option value="100000">Unlimited</option>
	   				<option value="10">10 Peoples</option>
	   				<option value="9">9 Peoples</option>
	   				<option value="8">8 Peoples</option>
	   				<option value="7">7 Peoples</option>
	   				<option value="6">6 Peoples</option>
	   				<option value="5">5 Peoples</option>
	   				<option value="4">4 Peoples</option>
	   				<option value="3">3 Peoples</option>
	   				<option value="2">2 Peoples</option>
	   				<option value="1">1 People</option>
	   			</select>
	   		</div>
	   </div>
</div>	
<div class="card-body" style="border-top: 1px solid silver;"> 
	  	<div class="row">
	  		<div class="col-8">
	   			@if($currentsetting->account_status == 'Deactivated')
	   			<b>Activate Account</b>
	   			@else
	   			<b>Deactivate Account</b>

	   			@endif
	   			<br>
	   				<small>
	   					When you deactivate your account you will not be available to other users.
	   				</small>
	   		</div>
	   		<div class="col-4">

	   			@if($currentsetting->account_status == 'Deactivated')
	   			<i class="fa fa-toggle-off" data-toggle="modal" data-target="#activate_account" id="aa-btn" style="font-size: 45px;"></i>
	   			<input type="hidden" id="account_status" value="Activated">
	   			@else
	   			<i class="fa fa-toggle-on"  data-toggle="modal" data-target="#deactivate_account" id="aa-btn" style="font-size: 45px;"></i>
	   			<input type="hidden" id="account_status" value="Deactivated">
	   			@endif
	   		</div>
	   </div>
</div>
</div>	
</div>
<i><b>*Important Note</b> the updated comments privacy will get applied on post you made from now onward.  </i>
</div>

@if($currentsetting->account_status == 'Deactivated')
<!-- Modal -->
<div class="modal fade" id="activate_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalCenterTitle">Warning!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you would want to <b>ACTIVATE</b> this account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal"  id="deactivate_account" data-toggle="modal" data-target="#spinner">Activate now</button>
      </div>
    </div>
  </div>
</div>
@else
<!-- Modal -->
<div class="modal fade" id="deactivate_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalCenterTitle">Warning!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you would want to <b>DEACTIVATE</b> your account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="deactivate_account" data-toggle="modal" data-target="#spinner">Yes, Deactivate</button>
      </div>
    </div>
  </div>
</div>
@endif
<script>
$('#custom-text').html('Account Setting');
$('#ok-btn-update-account-setting').css('display','block');
$('#custom-nav').css('background-color', '#F8F7F2');
</script>
@endsection