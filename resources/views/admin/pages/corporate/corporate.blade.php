@extends('layouts.admin')

@section('title','Corporate')

@section('corporate','active')


@section('style')
    {{-- Datatable --}}
        <link href="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <h4 class="page-title">Corporate</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item active">Corporate</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <a href="{{route('corporate.create')}}" class="btn btn-info waves-effect waves-light btn-sm" ><b>Add New Corporate</b></a>
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
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width:20%">Title</th>
                                    <th style="width:10%">Description</th>
                                    <th style="width:10%">Type</th>
                                    <th style="width:10%">Status</th>
                                    <th style="width:5%">Actions</th>
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

</div>
@endsection



@section('scripts')

    {{-- Datatable JS --}}
        <script src="{{asset('public/admin/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    {{-- Datatable JS --}}




    <script>

$(function(){
            'use strict'

            //Datatable
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('corporate.index') !!}',
                columns:[
                    { data: 'companymeta', name: 'companymeta'},   
                    { data: 'description', name: 'description'},
                    { data: 'type', name: 'type'},
                    { data: 'status', name: 'status'},        
                    { data: 'action', name: 'action' },
                ]
            });


            //Action Delete function
            $(document).on('click','.delete',function(){
                var id =  $(this).attr('id');
                swalWithBootstrapButtons({
                    title: "Delete Selected Corporate?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then(result => {
                    if (result.value) {
                    $.ajax({
                        url: "corporate/"+id,
                        type:"post",
                        data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                        success: function(result){
                            location.reload();
                            toast({
                                type: "success",
                                title: "Corporate Deleted Successfully"
                            });
                        }
                    });
                    }
                });
            });

        });

    </script>

@endsection
