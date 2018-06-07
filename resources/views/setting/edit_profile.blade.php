@extends('layouts.app_edit')
@section('content')
<div>
<form method="post" action="/update_profile">
	@csrf
<div class="card">
  <div class="card-body">
<!-- <div class="toast-body mx-auto"><i class="fa fa-exclamation-circle"></i><span id="toast"></span></div> -->

  	<div class="text-center">

  		@if($userdetail->profile_image == 'null')
  		<img src="/public/storage/default_image/avatar.png" style="width: 80px; height: 80px; border-radius: 100%;">
  		@else
  		<img src="/public/storage/profile_image/{{$userdetail->id}}/{{$userdetail->profile_image}}" style="width: 80px; height: 80px; border-radius: 100%;">
  		@endif
  	</div>

  	<label style="color: silver">Name</label>
  	<input type="text" name="name" value="{{$userdetail->name}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="name" class="custom-fc"   autocomplete="off">
  	<br><br>
  	<label style="color: silver;">Location</label>
  	<input type="text" name="location" value="{{$userdetail->location}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="location" class="custom-fc"  autocomplete="off">

  	<br><br>
  	<label style="color: silver;">Country</label>
  	
  	<select class="custom-fc" id="country"  name="country" id="country" >
	        <option value="{{$userdetail->country}}">{{$userdetail->country}}</option>
	        <option value="India">India</option>
	        <option value="China">China</option>
	</select>
	   

  	<br><br>
  	<label style="color: silver;">Email</label>
  	<input type="text" name="email" value="{{$userdetail->email}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="email" class="custom-fc"  autocomplete="off">	   
  	<br><br>
  	<label style="color: silver;">Zodiac</label>
  	<input type="text" name="zodiac" value="{{$userdetail->zodiac}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="zodiac" class="custom-fc" disabled  autocomplete="off">

  	<br><br>
  	<label style="color: silver;">Date of birth</label>
  	<input type="text" name="dob" value="{{$userdetail->date}} - {{$userdetail->month}} - {{$userdetail->year}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="email" class="custom-fc" disabled  autocomplete="off">
  	<br>
  	<br>

  </div>
</div>
</form>
</div>
<br><br>


<div class="modal fade" id="spinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="mx-auto">
<i class="fa fa-spinner fa-spin" style="font-size:50px; color:white;"></i>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
$('#custom-text').html('Edit Profile');
$('#ok-btn-update-profile').css('display', 'block');


});
function inputonfocus(id){
console.log(id);
document.getElementById(id).setAttribute("class", "custom-fc-focus");

}
function inputfocusOut(id){
console.log(id);
document.getElementById(id).setAttribute("class", "custom-fc");


}

</script>

@endsection