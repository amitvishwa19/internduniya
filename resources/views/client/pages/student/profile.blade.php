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
                            {{ session('message') }}
                            <button type="button" class="close alert_close_button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(count($errors))
                        <div class="validation_error_list alert alert-info mt-2">
                            There were some problems with your input.
                            <br/>

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><span class="mt-2">*</span> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-3">
                            <span class="pf-title">First Name*</span>
                            <div class="pf-field">
                                <input type="text" name="firstname" value="{{ !$resume == null ? $resume->firstname : ""}}">
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <span class="pf-title">Last Name*</span>
                            <div class="pf-field">
                                <input type="text" name="lastname" value="{{ !$resume == null ? $resume->lastname : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Email*</span>
                            <div class="pf-field">
                                <input type="text" name="email" value="{{ !$resume == null ? $resume->email : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Mobile*</span>
                            <div class="pf-field">
                                <input type="text" name="mobile" value="{{ !$resume == null ? $resume->mobile : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">Current/Latest University</span>
                            <div class="pf-field">
                                <input type="text" name="website" value="{{ !$resume == null ? $resume->website : ""}}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <span class="pf-title">Postal Code*</span>
                            <div class="pf-field">
                                <input type="text" id="pincode" name="post_code" value="{{ !$resume == null ? $resume->post_code : ""}}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <span class="pf-title">City*</span>
                            <div class="pf-field">
                                <input type="text" id="city" name="city" value="{{ !$resume == null ? $resume->city : ""}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <span class="pf-title">State*</span>
                            <div class="pf-field">
                                <input type="text" id="state" name="state" value="{{ !$resume == null ? $resume->state : ""}}">
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


@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  	<script>
  		$(function(){
        'use strict'

        var pincode=0;
        $('#pincode').on('input',function(e){
            pincode = jQuery('#pincode').val();
            if(pincode.length != 6){
                console.log('No valid pin');
                $("#pinmsg").text("Invalid Pin Codoe");
                $('#state').val('');
                $('#city').val('');
            }else{
                $("#pinmsg").text("");
                if(pincode.length == 6){
                    $.ajax({
                        type:'get',
                        url:"{{ route('generate.location') }}",
                        data:{pincode:pincode},
                        success:function(data){
                            //console.log(data.PostOffice);
                            var getData = data.PostOffice['0'];
                            console.log(getData.State)
                            console.log(getData.Taluk)
                            $('#state').val(getData.State);
                            $('#city').val(getData.Taluk);
                        },
                        error: function(data){
                            $("#pinmsg").text("Invalid Pin Codoe");
                        }
                    });
                }
            }
        });

        // = jQuery('#pincode').val();
        



      });
  	</script>

@endsection