@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Password Management</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('company.password.update')}}" enctype="multipart/form-data">
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
                        <div class="col-lg-12">
                            <span class="pf-title">Current Password</span>
                            <div class="pf-field">
                                <input type="password" name="current_password" value="{{old('current_password')}}">
                            </div>
                            @if ($errors->has('current_password'))
                            <span class="validation-error">
                                <small>{{ $errors->first('current_password') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <span class="pf-title">New Password</span>
                            <div class="pf-field">
                                <input type="password" name="new_password" value="{{old('new_password')}}">
                            </div>
                            @if ($errors->has('new_password'))
                            <span class="validation-error">
                                <small>{{ $errors->first('new_password') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <span class="pf-title">Confirm Password</span>
                            <div class="pf-field">
                                <input type="password" name="confirm_password" value="{{old('confirm_password')}}">
                            </div>
                            @if ($errors->has('confirm_password'))
                            <span class="validation-error">
                                <small>{{ $errors->first('confirm_password') }}</small>
                            </span>
                            @endif
                        </div>
                        
                        

                        <div class="col-lg-12 mb-4 mt-4">
                            <button type="submit">Update Password</button>
                        </div>

                    </div>
                </form>
            </div>
		</div>
	</div>
</div>


@endsection