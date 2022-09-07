@extends("spa.main.master")

@section('content')
<div class="page-title-area">
	<div class="container">
		<div class="page-title-content">
			<h2>About Us</h2>
			<ul>
				<li>
					<a href="index.php">
						Home
					</a>
				</li>
				<li>About</li>

			</ul>
		</div>
	</div>
</div>

<section class="about-area ptb-100">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-img">
					<img src="images/spa-img/spa-about.png" alt="Image" style="border-radius: 35px;box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-content">
					<span>About Us</span>
					<h2>We Complete Every Project With Extra Care As Customer Need</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel.</p>
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<ul>
								<li>
									<i class="flaticon-checked"></i>
									Advanced caching
								</li>
								<li>
									<i class="flaticon-checked"></i>
									Unlimited applications
								</li>
								<li>
									<i class="flaticon-checked"></i>
									PHP 7 Ready transfer
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-sm-6">
							<ul>
								<li>
									<i class="flaticon-checked"></i>
									PHP ready serves
								</li>
								<li>
									<i class="flaticon-checked"></i>
									24/7 Free extra support
								</li>
								<li>
									<i class="flaticon-checked"></i>
									Optimized stack
								</li>
							</ul>
						</div>
					</div>

				</div>

			</div>
		</div>
		<h2>{{$about_us->heading}} </h2>
		<p> {!!$about_us->description!!} </p>

	</div>
</section>
@endsection