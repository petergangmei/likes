@extends('layouts.app_admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-9 ">
      <div class="card">
      <div class="card-body">
      	<b>Enter news</b>
        <form method="post" action="/admin/postnews_">
          @csrf
          <textarea class="form-control" name="news" id="article-ckeditor" placeholder="Enter news..." style="width: 80%; float: left;"></textarea>
          <select name="Category" class="form-control" style="width: 19%; height: 60px; float: left;">
            <option value="">Category</option>
            <option value="Update">Update News</option>
            <option value="Event">Event News</option>
          </select>
          <br><br><br>
          <button type="Submit" class="btn btn-primary btn-lg">Submit News</button>
        </form>
      </div>
  	  </div>
    </div>
    <div class="col-3 ">
      <ul class="list-group">
        <li class="list-group-item">
           <a href="/admin" style="text-decoration: none; color: black;">
           User list
            </a>
        </li>
        <li class="list-group-item" style="background-color: #8BC7F4; color: white;">
        	<a href="/admin/postnews" style="text-decoration: none; color: black;">
            <b>Post News</b>
            </a>
        </li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>

        <div class="col-9 ">
      <div class="card">
      <div class="card-body">
        <b>News..</b>
        @if(count($news)>0)
        @foreach($news as $nws)
        <div class="card">
          <div class="card-body">
           <div style="border:0px solid black; float: left; width: 85%;"><b> {!!$nws->description!!}</b></div> 

           <small style="float: right;"><i>({!!$nws->newstype!!})</i> {{Carbon\Carbon::createFromTimestamp(strtotime($nws->created_at))->diffForHumans()}}</small>
            
          </div>
        </div>
        @endforeach
        @else

        @endif

      </div>
      </div>
    </div>
    
  </div>
</div>

<script>
	$('#custom-text').html('News');
</script>
@endsection