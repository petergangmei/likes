@extends('layouts.app_viewphoto')

@section('content')
<div class="" style=" ">
<div style="">
<img src="public/storage/photos/{{$photo->user_id}}/{{$photo->image}}" class="cursor-pointer" style="width: 100%; top: 20px;">
<div style="padding: 5px;">
</div>
</div>

    <div class="modal fade" id="Model2_auth"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          	<div class="text-center" style="background-color: #60C1BE; color: white; padding: 8px; "><b>Photo</b></div>
			<div class="card" style="width: 100%; text-align:center;">
			  <ul class="list-group list-group-flush">
			    <a href="/deletephotoid-{{$photo->id}}">
			    <li class="list-group-item cursor-pointer color-black">Share</li></a>
			    <a href="/deletephotoid-{{$photo->id}}">
			    <a href="/deletephotoid-{{$photo->id}}">
			    <li class="list-group-item cursor-pointe color-black">Delete</li></a>
			  </ul>
			</div>

          </div>
        </div>
      </div>
    <div class="modal fade" id="Model2_guest"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

			<div class="card" style="width: 100%; text-align:center;">
			  <ul class="list-group list-group-flush">
			    <a href="/sharephotoid-{{$photo->id}}">
			    <li class="list-group-item cursor-pointer color-black">Share</li></a>
			    <a href="/reportphotoid-{{$photo->id}}">
			    <li class="list-group-item cursor-pointe color-black">Report</li></a>
			  </ul>
			</div>

          </div>
        </div>
      </div>

 </div>                 
@endsection

