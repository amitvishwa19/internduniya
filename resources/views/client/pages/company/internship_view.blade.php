@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="profile-title d-flex">
        <h3>{{$internship->title}}</h3>
        
    </div>
    
    
    <div class="job-single-sec m-5">
        <div class="job-single-head">
            <div class="job-thumb"> <img src="{{$internship->corporate->avatar}}" alt=""> </div>
            <div class="job-head-info">
                <h4>{{$internship->corporate->title}}</h4>
                <span>{{$internship->corporate->address}}</span>
                <p><i class="la la-unlink"></i> {{$internship->corporate->website}}</p>
                <p><i class="la la-phone"></i>{{$internship->corporate->contact}}</p>
                <p><i class="la la-envelope-o"></i> {{$internship->corporate->email}}</p>
            </div>
        </div><!-- Job Head -->
        <div class="job-details">

            <div class="i-description mb-4" style="font-size: 14px;">
                <h5>Title</h5>
                {{$internship->title}}
            </div>

            <div class="i-description mb-4 mr-5" style="font-size: 14px;">
                <h5>Description</h5>
                {!! $internship->description !!}
            </div>

            <div class="i-description mb-4 mr-5" style="font-size: 14px;">
                <h5>Requirements</h5>
                {!! $internship->requirement !!}
            </div>


            <div class="row">

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>Duration</h5>
                    {!! $internship->duration !!}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>Stipend</h5>
                    {!! $internship->stipend !!}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>Start Date</h5>
                    {{\Carbon\Carbon::parse($internship->start_date)->isoFormat('MMM Do YYYY')}}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>End Date</h5>
                    {{\Carbon\Carbon::parse($internship->end_date)->isoFormat('MMM Do YYYY')}}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>Last Date to Apply</h5>
                    {{\Carbon\Carbon::parse($internship->apply_date)->isoFormat('MMM Do YYYY')}}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>Total Openings</h5>
                    {!! $internship->total_opening !!}
                </div>

                <div class="i-description col-md-2 mb-4"  style="font-size: 14px;">
                    <h5>State</h5>
                    {{ucFirst($internship->state)}}
                </div>

                <div class="i-description col-md-2 mb-4" style="font-size: 14px;">
                    <h5>City</h5>
                    {{ucFirst($internship->city)}}
                </div>
            </div>

            <div class="i-description mb-4 mr-5" style="font-size: 14px;">
                <h5>Total Applications</h5>
                <a href="{{route('company.internship.applications',$internship->id)}}">{{ $internship->applied_users->count() }}</a>
            </div>
            
            

            
        </div>
        
      
    </div>
    

</div>

@endsection