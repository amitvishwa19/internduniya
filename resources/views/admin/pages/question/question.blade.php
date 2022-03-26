@extends('layouts.admin')

@section('title','Question')

@section('question','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <div class="">
            <h4><b>Questions</b> <div class="float-right"><a href="{{route('question.create')}}" class="btn btn-primary btn-sm">Add Question</a></div></h4>
        </div>
        <div data-label="Example" class="mt-2">
            <table id="datatable" class="table table-color-primary">
                <thead>
                <tr>
                    <th style="" class=""><b>Question</b></th>
                    <th style="" class=""><b>Score</b></th>
                    <th style="" class=""><b>Type</b></th>
                    <th style="" class=""><b>Author</b></th>
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
        ajax: '{!! route('question.index') !!}',
        columns:[
            { data: 'question', name: 'question'},
            { data: 'score', name: 'score'},
            { data: 'type', name: 'type'},
            { data: 'author', name: 'author'},
            { data: 'status', name: 'status'},
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Question?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "question/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Question Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
