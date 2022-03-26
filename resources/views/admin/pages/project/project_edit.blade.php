@extends('layouts.admin')

@section('title','Project')

@section('project','active')

@section('style')
@endsection


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Create Project</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Projects</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="wrapper card p-2">
        <h5>
            Edit Project
        </h5>

        <form role="form" method="post" action="{{route('project.update',$project->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="projectName"><b>Project Name</b></label>
                        <input type="text" class="form-control" name="name"  placeholder="Project name" value="{{old("name")}}{{$project->name}}">
                    </div>

                    <div class="col-lg-3">
                        <label for="pro-end-date"><b>Client</b></label>
                        <select class="form-control" name="client_id">
                            <option>--Select Client--</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id}}"{{ (old("client_id") == $client->id ? "selected":"") }}{{ $project->client->id == $client->id ? "selected":""}}>{{ $client->name}}</option>
                            @endforeach
                        </select>
                    </div><!--end col-->

                    <div class="col-md-3">
                        <label for="pro-start-date"><b>Start Date</b></label>
                        <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}{{$project->start_date}}">
                    </div>
                    <div class="col-md-3">
                        <label for="pro-start-date"><b>Deadline</b></label>
                        <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}{{$project->end_date}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="pro-message"><b>Requirement</b></label>
                        <textarea class="form-control" rows="3" name="requirement"  placeholder="Project Requirement">{{old("requirement")}}{{$project->requirement}}</textarea>
                    </div><!--end col-->

                    <div class="col-md-6">
                        <label for="pro-message"><b>Description</b></label>
                        <textarea class="form-control" rows="3" name="description"  placeholder="Project Description">{{old("description")}}{{$project->description}}</textarea>
                    </div><!--end col-->

                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-lg-4 col-4">
                        <label for="pro-rate"><b>Rate</b></label>
                        <input type="text" class="form-control" name="rate" placeholder="Enter rate" value="{{old("rate")}}{{$project->rate}}">
                    </div><!--end col-->
                    <div class="col-lg-4 col-4">
                        <label for="pro-end-date"><b>Price Type</b></label>
                        <select class="form-control" name="price_type">
                            <option value="fix" {{ (old("price_type") == "fix" ? "selected":"") }}{{ $project->price_type == "fix" ? "selected":""}}>Fix</option>
                            <option value="hourly" {{ (old("price_type") == "hourly" ? "selected":"") }}{{ $project->price_type == "hourly" ? "selected":""}}>Hourly</option>
                            <option value="daily" {{ (old("price_type") == "daily" ? "selected":"") }}{{ $project->price_type == "daily" ? "selected":""}}>Daily</option>
                        </select>
                    </div><!--end col-->
                    <div class="col-lg-4 col-4">
                        <label for="pro-end-date"><b>Invoice Time</b></label>
                        <select class="form-control" name="invoice_time">
                            <option value="10" {{ (old("invoice_time") == "10" ? "selected":"") }}{{ $project->invoice_time == "10" ? "selected":""}}>10 Days</option>
                            <option value="15" {{ (old("invoice_time") == "15" ? "selected":"") }}{{ $project->invoice_time == "15" ? "selected":""}}>15 Days</option>
                            <option value="30" {{ (old("invoice_time") == "30" ? "selected":"") }}{{ $project->invoice_time == "30" ? "selected":""}}>30 Days</option>
                        </select>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end form-group-->

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-4"">
                        <label for="pro-end-date"><b>Priority</b></label>
                        <select class="form-control" name="priority">
                            <option>-- Select Priority --</option>
                            <option value="high" {{ (old("priority") == "high" ? "selected":"")}}{{ $project->priority == "high" ? "selected":""}}>High</option>
                            <option value="medium" {{ (old("priority") == "medium" ? "selected":"")}}{{ $project->priority == "medium" ? "selected":""}}>Medium</option>
                            <option value="low" {{ (old("priority") == "low" ? "selected":"")}}{{ $project->priority == "low" ? "selected":""}}>Low</option>
                        </select>
                    </div><!--end col-->

                    <div class="col-lg-4 col-4"">
                        <label for="pro-end-date"><b>Status</b></label>
                        <select class="form-control" name="status">
                            <option>-- Select Status --</option>
                            <option value="planning" {{ (old("status") == "planning" ? "selected":"") }}{{ $project->status == "planning" ? "selected":""}}>Planning</option>
                            <option value="started" {{ (old("status") == "started" ? "selected":"") }}{{ $project->status == "started" ? "selected":""}}>Started</option>
                            <option value="wip" {{ (old("status") == "wip" ? "selected":"") }}{{ $project->status == "wip" ? "selected":""}}>WIP</option>
                            <option value="completed" {{ (old("status") == "completed" ? "selected":"") }}{{ $project->status == "completed" ? "selected":""}}>Completed</option>
                        </select>
                    </div><!--end col-->

                    <div class="col-md-4">
                        <label for="pro-start-date"><b>Complition Status(%)</b></label>
                        <input type="text" class="form-control" name="completion_status" value="{{old('completion_status')}}{{$project->completion_status}}">
                    </div>

                </div><!--end row-->
            </div><!--end form-group-->

            <div class="form-group">
                <label for="pro-message"><b>Notes</b></label>
                <textarea class="form-control" rows="3" name="notes"  placeholder="notes here..">{{$project->notes}}</textarea>
            </div><!--end form-group-->

            <button type="submit" class="btn btn-info waves-effect waves-light btn-sm">Update project</button>
            <a href="{{route('project.index')}}" class="btn btn-secondary btn-sm">Cancel</a>

        </form>


    </div>

@endsection


@section('modal')



@endsection


@section('scripts')


@endsection
