@extends('layouts.admin')

@section('title','Video')

@section('video','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <div class="">
            <h4><b>Videos</b> <div class="float-right"><a href="{{route('video.create')}}" class="btn btn-primary btn-sm">Add Video</a></div></h4>
        </div>
        <div data-label="Example" class="mt-2">
            <table id="datatable" class="table table-color-primary">
                <thead>
                <tr>
                    <th style="" class=""><b>Name</b></th>
                    <th style="" class=""><b>Created</b></th>
                    <th style="" class=""><b>Actions</b></th>
                </tr>
                </thead>

                <tbody>
                </tbody>

            </table>
        </div>
    </div>

@endsection


@section('modal')



@endsection


@section('scripts')
  <script src="{{asset('public/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>

  <script>
    $(function(){
      'use strict'


      //Datatable
      $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('video.index') !!}',
        columns:[
            { data: 'name', name: 'name'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Video?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "video/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Video Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
