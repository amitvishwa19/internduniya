@extends('layouts.admin')

@section('title','Quiz')

@section('quiz','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <div class="">
            <h4><b>Quizs</b> <div class="float-right"><a href="{{route('quiz.create')}}" class="btn btn-primary btn-sm">Add Quiz</a></div></h4>
        </div>
        <div data-label="Example" class="mt-2">
            <table id="datatable" class="table table-color-primary">
                <thead>
                <tr>
                    <th style="" class=""><b>Name</b></th>
                    <th style="" class=""><b>Description</b></th>
                    <th style="" class=""><b>Questionss</b></th>
                    <th style="" class=""><b>Start Date</b></th>
                    <th style="" class=""><b>End Date</b></th>
                    <th style="" class=""><b>Notice Published</b></th>
                    <th style="" class=""><b>Result Published</b></th>
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
        ajax: '{!! route('quiz.index') !!}',
        columns:[
            { data: 'name', name: 'name'},
            { data: 'description', name: 'description'},
            { data: 'questions', name: 'questions'},
            { data: 'start_date', name: 'start_date'},
            { data: 'end_date', name: 'end_date' },
            { data: 'notice_published', name: 'notice_published' },
            { data: 'result_published', name: 'result_published' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Quiz?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "quiz/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Quiz Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
