@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="profile-title d-flex">
        <h3>Applications</h3>
    </div>
    
    @foreach($internship->applied_users as $applicant)

    @endforeach
   
    <div class="emply-resume-sec">
    @foreach($internship->applied_users as $applicant)

        <div class="emply-resume-list active">
            <div class="emply-resume-thumb">
                <img src="{{$applicant->avatar_url}}" alt="">
            </div>
            <div class="emply-resume-info">
                <h3><a href="{{route('company.internship.user.resume',$applicant->id)}}" title="">{{$applicant->resume->firstname}}, {{$applicant->resume->lastname}}</a></h3>
                <p><i class="la la-map-marker"></i>{{$applicant->resume->city}} / {{$applicant->resume->state}}</p>
                <p></i>Email: {{$applicant->resume->email}}  <span class="ml-4">Contact: {{$applicant->resume->mobile}}</span></p>
            </div>
            
            <div class="del-resume">
                <a href="#" title=""><i class="la la-trash-o"></i></a>
            </div>
        </div><!-- Emply List -->
    
    @endforeach
    </div>
</div>

@endsection