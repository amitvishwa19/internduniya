@extends('layouts.admin')

@section('title','Quiz')

@section('quiz','active')

@section('style')
    <link href="{{asset('public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Edit Quiz
        </h5>

        <form role="form" method="post" action="{{route('quiz.update',$quiz->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>Quiz Name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name')}}{{$quiz->name}}">
                <div class="error">{{$errors->first('name')}}</div>
            </div>

            <div class="form-group">
                <label>Quiz Desctiption</label>
                <textarea name="description" class="form-control" cols="30" rows="5">{{old('description')}}{{$quiz->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control  col-md-3" name="start_date"  value="{{old('start_date')}}{{$quiz->start_date}}">
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date" class="form-control  col-md-3" name="end_date"  value="{{old('end_date')}}{{$quiz->end_date}}">
            </div>

            <div class="form-group mt-2">
                <label>Questions</label>
                <select id="multi" class="full-width" name="questions[]" multiple>
                    @foreach($questions as $question)
                        <option value="{{$question->id}}" select
                            @foreach($quiz->questions as $ques)
                                @if($ques->id == $question->id)
                                    selected
                                @endif
                            @endforeach
                            >{{$question->question}}</option>
                            @endforeach
                </select>
            </div>

            <div class="radio radio-success mt-3">
                <input type="radio" value="1" @if($quiz->status == '1') checked @endif name="status" id="yes">
                <label for="yes">Active</label>

                <input type="radio" @if($quiz->status == '0') checked @endif  value="0" name="status" id="no">
                <label for="no">InActive</label>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Update Quiz</button>
                <a href="{{route('quiz.index')}}" class="btn btn-info btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')
    <script src="{{asset('public/assets/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script>

        $("#multi").select2();


    </script>

@endsection
