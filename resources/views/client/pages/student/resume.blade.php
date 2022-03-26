@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="padding-left">
        <div class="manage-jobs-sec">

            @if (session('message'))
                <div class="alert alert-primary alert-dismissible fade show m-4" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <!-- Qualifiaction -->
            <div class="border-title"><h3>Education Qualifications</h3><a href="{{route('student.resume.education')}}" title=""><i class="la la-plus"></i> Add Education</a></div>
            <div class="edu-history-sec">

                @foreach($resume->education as $education)
                    <div class="edu-history">
                        <i class="la la-graduation-cap"></i>
                        <div class="edu-hisinfo">
                            <h3>{{$education->title}} ({{$education->type}})</h3>
                            <i>{{\Carbon\Carbon::parse($education->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($education->end_date)->isoFormat('MMM Do YYYY')}}</i>
                            <span>{{$education->organization}} <i>{{$education->subject}}</i></span>
                            <p>{{$education->description}}</p>
                        </div>
                        <ul class="action_job">
                            <li><span>Edit</span><a href="{{route('student.resume.education.edit',$education->id)}}" title=""><i class="la la-pencil"></i></a></li>
                            <li><span>Delete</span><a href="{{route('student.resume.education.delete',$education->id)}}" title=""><i class="la la-trash-o"></i></a></li>
                        </ul>
                    </div>
                @endforeach

            </div>
            <!-- Qualifiaction -->

            <!-- Experience -->
            <div class="border-title"><h3>Work Experience</h3><a href="{{route('student.resume.experience')}}" title=""><i class="la la-plus"></i> Add Experience</a></div>
            <div class="edu-history-sec">

                @foreach($resume->experience as $experience)
                <div class="edu-history style2">
                    <i></i>
                    <div class="edu-hisinfo">
                        <h3>{{$experience->title}} <span>{{$experience->organization}}</span></h3>
                        <i>{{\Carbon\Carbon::parse($experience->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($experience->start_date)->isoFormat('MMM Do YYYY')}}</i>
                        <p>{{$experience->description}}</p>
                    </div>
                    <ul class="action_job">
                        <li><span>Edit</span><a href="{{route('student.resume.experience.edit',$experience->id)}}" title=""><i class="la la-pencil"></i></a></li>
                        <li><span>Delete</span><a href="{{route('student.resume.experience.delete', $experience->id)}}" title=""><i class="la la-trash-o"></i></a></li>
                    </ul>
                </div>
                @endforeach

            </div>
            <!-- Experience -->

            <!-- Skills -->
            <div class="border-title"><h3>Professional Skills</h3><a href="{{route('student.resume.skills')}}" title=""><i class="la la-plus"></i> Add Skills</a></div>
            <div class="progress-sec">

                @foreach($resume->skills as $skill)
                    <div class="progress-sec with-edit">
                        <span>{{$skill->title}}</span>
                        <div class="progressbar"> <div class="progress" style="width: {{$skill->percentage}}%;"><span>{{$skill->percentage}}%</span></div> </div>
                        <ul class="action_job">
                            <li><span>Edit</span><a href="{{route('student.resume.skills.edit',$skill->id)}}" title=""><i class="la la-pencil"></i></a></li>
                            <li><span>Delete</span><a href="{{route('student.resume.skills.delete', $skill->id)}}" title=""><i class="la la-trash-o"></i></a></li>
                        </ul>
                    </div>
                @endforeach

            </div>
            <!-- Skills -->

            <!-- Achivements -->
            <div class="border-title"><h3>Achivements</h3><a href="{{route('student.resume.achivement')}}" title=""><i class="la la-plus"></i> Add Achivements</a></div>
            <div class="edu-history-sec">

                @foreach($resume->achivement as $achivement)
                    <div class="edu-history style2">
                        <i></i>
                        <div class="edu-hisinfo">
                            <h3>{{$achivement->title}}</h3>
                            <i>{{\Carbon\Carbon::parse($achivement->start_date)->isoFormat('MMM Do YYYY')}} - {{\Carbon\Carbon::parse($achivement->end_date)->isoFormat('MMM Do YYYY')}}</i>
                            <p>{{$achivement->description}}</p>
                        </div>
                        <ul class="action_job">
                            <li><span>Edit</span><a href="{{route('student.resume.achivement.edit',$achivement->id)}}" title=""><i class="la la-pencil"></i></a></li>
                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                        </ul>
                    </div>
                @endforeach
                
            </div>
            <!-- Achivements -->


        </div>
    </div>
</div>


@endsection