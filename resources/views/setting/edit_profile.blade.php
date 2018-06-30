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
  	<input type="text" disabled name="name" value="{{$userdetail->name}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="name" class="custom-fc"   autocomplete="off">
  	<br><br>
  	
    <!-- <label style="color: silver;">Location</label>
       <select class="form-control float-left foc" id="location" name="location" style="width: 65%;">
          <option value="">Region</option>
          <option value="India">North</option>
          <option value="Northeast">Northeast</option>
          <option value="East">East</option>
          <option value="West">West</option>
          <option value="South">South</option>
          <option value="iEnergizer">iEnergizer</option>
      </select>
 -->
  	<!-- <br><br> -->
<!--   	<label style="color: silver;">Country</label>
  	
  	<select class="custom-fc" id="country"  name="country" id="country" >
	        <option value="{{$userdetail->country}}">{{$userdetail->country}}</option>
	        <option value="India">India</option>
	        <option value="China">China</option>
	</select>
 -->	   


      <div class="form-group row">

          <label  class="col-md-4 col-form-label text-md-right" style="color: silver;">{{ __('Location') }}</label>

          <div class="col-md-6">
              <!-- <input id="location" type="text"  placeholder="State/Town/Province" class="form-control float-left foc" name="location" required style="width: 65%;"> -->
              <select class="form-control custom-fc float-left foc" id="location" name="location" style="width: 65%;">
                  <option value="{{$userdetail->location}}">{{$userdetail->location}}</option>
                  <option value="India">North</option>
                  <option value="Northeast">Northeast</option>
                  <option value="East">East</option>
                  <option value="West">West</option>
                  <option value="South">South</option>
                  <option value="iEnergizer">iEnergizer</option>
              </select>

          <select class="form-control custom-fc float-left foc" id="country" name="country" style="width: 35%;">
                  <option value="{{$userdetail->country}}">{{$userdetail->country}}</option>
                  <option value="India">India</option>
                  <option value="China">China</option>
          </select>

          </div>
      </div>



  	<label style="color: silver;">Email</label>
  	<input type="text" name="email" value="{{$userdetail->email}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="email" class="custom-fc"  autocomplete="off">	   
  	<br><br>
 <!--  	<input type="text" name="zodiac" value="{{$userdetail->zodiac}}" onfocus="inputonfocus(this.id)" onblur="inputfocusOut(this.id)" id="zodiac" class="custom-fc" disabled  autocomplete="off"> -->
 <div class="form-group row">

      <label class="col-md-4 col-form-label text-md-right" style="color: silver;">{{ __('Zodiac') }}</label>

      <div class="col-md-6">

     <select class=" form-control custom-fc " name="zodiac" id="zodiac">
             <option value="{{$userdetail->zodiac}}">{{$userdetail->zodiac}} (current sign)</option>
             <option value="Aquarius">Aquarius</option>
             <option value="Pisces">Pisces</option>
             <option value="Aries">Aries</option>
             <option value="Taurus">Taurus</option>
             <option value="Gemini">Gemini</option>
             <option value="Cancer">Cancer</option>
             <option value="Leo">Leo</option>
             <option value="Virgo">Virgo</option>
             <option value="Libra">Libra</option>
             <option value="Scorpio">Scorpio</option>
             <option value="Sagittatius">Sagittatius</option>
             <option value="Capricorn">Capricorn</option>
          </select>

      </div>
  </div>



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