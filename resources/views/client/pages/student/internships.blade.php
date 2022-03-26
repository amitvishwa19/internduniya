@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Shortlisted Internships</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('company.profile.update')}}" enctype="multipart/form-data">
                    @csrf

                    @if (session('message'))
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                         {{ session('message') }}
                        <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if($favourites->count() <= 0)
                        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                            No Shortlisted Internship found !
                            <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">

                        
                        
                        @foreach($favourites as $favourite)
                        <div class="job-listing wtabs col-md-12">
                            <div class="job-title-sec">
                                <div class="c-logo mr-4"> <img src="{{$favourite->corporate->avatar}}" alt=""> </div>
                                <h3><a href="{{route('app.internship.detail',$favourite->id)}}" title="">{{$favourite->title}}</a></h3>
                                <span>{{$favourite->corporate->title}}</span>
                                <div class="job-lctn">{{\Carbon\Carbon::parse($favourite->created_at)->isoFormat('MMM Do YYYY')}}</div>
                            </div>
                            <div class="job-list-del">
                                <a href="{{route('app.student.favourite.internship.delete', $favourite->id)}}" title=""><i class="la la-trash-o"></i></a>
                            </div>
                        </div>
                        @endforeach
                        

                    </div>
                </form>
            </div>
		</div>
	</div>
</div>


@endsection