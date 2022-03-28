@extends('client.pages.company.layout')



@section('main_content')

<div class="col-lg-10 column">
    <div class="profile-title d-flex">
        <h3>Post New Internships</h3>
        
    </div>


    <div class="profile-form-edit">
        <form  method="post" action="{{route('company.internship.update',$internship->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}


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
                    <span class="pf-title">Internship Title</span>
                    <div class="pf-field">
                    <input type="text" name="title" value="{{old('title')}}{{$internship->title}}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <span class="pf-title">Internship Description</span>
                    <div class="pf-field">
                    <textarea name="description">{{old('description')}}{{$internship->description}}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <span class="pf-title">Internship Requirements</span>
                    <div class="pf-field">
                    <textarea name="requirement">{{old('requirement')}}{{$internship->requirement}}</textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Duration(days)</span>
                    <div class="pf-field">
                        <input type="text" name="duration" value="{{old('duration')}}{{$internship->duration}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Stipend</span>
                    <div class="pf-field">
                        <input type="text" name="stipend" value="{{old('stipend')}}{{$internship->stipend}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Start Date</span>
                    <div class="pf-field">
                        <input type="date" name="start_date" value="{{old('start_date')}}{{$internship->start_date}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">End Date</span>
                    <div class="pf-field">
                        <input type="date" name="end_date" value="{{old('end_date')}}{{$internship->end_date}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Last Apply Date</span>
                    <div class="pf-field">
                        <input type="date" name="apply_date" value="{{old('apply_date')}}{{$internship->apply_date}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Number of openings</span>
                    <div class="pf-field">
                        <input type="number" name="total_opening" value="{{old('total_opening')}}{{$internship->total_opening}}">
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">State</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="state">
                            <option value="">-Select State-</option>
                            <option value="gujarat">Gujarat</option>
                            <option value="punjab">Punjab</option>
                        </select>
                    
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="pf-title">City</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="city">
                            <option value="">-Select City-</option>
                            <option value="vadodara">Vadodara</option>
                            <option value="ahmedabad">Ahmedabad</option>
                        </select>
                    </div>
                </div>


                <div class="col-lg-6">
                    <span class="pf-title">Opening Type</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="type">
                            <option value="">-Select Opening Type-</option>
                            <option value="wfh" {{$internship->type == "wfh" ? "selected" : ""}}>Work From Home</option>
                            <option value="fulltime" {{$internship->type == "fulltime" ? "selected" : ""}}>Full Time</option>
                            <option value="parttime" {{$internship->type == "parttime" ? "selected" : ""}}>Part Time</option>
                        </select>
                    
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="pf-title">Category</span>
                    <div class="pf-field">
                        <select class=" chosen" style="display: none;" name="categories[]" multiple="multiple">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @foreach($internship->categories as $intCat)
                                @if($intCat->id == $category->id)
                                    selected
                                @endif
                                @endforeach
                                >{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    
                    </div>
                </div>


                <div class="col-lg-6">
                    <span class="pf-title">Status</span>
                    <div class="pf-field">
                        <select data-placeholder="Please Select Specialism" class="chosen" style="display: none;" name="status" >
                            <option value="">-Select Status-</option>
                            <option value=1 {{$internship->status == true ? "selected" : ""}}>Open</option>
                            <option value=0 {{$internship->status == false ? "selected" : ""}}>Close</option>
                        </select>
                    </div>
                </div>

                
                <div class="col-lg-12 mb-4 mt-4">
                    <button type="submit">Update Internship</button>
                    
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

         $('.select2').select2();



      });
  	</script>

@endsection