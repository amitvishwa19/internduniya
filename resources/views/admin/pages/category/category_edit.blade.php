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

            <div class="form-group  ">
                <label for="exampleFormControlSelect1">Parent Category</label>
                <select class="form-control" name="parent">
                    <option value="" selected>----Select parent category----</option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}"
                            @if($category->parent)
                                @if($cat->id == $category->parent->id)
                                    selected="selected"
                                @endif
                            @endif
                            >{{$cat->name}}

                            @foreach($cat->child as $c1)
                                <option value="{{$c1->id}}"
                                    @if($category->parent)
                                        @if($c1->id == $category->parent->id)
                                            selected="selected"
                                        @endif
                                    @endif
                                    >{{$cat->name}} > {{$c1->name}}

                                    @foreach($c1->child as $c2)
                                        <option value="{{$c2->id}}"
                                            @if($category->parent)
                                                @if($c2->id == $category->parent->id)
                                                    selected="selected"
                                                @endif
                                            @endif
                                        >{{$cat->name}} > {{$c1->name}} > {{$c2->name}}
                                        </option>
                                    @endforeach
                                </option>
                            @endforeach
                        </option>
                    @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted"><i>By Selecting this WebBlock Name will become category under select parent</i></small>
            </div>

            <div class="form-group">
                <label>Category name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}{{$category->name}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Add Class</label>
                <input type="text" class="form-control" name="class" value="{{ old('class') }}{{$category->class}}">
                <small id="emailHelp" class="form-text text-muted"><i>Additional Class</i>.</small>
            </div>

            <div class="checkbox form-group">
                <input id="checkbox0" type="checkbox" name="favourite" {{$category->favourite ? "checked" : ""}}>
                <label for="checkbox0">
                    Favourite
                </label>
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
