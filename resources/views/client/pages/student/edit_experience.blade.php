@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Add Experience</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('student.resume.experience.update',$experience->id)}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}

                    @if (session('message'))
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        <strong>Wola ! </strong> {{ session('message') }}
                        <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <span class="pf-title">Title</span>
                            <div class="pf-field">
                                <input type="text" name="title" value="{{$experience->title}}">
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <span class="pf-title">Organization</span>
                            <div class="pf-field">
                                <input type="text" name="organization" value="{{$experience->organization}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">Start Date</span>
                            <div class="pf-field">
                                <input type="date" name="start_date" value="{{$experience->start_date}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">End Date</span>
                            <div class="pf-field">
                                <input type="date" name="end_date" value="{{$experience->end_date}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <span class="pf-title">Description</span>
                            <div class="pf-field">
                                <textarea name="description" rows="5">{{$experience->description}}</textarea>
                                
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4 mt-4">
                            <button type="submit">Update</button>
                        </div>

                    </div>
                </form>
            </div>
		</div>
	</div>
</div>


@endsection