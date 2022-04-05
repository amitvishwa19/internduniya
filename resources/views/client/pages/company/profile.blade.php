@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Profile</h3>
			

            <div class="profile-form-edit">
                <form method="post" action="{{route('company.profile.update')}}" enctype="multipart/form-data">
                    @csrf

                    @if (session('message'))
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        <strong>Wola ! </strong> {{ session('message') }}
                        <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(count($errors))
                        <div class="validation_error_list alert alert-info mt-2">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <br/>

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><span class="mt-2">*</span> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-lg-6">
                            <span class="pf-title">User First Name*</span>
                            <div class="pf-field">
                                <input type="text" name="firstName" value="{{$user->firstName}}{{old('firstName')}}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <span class="pf-title">User Last Name*</span>
                            <div class="pf-field">
                                <input type="text" name="lastName" value="{{$user->lastName}}{{old('lastName')}}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <span class="pf-title">Company Name*</span>
                            <div class="pf-field">
                                <input type="text" name="title" value="{{$user->corporate->title ? $user->corporate->title : old('title')}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <span class="pf-title">Company Description*</span>
                            <div class="pf-field">
                                <textarea name="description" rows="2">{{$user->corporate->description ? $user->corporate->description : old('description')}}</textarea>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span class="pf-title">Company Website</span>
                            <div class="pf-field">
                                <input type="text" name="website" value="{{$user->corporate->website ? $user->corporate->website : old('website')}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span class="pf-title">Company Contact No.*</span>
                            <div class="pf-field">
                                <input type="text" name="contact" value="{{$user->corporate->contact ? $user->corporate->contact : old('contact')}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span class="pf-title">Company contact Email*</span>
                            <div class="pf-field">
                                <input type="text" name="email" value="{{$user->corporate->email ? $user->corporate->email : old('email')}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span class="pf-title">Total Employees</span>
                            <div class="pf-field">
                                <input type="number" name="employees" value="{{$user->corporate->employees ? $user->corporate->employees : old('employees')}}">
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <span class="pf-title">Company Type*</span>
                            <div class="pf-field">
                                <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="type">
                                    <option value="">-Select Company Type-</option>
                                    <option value="company" {{$user->corporate->type == "company" ? 'selected' : ""}}>Corporate</option>
                                    <option value="university" {{$user->corporate->type == "university" ? 'selected' : ""}}>University</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <span class="pf-title">Complete Address</span>
                            <div class="pf-field">
                                <textarea name="address">{{$user->corporate->address}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <span class="pf-title">Corporate Logo</span>
                            <div class="upload-img-bar">
                                <span><img src="{{$user->corporate->avatar}}" alt=""><i>x</i></span>
                                <div class="upload-info">
                                    <input type="file" name="avatar">
                                    <span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg &amp; .png</span>
                                </div>
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