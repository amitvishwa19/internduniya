@extends('layouts.admin')

@section('title','Corporate')

@section('corporate','active')

@section('style')
@endsection


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Corporate</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item"><a href="{{route('corporate.index')}}">Corporate</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!--end col-->

                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="wrapper card p-2">


        <form role="form" method="post" action="{{route('corporate.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group  col-md-12">
                    <label><b>Corporate Name</b></label>
                    <input type="text" class="form-control" name="title"  value="{{old('title')}}">
                    <div class="error">{{$errors->first('title')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label><b>Corporate Description</b></label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="3" >{{old('description')}}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label><b>Corporate Address</b></label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="3" >{{old('address')}}</textarea>
                </div>

                <div class="form-group  col-md-6">
                    <label><b>Total Employees</b></label>
                    <input type="number" class="form-control" name="employees"  value="{{old('employees')}}">
                </div>

                <div class="form-group  col-md-6">
                    <label><b>Corporate Type</b></label>
                    <select name="type" id="" class="form-control">
                        <option value="company" checked>Company</option>
                        <option value="university">University</option>
                    </select>
                </div>
    
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1"><b>Avatar Image</b></label><br>
                
               
                <div class="media mb-2">
                    <img src="" height="60" class="mr-3 align-self-center rounded" alt="...">
                </div>
                
                <input type="file" class="" name="avatar">
            </div>

            <div class="form-group">
                <label><b> Status</b></label>
                <div class="radio radio-info">
                    <input type="radio" name="status" id="radio4" value="1" checked>
                    <label for="radio4">
                        Active
                    </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="status" id="radio5" value="0">
                    <label for="radio5">
                        InActive
                    </label>
                </div>
            </div>


            <div class="form-group mt-3">
                <button class="btn btn-info waves-effect waves-light btn-sm">Add Corporate</button>
                <a href="{{route('corporate.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
