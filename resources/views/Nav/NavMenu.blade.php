@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

<div class="card" style="width: 100%; text-align: center;">
  <div class="card-header bg-light">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Account</li>
    <li class="list-group-item">Setting</li>
    <a href="/preferencepage1">
    <li class="list-group-item">Edit preference</li>
    </a>
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
@endsection
