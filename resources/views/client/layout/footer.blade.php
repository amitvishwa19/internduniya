<footer>
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
								<span>+1 1111-111-111</span>
								<span><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="345d5a525b745e5b565c415a401a575b59">[email&#160;protected]</a></span>
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
										<a href="{{route('app.privacy')}}" title="">Privacy & Seurty </a>
										<a href="{{route('app.terms')}}" title="">Terms of Serice</a>
										<!-- <a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	 -->
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Internships</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
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
			<span>© 2022 Internduniya All rights reserved. Design & Devloped by Devlomatix Solutions</span>
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