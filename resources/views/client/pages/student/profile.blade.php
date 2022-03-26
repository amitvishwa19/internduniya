@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Profile</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('student.profile.update')}}" enctype="multipart/form-data">
                    @csrf

                    @if (session('message'))
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        <strong>Wola ! </strong> {{ session('message') }}
                        <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-3">
                            <span class="pf-title">First Name</span>
                            <div class="pf-field">
                                <input type="text" name="firstname" value="{{ !$resume == null ? $resume->firstname : ""}}">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <span class="pf-title">Last Name</span>
                            <div class="pf-field">
                                <input type="text" name="lastname" value="{{ !$resume == null ? $resume->lastname : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Email</span>
                            <div class="pf-field">
                                <input type="text" name="email" value="{{ !$resume == null ? $resume->email : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Mobile</span>
                            <div class="pf-field">
                                <input type="text" name="mobile" value="{{ !$resume == null ? $resume->mobile : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Website</span>
                            <div class="pf-field">
                                <input type="text" name="website" value="{{ !$resume == null ? $resume->website : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">City</span>
                            <div class="pf-field">
                                <input type="text" name="city" value="{{ !$resume == null ? $resume->city : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">State</span>
                            <div class="pf-field">
                                <input type="text" name="state" value="{{ !$resume == null ? $resume->state : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Postal Code</span>
                            <div class="pf-field">
                                <input type="text" name="post_code" value="{{ !$resume == null ? $resume->post_code : ""}}">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <span class="pf-title">Address</span>
                            <div class="pf-field">
                                <textarea name="address" rows="5">{{ !$resume == null ? $resume->address : ""}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4 mt-4">
                            <button type="submit">Update Profile</button>
                        </div>

                    </div>
                </form>
            </div>
		</div>
	</div>
</div>


@endsection