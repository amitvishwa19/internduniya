@extends('client.layout.layout')

@section('title','News')


@section('style')
@endsection


@section('content')


<section style="margin-top:100px">
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Pricing (Corporate)</h3>
                            <span>Keep up to date with the latest news</span>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Buy Our Plans And Packeges</h2>
                        <span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
                    </div><!-- Heading -->
                    <div class="plans-sec">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="pricetable">
                                    <div class="pricetable-head">
                                        <h3>Basic Jobs</h3>
                                        <h2><i><i class="fa fa-inr" aria-hidden="true"></i></i>10</h2>
                                        <span>15 Days</span>
                                    </div><!-- Price Table -->
                                    <ul>
                                        <li>1 job posting</li>
                                        <li>0 featured job</li>
                                        <li>Job displayed for 20 days</li>
                                        <li>Premium Support 24/7</li>
                                    </ul>
                                    <!-- <a href="javascript:void(0)" title="" id="plan_1" class="buy_button" data-amount="200">BUY NOW</a> -->
                                    <div>
                                        <form action="{{route('razorpay.subscription.payment')}}" method="post" style="margin: 0 auto">
                                            @csrf
                                            <button class="buyForm buybtn">Buy Now</button>
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="{{ env('RAZORPAY_KEY') }}"
                                                    data-amount="1000"
                                                    data-buttontext="Pay 10 INR"
                                                    data-name="InternDuniya"
                                                    data-description="Rozerpay"
                                                    data-image="https://internduniya.com/public//storage/uploads/images/1648727497_internduniya_3.png"
                                                    data-prefill.name="name"
                                                    data-prefill.email="email"
                                                    data-theme.color="#37254">
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pricetable active">
                                    <div class="pricetable-head">
                                        <h3>Standard Jobs</h3>
                                        <h2><i class="fa fa-inr" aria-hidden="true"></i>45</h2>
                                        <span>20 Days</span>
                                    </div><!-- Price Table -->
                                    <ul>
                                        <li>11 job posting</li>
                                        <li>12 featured job</li>
                                        <li>Job displayed for 30 days</li>
                                        <li>Premium Support 24/7</li>
                                    </ul>
                                    <div>
                                        <form action="" style="margin: 0 auto">
                                            <button class="buyForm buybtn dark">Buy Now</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pricetable">
                                    <div class="pricetable-head">
                                        <h3>Golden Jobs</h3>
                                        <h2><i class="fa fa-inr" aria-hidden="true"></i>80</h2>
                                        <span>2 Month</span>
                                    </div><!-- Price Table -->
                                    <ul>
                                        <li>44 job posting</li>
                                        <li>56 featured job</li>
                                        <li>Job displayed for 80 days</li>
                                        <li>Premium Support 24/7</li>
                                    </ul>
                                    <div>
                                        <form action="" style="margin: 0 auto">
                                            <button class="buyForm buybtn ">Buy Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection



@section('modal')
@endsection


@section('javascript')


  	<script>
  		$(function(){
         'use strict'

        $('.buy_button').on("click",function(){
            //var usersid =  $(this).data("id");
            //var username = $(this).data("username");

            alert($(this).data("amount"));
        })



      });
  	</script>

@endsection
