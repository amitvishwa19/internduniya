@extends('layouts.admin')

@section('title','Category')

@section('category','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Edit Category
        </h5>

        <form role="form" method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>Category name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}{{$category->name}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-info waves-effect waves-light btn-sm">Update Category</button>
                <a href="{{route('category.index')}}" class="btn btn-secondary waves-effect waves-light btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
