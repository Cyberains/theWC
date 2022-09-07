<!-- Start Arduix Navbar Area -->
<div id="header" class="arduix-nav-style">
	<div class="navbar-area">
		<!-- Menu For Mobile Device -->
		<div class="mobile-nav">
			<a href="index.html" class="logo">
				<img src="images/white-logo.png" alt="Logo">
			</a>
		</div>
		<!-- Menu For Desktop Device -->
		<div class="main-nav pt-0">
			<nav class="navbar navbar-expand-md navbar-light" style="background: #04063c;">
				<div class="container">
					<a class="navbar-brand" href="index.html">
						<img src="images/white-logo.png" alt="Logo">
					</a>
					<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
						<ul class="navbar-nav m-auto">
							<li class="nav-item">
								<a href="{{route('spa.home')}}" class="nav-link dropdown-toggle active">
									Home </a>

							</li>
							<li class="nav-item">
								<a href="{{route('spa.about.us')}}" class="nav-link dropdown-toggle">
									About
								</a>

							</li>
							<li class="nav-item">
								<a href="#" class="nav-link dropdown-toggle">
									Services
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
									</svg>
								</a>
								<ul class="dropdown-menu">
									<li class="nav-item">
										<a href="#" class="nav-link">Services</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link dropdown-toggle">
									Faq
								</a>

							</li>
							<li class="nav-item">
								<a href="#" class="nav-link dropdown-toggle">
									Blog
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('spa.contact')}}" class="nav-link dropdown-toggle">
									Contact
								</a>

							</li>

						</ul>
						<div class="others-option">
							<a class="default-btn" href="{{route('login')}}">
								Log In
								<i class="bx bx-log-in-circle"></i>
							</a>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- End Arduix Navbar Area -->
