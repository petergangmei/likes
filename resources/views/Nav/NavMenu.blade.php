@extends('layouts.app_blank')

@section('content')
<div class="container">
<div class="row">

<div class="card" style="width: 100%; text-align: center;">

  <ul class="list-group list-group-flush" data-toggle="modal" data-target="#spinner">
    <li class="list-group-item"><a href="/edit_profile" style="color: black; text-decoration: none;">Edit profile</a></li>
    
    <li class="list-group-item"><a href="/account_setting" style="color: black; text-decoration: none;">Account Setting</a></li>
    
    <li class="list-group-item"><a href="/preferencepage1" style="color: black; text-decoration: none;">Update preference</a></li>
    
    <a class="list-group-item color-black" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

  </ul>
</div>

</div>
</div>
<script>
  $('#custom-text').html('Settings');
  $('#custom-nav').css('background-color', '#F8F7F2');
</script>
@endsection
