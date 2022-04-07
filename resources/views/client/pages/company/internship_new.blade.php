@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="profile-title d-flex">
        <h3>Post New Internships</h3>
        
    </div>


    <div class="profile-form-edit">
        <form  method="post" action="{{route('company.internship.new.add')}}" enctype="multipart/form-data">
            @csrf

            @if (session('message'))
            <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                <strong>{{ session('message') }}</strong> 
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
                <div class="col-lg-12">
                    <span class="pf-title">Internship Title*</span>
                    <div class="pf-field">
                    <input type="text" name="title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <span class="pf-title">Internship Description*</span>
                    <div class="pf-field">
                    <textarea name="description">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <span class="pf-title">Internship Requirements*</span>
                    <div class="pf-field">
                    <textarea name="requirement">{{old('requirement')}}</textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Duration(days)*</span>
                    <div class="pf-field">
                        <input type="text" name="duration" value="{{old('duration')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Stipend*</span>
                    <div class="pf-field">
                        <input type="text" name="stipend" value="{{old('stipend')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Start Date*</span>
                    <div class="pf-field">
                        <input type="date" name="start_date" value="{{old('start_date')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">End Date*</span>
                    <div class="pf-field">
                        <input type="date" name="end_date" value="{{old('end_date')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Last Apply Date*</span>
                    <div class="pf-field">
                        <input type="date" name="apply_date" value="{{old('apply_date')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Number of openings*</span>
                    <div class="pf-field">
                        <input type="number" name="total_opening" value="{{old('total_opening')}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Postal Code*</span>
                    <div class="pf-field">
                        <input type="number" id="pincode" name="post_code" value="{{old('post_code')}}" autocomplete="off" >
                        <small class="ml-2" id="pinmsg"></small>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">City*</span>
                    <div class="pf-field">
                        <!-- <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="city">
                            <option value="">-Select City-</option>
                            <option value="vadodara">Vadodara</option>
                            <option value="ahmedabad">Ahmedabad</option>
                        </select> -->
                        <input type="text" id="city" name="city" value="{{old('city')}}" autocomplete="off" >
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">State*</span>
                    <div class="pf-field">
                        <!-- <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="state">
                            <option value="">-Select State-</option>
                            <option value="gujarat">Gujarat</option>
                            <option value="punjab">Punjab</option>
                        </select> -->
                        <input type="text" id="state" name="state" value="{{old('state')}}" autocomplete="off" >
                    
                    </div>
                </div>


                <div class="col-lg-6">
                    <span class="pf-title">Opening Type*</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="type">
                            <option value="">-Select Opening Type-</option>
                            <option value="wfh">Work From Home</option>
                            <option value="fulltime">Full-time</option>
                            <option value="parttime">Part-time</option>
                        </select>
                    
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Category*</span>
                    <div class="pf-field">
                        <select class=" chosen" style="display: none;" name="categories[]" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Status*</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="status">
                            <option value="">-Select Status-</option>
                            <option value="1">Open</option>
                            <option value="0">Close</option>
                        </select>
                    </div>
                </div>

                
                <div class="col-lg-12 mb-4 mt-4">
                    <button type="submit">Post Internship</button>
                </div>
            </div>
        </form>
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