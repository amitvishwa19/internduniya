@extends('layouts.admin')

@section('title','Route')

@section('route','active')


@section('style')
    {{-- Datatable --}}
    <link href="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    {{-- Datatable --}}
@endsection



@section('content')
    <div class="content-area">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Routes</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                                <li class="breadcrumb-item active">Routes</li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#route_add" class="btn btn-info waves-effect waves-light btn-sm" data-toggle="modal" >Add Route</a>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="modal fade" id="route_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Add Route</h6>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->

                    <form action="{{route('subscribe.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Route Name</label>
                                <input type="text" class="form-control" name="email" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Name of the route</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Route Class</label>
                                <input type="text" class="form-control" name="email" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Full class path of route</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Route Middleware</label>
                                <select class="select2 mb-3 select2-multiple select2-hidden-accessible" style="width: 100%" name="categories[]" multiple="">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>\
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Select the middleware to be applied to this route</small>
                            </div>


                        </div><!--end modal-body-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Add Route</button>
                        </div><!--end modal-footer-->
                    </form>
                </div><!--end modal-content-->
            </div><!--end modal-dialog-->
        </div><!--end modal-->


    </div>
@endsection



@section('scripts')

    {{-- Datatable JS --}}
    <script src="{{asset('public/admin/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('public/admin/plugins/select2/select2.min.js')}}"></script>


    <script>

        $(function(){
            'use strict'

            //Datatable
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('route.index') !!}',
                columns:[
                    { data: 'name', name: 'name'},
                    { data: 'status', name: 'status'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' },
                ]
            });


            //Action Delete function
            $(document).on('click','.delete',function(){
                var id =  $(this).attr('id');
                swalWithBootstrapButtons({
                    title: "Delete Selected Post?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(result => {
                    if (result.value) {
                    $.ajax({
                        url: "route/"+id,
                        type:"post",
                        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                        success: function(result){
                            location.reload();
                            toast({
                                type: "success",
                                title: "Post Deleted Successfully"
                            });
                        }
                    });
                    }
                });
            });

            $('.select2').select2();

        });

    </script>

@endsection
