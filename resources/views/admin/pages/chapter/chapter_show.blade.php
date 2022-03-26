@extends('layouts.admin')

@section('title','Chapter')

@section('chapter','active')

@section('style')
@endsection


@section('content')

    <div class="wrapper card p-2">
        <div class="title">
            <h5><b>{{$chapter->name}}</b></h5>
        </div>
        <div class="">
            <label><b>Chapter Description</b></label>
            <p>{{$chapter->description}}</p>
        </div>
        {{-- <div class="card" style="height: 50px">
            <img src="{{$chapter->feature_image}}" alt="">
        </div> --}}
        <div class="">
            <label><b>Chapter content</b></label>
            <p>{{$chapter->content}}</p>
        </div>
        <div class="">
            <label><b>Chapter Availability</b></label>
            <p class="badge badge-success">{{$chapter->free == true ? 'Free' : 'Paid'}}</p>
            <p class="badge badge-success">{{$chapter->free == true ? 'N/A' : '₹ ' . $chapter->price}}</p>
            <p class="badge badge-success">{{$chapter->ststus == true ? 'Avaliable' : 'Not  Avaliable'}}</p>
        </div>
        <div class="mt-2">

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
            { data: 'author', name: 'author'},
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
