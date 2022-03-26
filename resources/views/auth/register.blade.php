@extends('auth.layout')

@section('title','Register')

@section('content')
    <div class="login-page">
        <div class="row">
            <div class="col-9 d-none d-sm-block d-sm-none left-area">
                <img src="{{setting('auth_image_url')}}" alt="">
            </div>

            <div class="col-lg-3 col-sm-12  right-area">

                <div class="login-content">
                    <div class="brand-logo">
                        <a href="{{route('app.home')}}">
                            <img src="{{setting('app_icon')}}" alt="" style="width: 150px;">
                         </a>
                    </div>

                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}" class="mg-b-20">
                            @csrf
                            <h5 class="info-title">Sign Up for New account</h5>

                            @if(Session::has('inactive'))
                              <!-- <p class="alert alert-info">{{ Session::get('message') }}</p> -->
                              <div class="alert alert-info" role="alert">
                                Your account is not activated ! Please activate your account. <a href="">Click here</a> to resend activation link
                              </div>
                            @endif

                            @if(Session::has('register_success'))
                              <!-- <p class="alert alert-info">{{ Session::get('message') }}</p> -->
                              <div class="alert alert-info" role="alert">
                                Account created successfully, please check your mail for activation linke to activate your account.
                              </div>
                            @endif

                            <input type="hidden" value="student" id="type" name="type">

                            <div class="btn-group btn-block">
                                <button type="button" class="studentbtn btn btn-sm btn-outline-secondary active">Student</button>
                                <button type="button" class="corporatebtn btn btn-sm btn-outline-secondary">Corporate</button>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                               <input type="email" class="form-control" name="email" placeholder="yourname@yourdomain.com" required="" autofocus value="{{ old('email') }}"/>
                               @if ($errors->has('email'))
                               <span class="help-block">
                                  <small><strong>{{ $errors->first('email') }}</strong></small>
                               </span>
                               @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                               <input type="password" class="form-control" name="password" placeholder="Enter your password" required="" />
                               @if ($errors->has('password'))
                               <span class="help-block">
                                  <small><strong>{{ $errors->first('password') }}</strong></small>
                               </span>
                               @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                               <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your password" required="" />
                               @if ($errors->has('password_confirmation'))
                               <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                               </span>
                               @endif
                            </div>


                            @captcha
                            <div>
                               <button class="btn btn-primary btn-login submit btn-sm pull-left form-control" style="margin-top: 5px;">Sign Up</button>
                            </div>

                        </form>

                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Already have Account?
                                <a href="{{ route('login') }}" class="to_register"> Login here </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />

                        </div>

                        @if(setting('app_name'))
                        <p class="info">Your data will not be used outside of {{setting('app_name')}}. By signing up you agree that your statistics may be used anonymously inside www.{{strtolower(setting('app_name'))}}.com.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')


  	<script>
  		$(function(){
         'use strict'

            

            $(".studentbtn").click(function() { 
                $(this).addClass("active");
                $('.corporatebtn').removeClass("active");
                $('#type').attr('value', 'student')
            });

            $(".corporatebtn").click(function() { 
                $(this).addClass("active");
                $('.studentbtn').removeClass("active");
                $('#type').attr('value', 'corporate')
            });



      });
  	</script>

@endsection