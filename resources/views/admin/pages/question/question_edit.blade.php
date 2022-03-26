@extends('layouts.admin')

@section('title','Question')

@section('question','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Edit Question
        </h5>

        <form role="form" method="post" action="{{route('question.update',$question->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label>Question</label>
                <textarea name="question" class="form-control" cols="30" rows="5">{{old('question')}}{{$question->question}}</textarea>
                <div class="error">{{$errors->first('question')}}</div>
            </div>

            <div class="form-group">
                <label>Score</label>
                <input type="number" class="form-control col-md-2" name="score"  value="{{old('score')}}{{$question->score}}">
            </div>

            <div class="form-group">
                <label>Question Type</label>
                <select name="type" id="" class="form-control col-md-3">
                    <option value="selective" @if($question->type == 'selective') selected @endif>Selective</option>
                    <option value="objective" @if($question->type == 'objective') selected @endif>Objective</option>
                </select>
            </div>

            <div class="radio radio-success">
                <input type="radio" value="1" @if($question->status == '1') checked @endif name="status" id="yes">
                <label for="yes">Active</label>

                <input type="radio" @if($question->status == '0') checked @endif  value="0" name="status" id="no">
                <label for="no">InActive</label>
            </div>


            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Update Question</button>
                <a href="{{route('question.index')}}" class="btn btn-info btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
