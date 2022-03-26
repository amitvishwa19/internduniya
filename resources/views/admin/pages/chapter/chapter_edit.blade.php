@extends('layouts.admin')

@section('title','Chapter')

@section('chapter','active')

@section('style')
    <link href="{{asset('public/assets/plugins/summernote/css/summernote.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Edit Chapter
        </h5>

        <form role="form" method="post" action="{{route('chapter.update',$chapter->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>Chapter name</label>
                <input type="text" class="form-control" name="name"  value="{{$chapter->name}}{{old('name')}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label>Chapter Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="4">{{$chapter->description}}{{old('description')}}</textarea>
            </div>

            <div class="summernote-wrapper">
                <label>Chapter Content</label>
                <textarea name="content" id="summernote" cols="30" rows="10">{{$chapter->content}}{{old('content')}}</textarea>
            </div>

            <div class="form-group mt-2">
                <label>Quizs</label>
                <select id="multi" class="full-width" name="quizs[]" multiple>
                    @foreach($quizs as $quiz)
                        <option value="{{$quiz->id}}" select
                            @foreach($chapter->quizs as $qz)
                                @if($qz->id == $quiz->id)
                                    selected
                                @endif
                            @endforeach
                            >{{$quiz->name}}</option>
                            @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Chapter Price</label>
                <input type="number" class="form-control" name="price" value="{{$chapter->price}}{{old('price')}}">
            </div>


            <div class="form-group">
                <label>Free</label>
                <select name="free" id="" class="form-control col-md-3">
                    <option value="1" @if($chapter->free == true) selected @endif>Free</option>
                    <option value="0" @if($chapter->free == false) selected @endif>Paid</option>
                </select>
            </div>

            <div class="radio radio-success">
                <input type="radio" @if($chapter->status == true) checked @endif value="1" name="status" id="yes">
                <label for="yes">Active</label>
                <input type="radio"  @if($chapter->status == false) checked @endif value="0" name="status" id="no">
                <label for="no">InActive</label>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Update Chapter</button>
                <a href="{{route('chapter.index')}}" class="btn btn-info btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')
    <script src="{{asset('public/assets/plugins/summernote/js/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/assets/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    $('#summernote').summernote({
        height: 200,
        onfocus: function(e) {
            $('body').addClass('overlay-disabled');
        },
        onblur: function(e) {
            $('body').removeClass('overlay-disabled');
        }
    });

    $("#multi").select2();


</script>

@endsection
