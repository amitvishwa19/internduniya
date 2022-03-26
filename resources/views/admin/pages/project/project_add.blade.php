@extends('layouts.admin')

@section('title','Project')

@section('project','active')

@section('style')
    <link href="{{asset('public/admin/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

<div class="container-fluid">
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
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->


    <div class="row">
        <div class="col-12">
            <div class="col-lg-12">
                <form action="{{route('project.store')}}" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="projectName"><b>Project Name</b></label>
                                <input type="text" class="form-control" name="name"  placeholder="Project name" value="{{old("name")}}">
                            </div>
                            <div class="col-lg-3">
                                <label for="pro-end-date"><b>Client</b></label>

                                <select class="form-control" name="client_id">
                                    <option>--Select Client--</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id}}" {{ (old("client_id") == $client->id ? "selected":"") }}>{{ $client->name}}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-md-3">
                                <label for="pro-start-date"><b>Start Date</b></label>
                                <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}">
                            </div>
                            <div class="col-md-3">
                                <label for="pro-start-date"><b>Deadline</b></label>
                                <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pro-message"><b>Requirement</b></label>
                                <textarea class="form-control" rows="3" name="requirement"  placeholder="Project Requirement">{{old("requirement")}}</textarea>
                            </div><!--end col-->

                            <div class="col-md-6">
                                <label for="pro-message"><b>Description</b></label>
                                <textarea class="form-control" rows="3" name="description"  placeholder="Project Description">{{old("description")}}</textarea>
                            </div><!--end col-->

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-lg-4 col-4">
                                <label for="pro-rate"><b>Rate</b></label>
                                <input type="text" class="form-control" name="rate" placeholder="Enter rate" value="{{old("rate")}}">
                            </div><!--end col-->
                            <div class="col-lg-4 col-4">
                                <label for="pro-end-date"><b>Price Type</b></label>
                                <select class="form-control" name="price_type">
                                    <option value="fix" {{ (old("price_type") == "fix" ? "selected":"") }}>Fix</option>
                                    <option value="hourly" {{ (old("price_type") == "hourly" ? "selected":"") }}>Hourly</option>
                                    <option value="daily" {{ (old("price_type") == "daily" ? "selected":"") }}>Daily</option>
                                </select>
                            </div><!--end col-->
                            <div class="col-lg-4 col-4">
                                <label for="pro-end-date"><b>Invoice Time</b></label>
                                <select class="form-control" name="invoice_time">
                                    <option value="10" {{ (old("invoice_time") == "10" ? "selected":"") }}>10 Days</option>
                                    <option value="15" {{ (old("invoice_time") == "15" ? "selected":"") }}>15 Days</option>
                                    <option value="30" {{ (old("invoice_time") == "30" ? "selected":"") }}>30 Days</option>
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
                                    <option value="high" {{ (old("priority") == "high" ? "selected":"") }}>High</option>
                                    <option value="medium" {{ (old("priority") == "medium" ? "selected":"") }}>Medium</option>
                                    <option value="low" {{ (old("priority") == "low" ? "selected":"") }}>Low</option>
                                </select>
                            </div><!--end col-->

                            <div class="col-lg-4 col-4"">
                                <label for="pro-end-date"><b>Status</b></label>
                                <select class="form-control" name="status">
                                    <option>-- Select Status --</option>
                                    <option value="planning" {{ (old("status") == "planning" ? "selected":"") }}>Planning</option>
                                    <option value="started" {{ (old("status") == "started" ? "selected":"") }}>Started</option>
                                    <option value="wip" {{ (old("status") == "wip" ? "selected":"") }}>WIP</option>
                                    <option value="completed" {{ (old("status") == "completed" ? "selected":"") }}>Completed</option>
                                </select>
                            </div><!--end col-->

                            <div class="col-md-4">
                                <label for="pro-start-date"><b>Complition Status(%)</b></label>
                                <input type="text" class="form-control" name="completion_status" value="{{old('completion_status')}}">
                            </div>

                        </div><!--end row-->
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label for="pro-message"><b>Notes</b></label>
                        <textarea class="form-control" rows="5" id="pro-message"  placeholder="notes here.."></textarea>
                    </div><!--end form-group-->

                    <button class="btn btn-info waves-effect waves-light btn-sm">Add Project</button>
                    <a href="{{route('project.index')}}" class="btn btn-secondary btn-sm">Cancel</a>
                </form>  <!--end form-->
            </div><!--end col-->
        </div><!--end col-->
    </div><!--end row-->

</div><!-- container -->

@endsection


@section('modal')



@endsection


@section('scripts')



@endsection
