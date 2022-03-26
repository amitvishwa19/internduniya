@extends('layouts.admin')

@section('title','Classroom')

@section('classroom','active')

@section('style')
    <link href="{{asset('public/assets/plugins/summernote/css/summernote.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Add New Classroom
        </h5>

        <form role="form" method="post" action="{{route('classroom.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Classroom name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label>Classroom Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
            </div>

            <div class="summernote-wrapper">
                <label>Classroom Overview</label>
                <textarea name="overview" id="summernote" cols="30" rows="10">{{old('overview')}}</textarea>
            </div>

            <div class="form-group mt-2">
                <label>Chapters</label>
                <select id="multi" class="full-width" name="chapters[]" multiple>
                    @foreach($chapters as $chapter)
                        <option value="{{$chapter->id}}" select

                            >{{$chapter->name}}</option>
                            @endforeach
                </select>
            </div>

            <div class="radio radio-success">
                <input type="radio" value="1" name="status" id="yes">
                <label for="yes">Active</label>

                <input type="radio" checked="checked"  value="0" name="status" id="no">
                <label for="no">InActive</label>
            </div>



            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Add Classroom</button>
                <a href="{{route('classroom.index')}}" class="btn btn-info btn-sm">Cancel</a>
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
            height: 400,
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
