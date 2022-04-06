@extends('client.layout.layout')

@section('title','InterDuniya')


@section('style')
@endsection


@section('content')

<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>{{$internship->corporate->title}}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				
				@if (session('message'))
				<div class="alert {{session('alert-type')}} alert-dismissible fade show mt-2 mb-5" role="alert">
					{{ session('message') }}. <span class="ml-1"><a href="{{route('student.profile')}}">Update Now</a></span>
					<button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif

				@if (session('subscribe-message'))
				<div class="alert {{session('alert-type')}} alert-dismissible fade show mt-2 mb-5" role="alert">
					{{ session('subscribe-message') }}. <span class="ml-1"><a href="{{route('student.subscription')}}">Subscribe Now</a></span>
					<button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif

				<div class="row">
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 			<div class="job-single-head2">
				 				<div class="job-title2"><h3>{{$internship->title}}</h3><span class="job-is ft">{{strtoupper($internship->type)}}</span>
								 	<a href="{{route('app.student.favourite.internship',$internship->id)}}" class="favourite"><i class="la la-heart-o"></i></a>
								</div>
				 				<ul class="tags-jobs">
				 					<li><i class="la la-map-marker"></i> {{ucFirst($internship->city)}}, {{ucFirst($internship->state)}}</li>
				 					<li><i class="la la-money"></i> Stipend : <span>{{$internship->stipend}}</span></li>
				 					<li><i class="la la-calendar-o"></i> Post Date: {{\Carbon\Carbon::parse($internship->start_date)->isoFormat('MMM Do YYYY')}}</li>
				 				</ul>
				 				<!-- <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span> -->
				 			</div><!-- Job Head -->

							 <div class="job-single-head2 mt-4">
				 				<div class="job-title2"><h3>About {{$internship->corporate->title}}</h3></div>
				 				{{$internship->corporate->description}}
				 				<!-- <span><strong>Roles</strong> : UX/UI Designer, Web Designer, Graphic Designer</span> -->
				 			</div><!-- Job Head -->


				 			<div class="job-details">
				 				<h3>Internship Description</h3>
				 				<p>{{$internship->description}}</p>
				 				
				 				
								
								<h3>Internship Requirements</h3>
								<p>{{$internship->requirement}}</p>
				 				
				 			</div>
				 			<div class="job-overview">
					 			<h3>Internship Overview</h3>
					 			<ul>
					 				<li><i class="la la-money"></i><h3>Stipend/Salary</h3><span>{{$internship->stipend}}</span></li>
					 				<li><i class="la la-puzzle-piece"></i><h3>Duration</h3><span>{{$internship->duration}}</span></li>
					 				<li><i class="la la-thumb-tack"></i><h3>Start Date</h3><span>{{$internship->start_date}}</span></li>
					 				<li><i class="la la-thumb-tack"></i><h3>End Date</h3><span>{{$internship->end_date}}</span></li>
					 				<li><i class="la la-shield"></i><h3>Last date to apply</h3><span>{{$internship->apply_date}}</span></li>
					 				<li><i class="la la-line-chart "></i><h3>Qualification</h3><span>{{$internship->qualification}}</span></li>
					 			</ul>
					 		</div><!-- Job Overview -->
				 			
				 		</div>
				 	</div>
				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"> <img src="images/resource/sjs.png" alt="" /> </div>
			 				<div class="job-head-info">
			 					<h4>{{$internship->corporate->title}}</h4>
			 					<span>{{$internship->corporate->address}}</span>
			 					<p><i class="la la-unlink"></i> {{$internship->corporate->website}}</p>
			 					
			 				</div>
			 				<a href="{{route('app.student.apply.internship',$internship->id)}}" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Apply Now</a>
			 				<!-- <a href="#" title="" class="viewall-jobs">View all Jobs</a> -->
			 			</div><!-- Job Head -->
				 	</div>
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
