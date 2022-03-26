@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Add Education Qualification</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('student.resume.education.update',$education->id)}}" enctype="multipart/form-data">
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
                                <select  data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="title">
                                    <option value="">-Select Title-</option>
                                    <option value="Secondary" {{$education->title == "Secondary" ? "selected" : ""}}>Secondary</option>
                                    <option value="Senior Secondary" {{$education->title == "Senior Secondary" ? "selected" : ""}}>Senior Secondary</option>
                                    <option value="Graduation" {{$education->title == "Secondary" ? "Graduation" : ""}}>Graduation</option>
                                    <option value="Post Gratuation" {{$education->title == "Post Gratuation" ? "selected" : ""}}>Post Gratuation</option>
                                    <option value="Doctarate" {{$education->title == "Doctarate" ? "selected" : ""}}>Doctarate</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <span class="pf-title">Type</span>
                            <div class="pf-field">
                                <input placeholder="Ex. 10th, 12th, B.Sc, M.Sc" type="text" name="type" value="{{$education->type}}">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <span class="pf-title">From Date</span>
                            <div class="pf-field">
                                <input type="date" name="start_date" value="{{$education->start_date}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">To Date</span>
                            <div class="pf-field">
                                <input type="date" name="end_date" value="{{$education->end_date}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">Organization</span>
                            <div class="pf-field">
                                <input type="text" name="organization" value="{{$education->organization}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">Major Subject</span>
                            <div class="pf-field">
                                <input type="text" name="subject" value="{{$education->subject}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <span class="pf-title">Description</span>
                            <div class="pf-field">
                                <textarea name="description">{{$education->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <button type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>


@endsection