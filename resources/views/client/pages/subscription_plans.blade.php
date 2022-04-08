@extends('client.layout.layout')

@section('title','Pricing')


@section('style')
@endsection


@section('content')


<!-- <section style="margin-top:100px">
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Pricing (Student)</h3>
                            <span>Keep up to date with the latest news</span>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<!-- Student Plans -->
<section style="margin-top:100px">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Plans for Students</h2>
                        <!-- <span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span> -->
                    </div><!-- Heading -->
                    <div class="plans-sec">
                        <div class="row">
                        @foreach($student_plans as $plan)
                            <div class="col-lg-4">
                                <div class="pricetable {{$loop->iteration == 2 ? "active" : ""}}" >
                                    <div class="pricetable-head">
                                        <h3>{{$plan->title}}</h3>
                                        <h2><i><i class="fa fa-inr" aria-hidden="true"></i></i>{{$plan->description}}</h2>
                                        <!-- <span>15 Days</span> -->
                                    </div><!-- Price Table -->
                                    <ul>
                                        @foreach($plan->tags as $tag)
                                        <li>{{$tag->name}}</li>
                                        @endforeach
                                    </ul>
                                    <a href="{{route('student.subscription')}}" >BUY NOW</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Student Plans -->


<!-- Corporate Plans -->
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Plans for Corporates</h2>
                        <!-- <span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span> -->
                    </div><!-- Heading -->
                    <div class="plans-sec">
                        <div class="row">

                        @foreach($corporate_plans as $plan)
                            <div class="col-lg-4">
                                <div class="pricetable {{$loop->iteration == 2 ? "active" : ""}}" >
                                    <div class="pricetable-head">
                                        <h3>{{$plan->title}}</h3>
                                        <h2><i><i class="fa fa-inr" aria-hidden="true"></i></i>{{$plan->description}}</h2>
                                        <!-- <span>15 Days</span> -->
                                    </div><!-- Price Table -->
                                    <ul>
                                        @foreach($plan->tags as $tag)
                                        <li>{{$tag->name}}</li>
                                        @endforeach
                                    </ul>
                                    <a href="{{route('company.subscription')}}" >BUY NOW</a>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Student Plans -->


@endsection



@section('modal')
@endsection



