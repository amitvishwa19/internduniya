@extends('client.layout.layout')

@section('title','InterDuniya')


@section('style')
@endsection


@section('content')

<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Welcome {{auth()->user()->firstName}}, {{auth()->user()->lastName}}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block no-padding">
		<div class="container-fluid">
			<div class="row no-gape">
				<aside class="col-lg-2 column border-right">
					<div class="widget">
						<div class="tree_widget-sec">
							<ul>
								<li><a href="{{route('student.home')}}" title=""><i class="la la-tachometer"></i>Dashboard</a></li>
								<li><a href="{{route('student.profile')}}" title=""><i class="la la-file-text"></i>My Profile</a></li>
								<li><a href="{{route('student.resume')}}" title=""><i class="la la-briefcase"></i>Digital Resume</a></li>
								<li><a href="{{route('student.internships.shortlisted')}}" title=""><i class="la la-money"></i>Shorlisted Internships</a></li>
								<li><a href="{{route('student.internships.applied')}}" title=""><i class="la la-paper-plane"></i>Applied Interships</a></li>
								<li><a href="{{route('student.subscription')}}" title=""><i class="la la-file-text"></i>Subscriptions</a></li>
								<li><a href="{{route('student.password.management')}}" title=""><i class="la la-flash"></i>Change Password</a></li>
								<li>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="la la-unlink"></i>Logout</a>
                                    <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
							</ul>
						</div>
					</div>
					
				</aside>
				
                @yield('main_content')
			</div>
		</div>
	</div>
</section>

@endsection



@section('modal')
@endsection


@section('javascript')
  	<script>
  		$(function(){
         'use strict'





      });
  	</script>
@endsection