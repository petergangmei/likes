@extends('layouts.app3')
@section('content')
<head>
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
  <style>

    }
  </style>
</head>
<!-- <div class="container">

<form method="post" enctype='multipart/form-data' action="/addfeed">
  @csrf
	<textarea class="form-control" placeholder="New post.." style="height: 80px;" name="post"></textarea><br>
	<input type="file" name="image">
	<br><br>
	<button type="submit"  data-toggle="modal" data-target="#spinner" class="btn btn-primary btn-block">Post</button>
</form>

</div> -->
<!-- <input type="text" id="page-tracker" value="0" style="position: absolute; top: 5px; width: 15px;"> -->

<div class="main-box" style="display: ;">
<form enctype='multipart/form-data'>
  @csrf
        <div id="upload-demo" style="width:100%; border:1px solid silver; display: none;"></div>
        <div id="upload-demo-i" style="width:100%; border:1px solid silver; display: none;"></div>
        <br>
        <textarea class="form-control" id="caption" placeholder="Write a caption.." style="display:none; border:1px solid black; border-radius: 0px; border-top: 0px solid black;"></textarea>
        
  <div class="custom-file" id="choose-img" style="height: 100px !important; position: absolute;top: 10%; ">
    <input type="file" class="custom-file-input" style="height: 350px !important;" id="upload">
    
    <label class="custom-file-label myfile" style="height: 350px !important; background-color: yellow; background: url('public/storage/default_image/img-browse.jpg'); background-repeat: no-repeat; background-size: 100%;" for="">
    	<!-- <img src="/public/storage/default_image/avatar.png" style="width: 100%; height: 50px;"> -->
    </label>
    </div>
  </form>
</div>
<div class="loading">

<div style="top: 30%; position: relative; border:0px solid yellow;">
  <div style="border:0px solid purple;">
  <span class="ouro ouro3">
    <span class="left"><span class="anim"></span></span>
    <span class="right"><span class="anim"></span></span>
  </span>
	</div>
	<b>Uploading.</b>
	</div>
</div>
  

<!-- <div class="post-nav">
	<button class="post-nav-btn btn-primary"><i class="fa fa-file-photo-o" style="font-size: 23px;"></i></button>
	
	<button class="post-nav-btn"><i class="fa fa-crop" style="font-size: 23px;"></i></button>
	<button class="post-nav-btn"><i class="fa fa-pencil-square-o" style="font-size: 23px;"></i></button>
	<button class="post-nav-btn"><i class="fa fa-upload" style="font-size: 23px;"></i></button>
</div>
 -->


@endsection