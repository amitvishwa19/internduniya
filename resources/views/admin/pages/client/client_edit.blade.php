@extends('layouts.admin')

@section('title','Client')

@section('client','active')

@section('style')
@endsection


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Clients</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!--end col-->

                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="wrapper card p-2">


        <form role="form" method="post" action="{{route('client.update',$client->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="row">
                <div class="form-group  col-md-6">
                    <label><b>Client name</b></label>
                    <input type="text" class="form-control" name="name"  value="{{$client->name}}{{old('name')}}">
                    <div class="error">{{$errors->first('name')}}</div>
                </div>
                <div class="form-group col-md-6">
                    <label><b>Client Email</b></label>
                    <input type="email" class="form-control" name="email"  value="{{$client->email}}{{old('email')}}">
                </div>
                <div class="form-group  col-md-6">
                    <label><b>Primary Contact</b></label>
                    <input type="text" class="form-control" name="primary_contact"  value="{{$client->primary_contact}}{{old('primary_contact')}}">
                </div>
                <div class="form-group  col-md-6">
                    <label><b>Secondary Contact</b></label>
                    <input type="text" class="form-control" name="secondary_contact"  value="{{$client->secondary_contact}}{{old('secondary_contact')}}">
                </div>
            </div>


            <div class="form-group">
                <label><b>Client Description</b></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="3" >{{$client->description}}{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label><b>Client Type</b></label>
                <div class="checkbox checkbox-info">
                    <input id="checkbox4" type="checkbox" name="type" value="premium" @if($client->type == "premium") checked @endif>
                    <label for="checkbox4">
                        Premium
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label><b>Client Status</b></label>
                <div class="radio radio-info">
                    <input type="radio" name="status" id="radio4" value="1" @if($client->status == 1)  checked  @endif>
                    <label for="radio4">
                        Active
                    </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="status" id="radio5" value="0" @if($client->status == 0)  checked  @endif>
                    <label for="radio5">
                        InActive
                    </label>
                </div>
            </div>


            <div class="form-group mt-3">
                <button class="btn btn-info waves-effect waves-light btn-sm">Update Client</button>
                <a href="{{route('client.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
