@extends('layouts.admin')

@section('title','Sandbox | Mail')

@section('subscription','active')


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
                            <h4 class="page-title">Sandbox-Mail</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Devlomatix</a></li>
                                <li class="breadcrumb-item active">sandbox-mail</li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                            </a>

                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mail sending functions</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="accordion" id="accordionExample-faq">
                            <div class="card shadow-none border mb-1">
                                <div class="card-header" id="headingOne">
                                <h5 class="my-0">
                                    <button class="btn btn-link ml-4 shadow-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Simple Mail
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample-faq">
                                    <div class="card-body">

                                            Route::get('/mail',function(){<br>
                                                <span class="ml-4">Mail::to('info@digizigs.com')->send(new TestMail);<br></span>
                                                <span class="ml-4">return 'Mail Sent successfully;<br></span>
                                            });
                                            <br><br>
                                            <b>TestMail</b><br><br>
                                            In build function call <br>
                                            return $this->view('mails.testmail');


                                    </div>
                                    <div class="ml-4 mb-4">
                                        <a href="{{route('sandbox.mail.simple')}}" class="btn btn-info waves-effect waves-light btn-sm">Send mail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-none border mb-1">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="my-0">
                                        <button class="btn btn-link collapsed ml-4 align-self-center shadow-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Mail with Job
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample-faq">
                                    <div class="card-body">

                                        <b><span>dispatch(new MailSendJob);<br></span></b><br>

                                        <b><span>This funcion will be inside 'MailSendJob' class</span><br></b>
                                        Route::get('/mail',function(){<br>
                                            <span class="ml-4">Mail::to('info@digizigs.com')->send(new TestMail);<br></span>
                                            <span class="ml-4">return 'Mail Sent successfully;<br></span>
                                        });

                                    </div>
                                    <div class="ml-4 mb-4">
                                        <a href="{{route('sandbox.mail.dispatch')}}" class="btn btn-info waves-effect waves-light btn-sm">Send mail</a>
                                    </div>
                                </div>
                            </div>

                        </div><!--end accordion-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->



            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mail sending function</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('sandbox.mail.dispatch.custom')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-lg-12  mo-b-15">
                                            <input class="form-control" type="email" id="name"name="to" placeholder="To">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input class="form-control" type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Your message" name='message'></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-info waves-effect waves-light btn-sm">Send Email</button>
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


        </div>

    </div>
@endsection



@section('scripts')

    {{-- Datatable JS --}}
    <script src="{{asset('public/admin/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/pages/jquery.datatable.init.js')}}"></script>
    {{-- Datatable JS --}}



    <script>

        $(function(){
            'use strict'


        });

    </script>

@endsection
