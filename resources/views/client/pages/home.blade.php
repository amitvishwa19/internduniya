@extends('client.layout.layout')

@section('title','Home')


@section('style')
@endsection


@section('content')

    <section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec">
							<div class="new-slide">
								<img src="{{asset('public/client/images/resource/vector-1.png')}}">
							</div>
							<div class="job-search-sec">
								<div class="job-search">
									<h3>The Easiest Way to Get Your New Internship</h3>
									<span>Find internship, Employment & Career Opportunities</span>
									

									<!-- Search Form -->
									@include('client.pages.internship_search_form')
									<!-- Search Form -->




									<!-- <div class="or-browser">
										<span>Browse job offers by</span>
										<a href="#" title="">Category</a>
									</div> -->
								</div>
							</div>
							<div class="scroll-to">
								<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Catogories -->
	<section id="scroll-here">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Popular Categories</h2>
							<span>37 Internship live - 0 added today.</span>
						</div><!-- Heading -->
						<div class="cat-sec">
							<div class="row no-gape">
								@if($categories)
									@foreach($categories as $category)
										<div class="col-lg-3 col-md-3 col-sm-6">
											<div class="p-category">
												<a href="{{route('app.internships',['category'=>$category->slug])}}" title="">
													<i class="{{$category->class}}"></i>
													<span>{{$category->name}}</span>
													<p>({{$category->internships->count()}} Internships)</p>
												</a>
											</div>
										</div>
									@endforeach
								@endif
							</div>
						</div>
					
					</div>
					<div class="col-lg-12">
						<!-- <div class="browse-all-cat">
							<a href="#" title="">Browse All Categories</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block double-gap-top double-gap-bottom">
			<div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/parallax1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color testblock"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="simple-text-block">
							<h3>Make a Difference with Your Online Resume!</h3>
							<span>Your resume in minutes with Internduniya resume assistant is ready!</span>

							@if(Auth::user())
							<a href="{{route('student.resume')}}" title="">Create Resume</a>
							@else
							<a href="{{route('register')}}" title="">Create an Account</a>
							@endif

							

						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>

	<!-- Internships -->
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Featured Internship</h2>
							<span>Leading Employers/Universities already looking for talent.</span>
						</div><!-- Heading -->
						<div class="job-listings-sec">
							@foreach($internships as $internship)
								<div class="job-listing">
									<div class="job-title-sec">
										<div class="c-logo p-3"> <img src="{{$internship->corporate->avatar}}" alt="" /> </div>
										<h3 class="ml-5"><a href="{{route('app.internship.detail',['id'=>$internship->id])}}" title="">{{$internship->title}}</a></h3>
										<span>{{$internship->corporate->title}}</span>
									</div>
									<span class="job-lctn"><i class="la la-map-marker"></i>{{ucFirst($internship->city)}}, {{ucFirst($internship->state)}}</span>
									<!-- <span class="fav-job"><a href="{{route('app.student.favourite.internship',$internship->id)}}"><i class="la la-heart-o"></i></a></span> -->
									<span class="job-is ft ml-5">{{strtoupper($internship->type)}}</span>
								</div><!-- Job -->
							@endforeach
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="{{route('app.internships',['category'=>'all'])}}" title="">Load more listings</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</section>
	<!-- Internships -->


	<!-- Reviews -->
	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Kind Words From Happy Clients & Students</h2>
							<span>What other people thought about the service provided by InternDuniya</span>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews-carousel">

							@foreach($reviews as $review)
							<div class="col-lg-6">
								<div class="reviews">
									<img src="{{$review->feature_image}}" alt="" />
									<h3>{{$review->title}} <span>{{$review->description}}</span></h3>
									<p>{!!substr($review->body, 0, 200)!!}</p>
								</div><!-- Reviews -->
							</div>
							@endforeach
							

						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
	<!-- Reviews -->

	

	<!-- Companies -->
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Companies/Universities We've Helped</h2>
							<span>Some of the companies/Universities we've helped recruit excellent applicants over the years.</span>
						</div><!-- Heading -->
						<div class="comp-sec">

							@foreach($corporates as $corporate)
								<div class="company-img">
									<span title="" class="mr-1""><img src="{{$corporate->avatar}}" alt="" height="50" /></span>
								</div><!-- Client  -->
							@endforeach	

							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Blogs -->
	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/parallax3.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Quick Career Tips</h2>
							<span>Found by employers communicate directly with hiring managers and recruiters.</span>
						</div><!-- Heading -->
						<div class="blog-sec">
							<div class="row">

								@foreach($blogs as $blog)
									<div class="col-lg-4">
										<div class="my-blog">
											<div class="blog-thumb">
												<a href="{{route('app.blog.detail',$blog->slug)}}" title=""><img src="{{$blog->feature_image}}" alt="" /></a>
												<div class="blog-metas">
													<a href="{{route('app.blog.detail',$blog->slug)}}" title="">{{\Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YYYY')}}</a>
													
												</div>
											</div>
											<div class="blog-details">
												<h3><a href="{{route('app.blog.detail',$blog->slug)}}" title="">{{$blog->title}}</a></h3>
												<p>{!!substr($blog->body, 0, 250)!!}</p>
												<a href="{{route('app.blog.detail',$blog->slug)}}" title="">Read More <i class="la la-long-arrow-right"></i></a>
											</div>
										</div>
									</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blogs -->

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="simple-text">
							<h3>Gat a question?</h3>
							<span>We're here to help. Check out our FAQs, send us an email or call us at (+91) 6353782788</span>
						</div>
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
