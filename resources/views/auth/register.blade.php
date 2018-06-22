@extends('layouts.app_register')

@section('content')
<div class="" style="opacity: 0.99;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="bio" value="Hey, I am new here! Let us be friend.">
                        <input type="hidden" name="d_comments_privacy" value="Everyone">

                        <div class="form-group row">
                            <label for="name" class="foc col-md-4 col-form-label text-md-right"><b>{{ __('Name') }}</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="foc form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Your full name" name="name" value="{{ old('name') }}"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('E-Mail Address') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your email address" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right"><b>{{ __('Gender') }}</b></label>

                            <div class="col-md-6">
                                <input name="gender" type="radio" class="{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"  value="Venus" checked="checked" required>Female

                                <input name="gender" type="radio" class="{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"  value="Mars" required>Male

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right"><b>{{ __('Birthday') }}</b></label>

                            <div class="col-md-6">


                                <select class="foc form-control form-control-sm form-width-small date" name="date" id="date">
                                  <option value="none">Day</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                </select>

                                <select class="foc form-control form-control-sm form-width-small month" name="month" id="month">
                                   <option value="none">Month</option>
                                   <option value="1">Jan</option>
                                   <option value="2">Feb</option>
                                   <option value="3">Mar</option>
                                   <option value="4">Apr</option>
                                   <option value="5">May</option>
                                   <option value="6">Jun</option>
                                   <option value="7">Jul</option>
                                   <option value="8">Aug</option>
                                   <option value="9">Sept</option>
                                   <option value="10">Oct</option>
                                   <option value="11">Nov</option>
                                   <option value="12">Dec</option>
                                </select>

                                <select class="foc form-control form-control-sm form-width-small year" id="year" name="year">
                                    <option value="none">Year</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                
                                </select>
                                <span  id="zodi" style="margin-left: 5px;">Zodiac</span>
                                <input type="hidden" name="zodiac" id="zodiac" value="Not selected">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Location') }}</b></label>

                            <div class="col-md-6">
                                <input id="location" type="text"  placeholder="State/Town/Province" class="form-control float-left foc" name="location" required style="width: 65%;">
                            <select class="form-control float-left foc" id="country" name="country" style="width: 35%;">
                                    <option value="country">Country</option>
                                    <option value="India">India</option>
                                    <option value="China">China</option>
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="foc form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Your new Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Confirm Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="foc form-control" name="password_confirmation" placeholder="Re-enter your password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <small style="font-size: 11px;">
                                By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy.
                              </samll><br>

                                <button type="submit" id="signup" class="btn btn-success" style="width: 40%; margin-top: 10px;">
                                    <b>Sign up</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
