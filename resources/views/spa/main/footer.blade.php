	<div class="footer_top text-left ">
		<div class="inner_container">
			<div class="footer_link">
				<span class="foot_link">
					<a href="https://pages.razorpay.com/pl_EZevgmxc6xNczi/view">Donate</a>
				</span>
				<span class="link_divider">|</span>
				<span class="foot_link"><a href="{{route('spa.about.us')}}">About Us</a></span>
				<span class="link_divider">|</span><span class="foot_link"><a href="{{route('spa.contact')}}">Contact Us</a></span>
				<span class="link_divider">|</span><span class="foot_link"><a href="https://www.yesmadam.com/faqs">FAQs</a></span>
				<span class="link_divider">|</span><span class="foot_link"><a href="{{route('spa.privacy.policy')}}">Privacy Policy</a></span>
				<span class="link_divider">|</span><span class="foot_link"><a href="{{route('spa.terms.conditions')}}">Terms &amp; Conditions</a></span>
			</div>
		</div>
	</div>
	<footer class="footer-top-area pt-100 pb-70">
		<div class="container">
			<div class="row">
				<h2 class="text-white">Currently Available In</h2>
				<ul class="list-group list-group-horizontal-lg">
					@if($city->count())
					@foreach($city as $item)
					<li class="list-group-item">{{$item->name}}</li>
					@endforeach
					@endif
				</ul>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<a href="index.html">
							<img src="images/white-logo.png" alt="Image">
						</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat molestiae corporis, magni maxime perferendis ducimus totam officiis sit exercitationem sed odio debitis minus cumque dolores dicta. Vitae.</p>
						<ul class="social-icon">
							<li>
								<a href="#">
									<i class="bx bxl-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-pinterest-alt"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxl-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Services</h3>
						<ul>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Big Data
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									UI/UX Design
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Desktop Application
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Mobile Application
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Product Engineering
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Machine Learning
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Important Links</h3>
						<ul>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Search Engine
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Online Support
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Development
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Pay Per Click
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Support
								</a>
							</li>
							<li>
								<a href="#">
									<i class="right-icon bx bx-chevrons-right"></i>
									Application
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-widget">
						<h3>Information</h3>
						<ul class="information">
							<li class="address">
								<i class="flaticon-call"></i>
								<span>Phone</span>
								<a href="tel:+882-569-756">
									+882-569-756
								</a>
							</li>
							<li class="address">
								<i class="flaticon-envelope"></i>
								<span>Email</span>
								<a href="/cdn-cgi/l/email-protection#a9c1ccc5c5c6e9c8dbcddcc0d187cac6c4">
									<span class="__cf_email__" data-cfemail="a0c8c5cccccfe0c1d2c4d5c9d88ec3cfcd">[email&#160;protected]</span>
								</a>
							</li>
							<li class="address">
								<img src="{{imageBasePath('footer_image/location.png')}}">
								<span>Address</span>
								123, Western Road, Melbourne Australia
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-shape">
			<img src="images/shape/footer-shape-one.png" alt="Image">
			<img src="images/shape/footer-shape-two.png" alt="Image">
		</div>

	</footer>
	<!-- End Footer Top Area -->

	<!-- Start Footer Bottom Area -->
	<footer class="footer-bottom-area">

		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4">
					<div class="copy-right">
						<p>
							Copyright <i class="bx bx-copyright"></i> 2022
							<!-- <a href="https://envytheme.com/">EnvyTheme</a> -->
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="privacy">
						<ul>
							<li>
								<a href="terms-conditions.html">Terms & Conditions</a>
							</li>
							<li>
								<a href="privacy-policy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="designed">
						<p>Designed By <i class='bx bx-heart'></i> <a href="https://epiccorporations.com/" target="_blank">Epic Corporations</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Bottom Area -->
	<!-- End Footer Bottom Area -->

	<!-- Start Go Top Area -->
	<div class="go-top">
		<i class="bx bx-chevrons-up"></i>
		<i class="bx bx-chevrons-up bx-fade-up"></i>
	</div>