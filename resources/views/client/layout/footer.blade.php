<footer class="">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 column">
						<div class="widget">
							<div class="about_widget">
								<!-- <div class="logo">
									<a href="index.html" title=""><img src="{{setting('app_icon')}}" alt="" /></a>
								</div> -->
								<span>CoHarni Road, Vadodara 390022, India.</span>
								<span>+91 6353782788</span>
								<span>info@internduniya.com</span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<!-- <h3 class="footer-title">Frequently Asked Questions</h3> -->
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="{{route('app.privacy')}}" title="">Privacy Policy </a>
										<a href="{{route('app.terms')}}" title="">Terms & Condition</a>
										<!-- <a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	 -->
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="{{asset('public/client/images/resource/dw1.png')}}" alt="" /></a>
								<a href="#" title=""><img src="{{asset('public/client/images/resource/dw2.png')}}" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2022 <b>Internduniya</b> All rights reserved</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

@include('client.partials.auth')

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('public/client/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/script.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('public/client/js/select-chosen.js')}}" type="text/javascript"></script>

@yield('javascript')

</body>


</html>