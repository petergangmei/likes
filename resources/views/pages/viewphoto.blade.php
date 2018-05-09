@extends('layouts.app2')

@section('content')
<div class="" style=" ">
<div style="">
<img src="public/storage/photos/{{$photo->user_id}}/{{$photo->image}}" class="cursor-pointer" style="width: 100%; top: 20px;">
<div style="padding: 5px;">
<i class="fa fa-star-o cursor-pointer" style="font-size: 30px; position: absolute;"></i>
<i class="fa fa-comment-o cursor-pointer" style="font-size: 28px; position: ; margin: -1px 40px;"></i>
</div>
</div>

                <div class="modal fade" id="Model2"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">

          					<div class="card" style="width: 100%; text-align:center;">
								  <ul class="list-group list-group-flush">
								    <a href="/deletephotoid-{{$photo->id}}">
								    <li class="list-group-item cursor-pointer color-black">Share</li></a>
								    <a href="/deletephotoid-{{$photo->id}}">
								    <li class="list-group-item cursor-pointer color-black">Edit</li></a>
								    <a href="/deletephotoid-{{$photo->id}}">
								    <li class="list-group-item cursor-pointe color-black">Delete</li></a>
								  </ul>
								</div>

                      </div>
                    </div>
                  </div>
 </div>                 
@endsection

