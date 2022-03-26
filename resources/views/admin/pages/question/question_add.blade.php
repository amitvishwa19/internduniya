@extends('layouts.admin')

@section('title','Question')

@section('question','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <h5>
            Add New Question
        </h5>

        <form role="form" method="post" action="{{route('question.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Question</label>
                <textarea name="question" class="form-control" cols="30" rows="5">{{old('question')}}</textarea>
                <div class="error">{{$errors->first('question')}}</div>
            </div>

            <div class="form-group">
                <label>Score</label>
                <input type="number" class="form-control col-md-2" name="score"  value="{{old('score')}}">
            </div>

            <div class="form-group">
                <label>Question Type</label>
                <select name="type" id="" class="form-control col-md-3">
                    <option value="objective">Objective</option>
                    <option value="descriptive">Descriptive</option>
                </select>
            </div>

            <div class="radio radio-success">
                <input type="radio" value="1" name="status" id="yes">
                <label for="yes">Active</label>

                <input type="radio"   value="0" name="status" id="no">
                <label for="no">InActive</label>
            </div>


            <div class="form-group mt-3">
                <button class="btn btn-primary btn-sm">Add Question</button>
                <a href="{{route('question.index')}}" class="btn btn-info btn-sm">Cancel</a>
            </div>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
