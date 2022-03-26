@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
 
    <div class="manage-jobs-sec">
        
        <div class="job-single-head m-4">
            <!-- <div class="job-thumb"> <img src="{{asset('public/client/images/resource/sj.png')}}" alt=""> </div> -->
            <div class="job-head-info">
                <h4>{{$user->resume->firstname}}, {{$user->resume->lastname}}</h4>
                <span>{{$user->resume->address}}</span>
                <p><i class="la la-unlink"></i> {{$user->resume->website}}</p>
                <p><i class="la la-phone"></i>{{$user->resume->mobile}}</p>
                <p><i class="la la-envelope-o"></i>{{$user->resume->email}}</p>
            </div>
        </div>
        
        <div class="border-title"><h3>Education Qualification</h3></div>
        <div class="edu-history-sec">
            
            @foreach($user->resume->education as $education)
                <div class="edu-history">
                    <i class="la la-graduation-cap"></i>
                    <div class="edu-hisinfo">
                        <h3>{{$education->title}}</h3>
                        <i>{{\Carbon\Carbon::parse($education->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($education->end_date)->isoFormat('MMM Do YYYY')}}</i>
                        <span>{{$education->organization}} <i>{{$education->subject}}</i></span>
                        <p>{{$education->description}}</p>
                    </div>
                </div>
            @endforeach
            
           

        </div>


        <div class="border-title"><h3>Work Experience</h3></div>
        <div class="edu-history-sec">
            @foreach($user->resume->experience as $experience)
            <div class="edu-history style2">
                    <i></i>
                    <div class="edu-hisinfo">
                        <h3>{{$experience->title}} <span>{{$experience->organization}}</span></h3>
                        <i>{{\Carbon\Carbon::parse($experience->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($experience->start_date)->isoFormat('MMM Do YYYY')}}</i>
                        <p>{{$experience->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>


        
        <div class="border-title"><h3>Skills</h3></div>
        <div class="progress-sec">
            @foreach($user->resume->skills as $skill)
            <div class="progress-sec with-edit">
                <span>{{$skill->title}}</span>
                <div class="progressbar"> <div class="progress" style="width: {{$skill->percentage}}%;"><span>{{$skill->percentage}}%</span></div> </div>
            </div>
            @endforeach
        </div>


        <div class="border-title"><h3>Achivements</h3></div>
        <div class="edu-history-sec">
            @foreach($user->resume->achivement as $achivement)
            <div class="edu-history style2">
                <i></i>
                <div class="edu-hisinfo">
                    <h3>{{$achivement->title}}</h3>
                    <i>{{\Carbon\Carbon::parse($achivement->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($achivement->end_date)->isoFormat('MMM Do YYYY')}}</i>
                    <p>{{$achivement->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   
    

</div>

@endsection