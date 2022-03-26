@extends('layouts.admin')

@section('title','Intenship')

@section('intenship','active')

@section('style')
@endsection


@section('content')
    <!-- Page-Title -->
    <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Intenships</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                                <li class="breadcrumb-item"><a href="{{route('internship.index')}}">Internship</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->


    <div class="wrapper card p-2 ">
        
        <form role="form" method="post" action="{{route('internship.update',$intenship->id)}}" enctype="multipart/form-data" >
            @csrf
            {{method_field('PUT')}}

            <div class="row">
                <div class="form-group  col-md-12">
                    <label><b>Title</b></label>
                    <input type="text" class="form-control" name="title"  value="{{$intenship->title}}" disabled>
                    <div class="error">{{$errors->first('title')}}</div>
                </div>

                <div class="form-group col-md-12">
                    <label><b>Description</b></label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5" disabled>{{$intenship->description}}</textarea>
                </div>

                <div class="form-group col-md-12">
                    <label><b>Requirements</b></label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="5" disabled>{{$intenship->requirement}}</textarea>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Duration</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->duration}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Stipend</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->stipend}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Start Date</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->start_date}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>End Date</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->end_date}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Apply Date</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->apply_date}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Total Opening</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->total_opening}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>City</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->city}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>State</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{$intenship->state}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Type</b></label>
                    <input type="text" class="form-control" name="employees"  value="{{ucFirst($intenship->type)}}" disabled>
                </div>

                <div class="form-group  col-md-2">
                    <label><b>Approve</b></label>
                    <select name="approved" id="" class="form-control">
                        <option value="1" {{$intenship->approved == true ? "selected" : ""}}>Approve</option>
                        <option value="0" {{$intenship->approved == false ? "selected" : ""}}>Disapprove</option>
                    </select>
                </div>
    
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-info waves-effect waves-light btn-sm">Update Intenship</button>
                <a href="{{route('internship.index')}}" class="btn btn-secondary waves-effect waves-light btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
