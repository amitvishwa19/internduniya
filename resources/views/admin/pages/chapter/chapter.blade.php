@extends('layouts.admin')

@section('title','Chapter')

@section('chapter','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <div class="">
            <h4><b>Chapters</b> <div class="float-right"><a href="{{route('chapter.create')}}" class="btn btn-primary btn-sm">Add Chapter</a></div></h4>
        </div>
        <div data-label="Example" class="mt-2">
            <table id="datatable" class="table table-color-primary">
                <thead>
                <tr>
                    <th style="" class=""><b>Name</b></th>
                    <th style="" class=""><b>Description</b></th>
                    <th style="" class=""><b>Author</b></th>
                    <th style="" class=""><b>Quizs</b></th>
                    <th style="" class=""><b>Free</b></th>
                    <th style="" class=""><b>Price</b></th>
                    <th style="" class=""><b>Status</b></th>
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
        ajax: '{!! route('chapter.index') !!}',
        columns:[
            { data: 'name', name: 'name'},
            { data: 'description', name: 'description'},
            { data: 'user', name: 'user'},
            { data: 'quiz_show', name: 'quiz_show'},
            { data: 'free', name: 'free'},
            { data: 'price', name: 'price'},
            { data: 'status', name: 'status'},
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Chapter?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "chapter/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Chapter Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
