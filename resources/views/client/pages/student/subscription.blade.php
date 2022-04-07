@extends('client.pages.student.layout')



@section('main_content')

<div class="col-lg-10 column">
	<div class="padding-left">
		<div class="manage-jobs-sec addscroll">
			<h3>Subscription Plans</h3>
			

           	@if(!auth()->user()->subscribed)
				<section class="pl-5 pr-5">
					<div class="block">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									
									<div class="plans-sec">
										<div class="row">
										@foreach($student_plans as $plan)
											<div class="col-lg-4">
												<div class="pricetable {{$loop->iteration == 2 ? "active" : ""}}">
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
													<a href="javascript:void(0)" title="" data-plan="{{$plan->title}}" class="buy_button" data-amount="{{$plan->description}}">BUY NOW</a>
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
			@else
				<section class="m-2 job-single-sec" >
					<div class="job-overview">		
						<ul>
							<li><i class="fa fa-paper-plane"></i><h3>Subscription</h3><span>Active</span></li>
							<li><i class="la la-mars-double"></i><h3>Subscribed Plan</h3><span>{{auth()->user()->plan}}</span></li>
							<li><i class="fa fa-calendar"></i><h3>Subscription Date</h3><span>{{auth()->user()->subscription_date}}</span></li>
							<li><i class="fa fa-calendar"></i><h3>Renew Date</h3><span>{{auth()->user()->renew_date}}</span></li>
							<li><i class="fa fa-sort-numeric-asc"></i><h3>Impression Counts</h3><span>{{auth()->user()->action_count}}</span></li>
							<li><i class="fa fa-money"></i><h3>Payment</h3><span>{{auth()->user()->amount}}</span></li>
						</ul>
					</div>
				</section>

           	@endif
		</div>
	</div>
</div>


@endsection

@section('javascript')

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  	<script>
  		$(function(){
        'use strict'
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});


			$('.buy_button').on("click",function(e){
				var amnt = $(this).attr("data-amount")*100;
				var plan = $(this).attr("data-plan");

				var options = {
					"key":"{{env('RAZORPAY_KEY')}}",
					"amount": amnt,
					"name":"{{env('APP_NAME')}}",
					"description": "Internduniya Subscription payment",
					"image":  "{{setting('app_icon')}}",
					"handler": function (response){
						//console.log(response);

						$.ajax({
							type:'post',
							url:"{{ route('razorpay.subscription.payment.success') }}",
							data:{payment_id:response.razorpay_payment_id,amount:amnt,plan:plan},
							success:function(data){
								//console.log(data);
								location.reload();
							},
							error: function(data){
								console.log(data);
							}
						});

						
					},
					"prefill": {
						"contact": '9712340450',
						"email":   'amitvishwa@gmail.com',
					},
				
				};
				
				var rzp1 = new Razorpay(options);   
				rzp1.open();
				e.preventDefault();

				//alert(amnt);
			})



      });
  	</script>

@endsection