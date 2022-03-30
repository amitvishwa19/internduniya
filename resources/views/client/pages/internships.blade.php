@extends('client.layout.layout')

@section('title','InterDuniya')


@section('style')
@endsection


@section('content')

<section class="overlape">
   <div class="block no-padding">
      <div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/mslider1.jpg')}}) 50% -76.3px repeat scroll transparent;" class="parallax scrolly-invisible no-parallax"></div>
      <!-- PARALLAX BACKGROUND IMAGE -->
      <div class="container fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="inner-header wform">
                  <div class="job-search-sec">
                     <div class="job-search">
                        <h4>Explore Thousand Of Intenship With Just Simple Search...</h4>
                        <form>
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="job-field">
                                    <input type="text" placeholder="Job title, keywords or company name">
                                    <i class="la la-keyboard-o"></i>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="job-field">
                                    <select data-placeholder="City, province or region" class="chosen-city" style="display: none;">
                                       <option>Instambul</option>
                                       <option>New York</option>
                                       <option>London</option>
                                       <option>Russia</option>
                                    </select>
                                    
                                    <i class="la la-map-marker"></i>
                                 </div>
                              </div>
                              <div class="col-lg-1">
                                 <button type="submit"><i class="la la-search"></i></button>
                              </div>
                           </div>
                        </form>
                        <!-- <div class="tags-bar">
                           <span>Full Time<i class="close-tag">x</i></span>
                           <span>UX/UI Design<i class="close-tag">x</i></span>
                           <span>Istanbul<i class="close-tag">x</i></span>
                           <div class="action-tags">
                              <a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
                              <a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
                           </div>
                        </div> -->
                        <!-- Tags Bar -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section>
	<div class="block remove-top">
		<div class="container">
		<div class="row no-gape">
			
			<div class="col-lg-12 column">
				<div class="modrn-joblist np">
					<div class="filterbar">
					<h5>{{$internships->count()}} Internship Open to apply</h5>
					</div>
				</div>
			<!-- MOdern Job LIst -->
				<div class="job-list-modern">
					<div class="job-listings-sec no-border">

					@foreach($internships as $internship)
						<div class="job-listing wtabs">
							<div class="job-title-sec">
							<div class="c-logo mr-4">
								<img src="{{$internship->corporate->avatar}}" alt="">
							</div>
							<h3 class="ml-5">
								<a href="{{route('app.internship.detail',$internship->id)}}" title="">{{$internship->title}}</a>
							</h3>
							<span>{{$internship->corporate->title}}</span>
							<div class="job-lctn">
								@if($internship->city || $internship->state)
								<i class="la la-map-marker"></i>{{ucFirst($internship->city)}}, {{ucFirst($internship->state)}}
								@endif
							</div>
							</div>
							<div class="job-style-bx">
							<span class="job-is ft">{{strtoupper($internship->type)}}</span>
							<span class="fav-job">
								<a href="{{route('app.student.favourite.internship',$internship->id)}}"><i class="la la-heart-o"></i></a>
							</span>
							<i>{{$internship->created_at->diffForHumans()}}</i>
							</div>
						</div>
					@endforeach
					</div>


					<div class="pagination">
						{!! $internships->render() !!}
					</div>
					<!-- Pagination -->
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
