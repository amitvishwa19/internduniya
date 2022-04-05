@extends('client.layout.layout')

@section('title','500')


@section('style')
@endsection


@section('content')

<div >
    <div class="error-content" >
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-featured-sec witherror">
                    <ul class="main-slider-sec text-arrows slick-initialized slick-slider"><button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
                        <div aria-live="polite" class="slick-list draggable">
                            <div class="slick-track" role="listbox" style="opacity: 1; width: 7595px; transform: translate3d(-4557px, 0px, 0px);">
                                <li class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 1519px;">
                                    <img src="{{asset('public/client/images/resource/mslider1.jpg')}}" alt="">
                                </li>
                                <li class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 1519px;">
                                    <img src="{{asset('public/client/images/resource/mslider3.jpg')}}" alt="">
                                </li>
                                <li class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 1519px;">
                                    <img src="{{asset('public/client/images/resource/mslider2.jpg')}}" alt="">
                                </li>
                                <li class="slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 1519px;">
                                    <img src="{{asset('public/client/images/resource/mslider1.jpg')}}" alt="">
                                </li>
                                <li class="slick-slide slick-cloned" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 1519px;">
                                    <img src="{{asset('public/client/images/resource/mslider3.jpg')}}" alt="">
                                </li>
                            </div>
                        </div>
                        
                        
                    <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button></ul>
                    <div class="error-sec">
                        <img src="{{asset('public/client/images/error/40.jpg')}}" alt="" height="100">
                        <span>500 Error, We Are Sorry, Internal server error</span>
                        <p>Unfortunately we have encountered with error. It may be temporarily unavailable,we are working on it and will be right back</p>
                       
                        <h6><a href="{{route('app.home')}}" title="">Back To Homepage</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



@endsection