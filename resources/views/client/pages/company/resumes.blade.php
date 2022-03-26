@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Resumes</h3>
			
            <div class="emply-resume-list">
                <div class="emply-resume-thumb">
                    <img src="{{asset('public/client/images/resource/er1.jpg')}}" alt="">
                </div>
                <div class="emply-resume-info">
                    <h3><a href="#" title="">Ali TUFAN</a></h3>
                    <span><i>UX / UI Designer</i> at Atract Solutions</span>
                    <p><i class="la la-map-marker"></i>Istanbul / Turkey</p>
                </div>
                <div class="action-resume">
                    <div class="action-center">
                        <span>Action <i class="la la-angle-down"></i></span>
                        <ul>
                            <li class="open-letter"><a href="#" title="">Cover Letter</a></li>
                            <li><a href="#" title="">Download CV</a></li>
                            <li><a href="#" title="">Linked-in Profile</a></li>
                            <li class="open-contact"><a href="#" title="">Send a Message</a></li>
                            <li><a href="#" title="">View Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="del-resume">
                    <a href="#" title=""><i class="la la-trash-o"></i></a>
                </div>
            </div>
          
		</div>
	</div>
</div>


@endsection