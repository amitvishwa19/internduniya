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
                        <h4 class="page-title">{{$project->name}}</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Projects</a></li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="media mb-3">
                <div class="avatar-box thumb-lg align-self-center me-2">
                    <span class="avatar-title bg-soft-pink rounded-circle">{{substr($project->name, 0, 1)}}</span>
                </div>
                <div class="media-body align-self-center text-truncate ml-3">
                    <h4 class="m-0 font-weight-semibold text-dark font-15">{{$project->name}}</h4>
                    <p class="text-muted  mb-0 font-13">
                        <span class="text-dark">Client :
                            <a href="{{route('client.show',$project->client->id)}}"><span class="badge badge-soft-info">{{$project->client->name}}</span></a>
                        </span>
                    </p>
                </div><!--end media-body-->
            </div>
            <hr class="hr-dashed">
            <div class="d-flex justify-content-between mb-3">
                <h6 class="font-weight-semibold m-0">Start : <span class="text-muted font-weight-normal"> {{$project->start_date}}</span></h6>
                <h6 class="font-weight-semibold m-0">Deadline : <span class="text-muted font-weight-normal"> {{$project->end_date}}</span></h6>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <h5 class="font-16 m-0 font-weight-bold"><i class="fas fa-rupee-sign"> {{$project->rate}} </i></h5>
                        <p class="mb-0 font-weight-semibold">Total Budget</p>
                    </div>
                </div><!--end col-->

            </div><!--end row-->

            <div>
                <div class="mt-2">
                    <b>Requirements</b>
                    <p class="text-muted mb-1">{{$project->requirement}}</p>
                </div>

                <div class="mt-2">
                    <b>Description</b>
                    <p class="text-muted mb-1">{{$project->description}}</p>
                </div>

                <div class="mt-2">
                    <b>Notes</b>
                    <p class="text-muted mb-1">{{$project->notes}}</p>
                </div>

                <div class="d-flex justify-content-between">
                    {{-- {{$sd = \Carbon\Carbon::createFromFormat('d-m-Y', $project->start_date)}} --}}
                    {{-- <h6 class="font-weight-semibold">All Hours : <span class="text-muted font-weight-normal">{{$project->start_date->diffInDays($project->end_date)}} / 281:30</span></h6> --}}
                    <h6 class="font-weight-semibold">Today :
                        <span class="text-muted font-weight-normal"> {{date('h:i')}}</span>
                        <span class="badge badge-soft-pink font-weight-semibold ml-2"><i class="far fa-fw fa-clock"></i> {{$days}} days left</span>
                    </h6>
                </div>
                <p class="text-muted text-right mb-1">{{$project->completion_status}}% Complete</p>
                <div class="progress mb-4" style="height: 4px;">
                    <div class="progress-bar bg-purple" role="progressbar" style="width: {{$project->completion_status}}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div><!--end task-box-->
        </div><!--end card-body-->
    </div><!--end card-->



</div><!-- container -->

@endsection


@section('modal')



@endsection


@section('scripts')

    <script>

        $(function(){
            'use strict'


            //Action Delete function
            $(document).on('click','.delete',function(){
                var id =  $(this).attr('id');
                swalWithBootstrapButtons({
                    title: "Delete Selected Project?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(result => {
                    if (result.value) {
                    $.ajax({
                        url: "project/"+id,
                        type:"post",
                        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                        success: function(result){
                            location.reload();
                            toast({
                                type: "success",
                                title: "Project Deleted Successfully"
                            });
                        }
                    });
                    }
                });
            });

        });




    </script>

@endsection
