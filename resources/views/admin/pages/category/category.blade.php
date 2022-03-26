@extends('layouts.admin')

@section('title','Category')

@section('category','active')

@section('style')
    <link href="{{asset('public/admin/plugins/nestable/jquery.nestable.min.css')}}" rel="stylesheet" />
@endsection


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Categories</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-sm-5">

            <form method="post" action="{{route('category.store')}}"  class="mg-t-30">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Parent Category</label>
                    <select class="form-control" name="parent">
                        <option value="">Select parent category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                                @foreach($category->child as $c1)
                                        <option value="{{$c1->id}}">
                                        {{$category->name}} > {{$c1->name}}
                                        @foreach($c1->child as $c2)
                                            <option value="{{$c2->id}}">
                                                    {{$category->name}} > {{$c1->name}} > {{$c2->name}}
                                                    @foreach($c2->child as $c3)
                                                    <option value="{{$c3->id}}">
                                                        {{$category->name}} > {{$c1->name}} > {{$c2->name}} > {{$c3->name}}
                                                        @foreach($c3->child as $c4)
                                                            <option value="{{$c4->id}}">
                                                                {{$category->name}} > {{$c1->name}} > {{$c2->name}} > {{$c3->name}} > {{$c4->name}}
                                                            </option>
                                                        @endforeach
                                                    </option>
                                                    @endforeach
                                            </option>
                                        @endforeach
                                        </option>
                                @endforeach
                            </option>
                            @endforeach
                    </select>
                    <small id="emailHelp" class="form-text text-muted"><i>By Selecting this WebBlock Name will become category under select parent</i></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category') }}" required>
                    <small id="emailHelp" class="form-text text-muted"><i>The name is how it appears on your site</i>.</small>
                </div>

                <button class="btn btn-info waves-effect waves-light btn-sm">Add Category</button>

            </form>
        </div>

        <div class="col-sm-7">

            <div class="row">
                {{-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List 1</h4>
                            <p class="text-muted mb-0">Drag & drop hierarchical list with
                                mouse and touch compatibility (jQuery plugin).
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="custom-dd dd" id="nestable_list_1">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            Item 1
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            Item 2
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="3">
                                                <div class="dd-handle">
                                                    Item 3
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="4">
                                                <div class="dd-handle">
                                                    Item 4
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="5">
                                                <div class="dd-handle">
                                                    Item 5
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="6">
                                                        <div class="dd-handle">
                                                            Item 6
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="7">
                                                        <div class="dd-handle">
                                                            Item 7
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="8">
                                                        <div class="dd-handle">
                                                            Item 8
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="9">
                                                <div class="dd-handle">
                                                    Item 9
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="10">
                                                <div class="dd-handle">
                                                    Item 10
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div><!--nastable-list-1-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col --> --}}

                {{-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List 2</h4>
                            <p class="text-muted mb-4">Drag & drop hierarchical list with
                                mouse and touch compatibility (jQuery plugin).
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="custom-dd dd" id="nestable_list_2">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="11">
                                        <div class="dd-handle">
                                            Item 11
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="12">
                                        <div class="dd-handle">
                                            Item 12
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="13">
                                        <div class="dd-handle">
                                            Item 13
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="14">
                                        <div class="dd-handle">
                                            Item 14
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="15">
                                        <div class="dd-handle">
                                            Item 15
                                        </div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="16">
                                                <div class="dd-handle">
                                                    Item 16
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="17">
                                                <div class="dd-handle">
                                                    Item 17
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle">
                                                    Item 18
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div><!--nastable-list-2-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!-- end col --> --}}
            </div> <!-- end row -->




            <div class="mg-t-50 mg-b-50">
                <div class="custom-dd dd" id="nestable_list_1">
                    @include('admin.pages.category.child_cat',$categories)
                </div>
            </div>

            <div class="mg-t-50">
                <b>Note:</b><br>
                <small><i>Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category Uncategorized.</i></small>
            </div>
        </div>
    </div>
@endsection


@section('modal')



@endsection


@section('scripts')
    {{-- <script src="{{asset('public/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script> --}}

    <script src="{{asset('public/admin/plugins/nestable/jquery.nestable.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/pages/jquery.nastable.init.js')}}"></script>




  <script>
    $(function(){
      'use strict'
        //   $('.dd').nestable({
        //         onDragStart: function(l,e){
        //             //l is the main container
        //             //e is the element that was moved
        //             console.log(l)
        //             console.log(e)
        //         }
        //     });


        //Action Delete function
        $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
                title: "Delete Selected Category?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                $.ajax({
                    url: "category/"+id,
                    type:"post",
                    data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                    success: function(result){
                        location.reload();
                        toast({
                            type: "success",
                            title: "Category Deleted Successfully"
                        });
                    }
                });
                }
            });
        });

        $(document).on('click','.delete',function(){
            console.log('delete');
        });

    });
  </script>

@endsection
