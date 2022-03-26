@extends('layouts.admin')

@section('title','File')

@section('file','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Edit File
        </h5>

        <form role="form" method="post" action="{{route('file.update',$file->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>File name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Update File</button>
                <a href="{{route('file.index')}}" class="btn btn-info btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
