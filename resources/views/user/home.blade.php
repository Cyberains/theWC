@extends('user.layout.master')

@section('title')
<title>Home</title>
@endsection

@section('content')

<div class="ps-home-banner ps-home-banner--1">
    <div class="ps-container">
        <div class="ps-section__left">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn"data-owl-animate-out="fadeOut">
                
                <div class="ps-banner bg--cover" data-background="{{ asset('public/assets/img/user/banner1.jpg') }}">
                    
                    <a class="ps-banner__overlay" href="{{ asset('public/assets/img/user/banner1.jpg') }}"></a>
                  
                </div>

                <div class="ps-banner bg--cover" data-background="{{ asset('public/assets/img/user/banner2.jpg') }}">
                    
                    <a class="ps-banner__overlay" href="{{ asset('public/assets/img/user/banner2.jpg') }}"></a>
                  
                </div>

                <div class="ps-banner bg--cover" data-background="{{ asset('public/assets/img/user/banner3.jpg') }}">
                    
                    <a class="ps-banner__overlay" href="{{ asset('public/assets/img/user/banner3.jpg') }}"></a>
                  
                </div>
                
            </div>
        </div>
        <div class="ps-section__right">
            <div class="ps-collection">
                <a href="{{ asset('public/assets/img/user/top-ads-1.jpg') }}" target="_blank"><img src="{{ asset('public/assets/img/user/top-ads-1.jpg') }}" alt="Top Slider Image 1" style="max-width: 100%;"></a>
            </div>
            <div class="ps-collection">
                <a href="{{ asset('public/assets/img/user/top-ads-2.jpg') }}" target="_blank"><img src="{{ asset('public/assets/img/user/top-ads-2.jpg') }}" alt="Top Slider Image 2" style="max-width: 100%;"></a>
            </div>
        </div>
    </div>
</div>

<div>
	<div class="ps-site-features">
		<div class="ps-container">
			<div class="ps-block--site-features">
				<div class="ps-block__item">
					<div class="ps-block__left">
						<i class="icon-rocket"></i>
					</div> 
					<div class="ps-block__right">
						<h4>Free Delivery</h4> 
						<p>For all orders over $99</p>
					</div>
				</div> 
				<div class="ps-block__item">
					<div class="ps-block__left">
						<i class="icon-sync"></i>
					</div> 
					<div class="ps-block__right">
						<h4>90 Days Return</h4> 
						<p>If goods have problems</p>
					</div>
				</div> 
				<div class="ps-block__item">
					<div class="ps-block__left">
						<i class="icon-credit-card"></i>
					</div> 
					<div class="ps-block__right">
						<h4>Secure Payment</h4> 
						<p>100% secure payment</p>
					</div>
				</div> 
				<div class="ps-block__item">
					<div class="ps-block__left">
						<i class="icon-bubbles"></i>
					</div> 
					<div class="ps-block__right">
						<h4>24/7 Support</h4> 
						<p>Dedicated support</p>
					</div>
				</div> 
				<div class="ps-block__item">
					<div class="ps-block__left">
						<i class="icon-gift"></i>
					</div> 
					<div class="ps-block__right">
						<h4>Gift Service</h4> 
						<p>Support gift service</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="ps-top-categories pt-0">
	<div class="ps-container">
		<h3>Top Categories</h3> 
		<div class="row"><!---->
			@foreach($topcategory as $category) 
			<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
				<div class="ps-block--category">
					<a href="{{ route('user.category',['category_slug'=>\Illuminate\Support\Str::slug($category->title,'-'),'id'=>Hashids::encode($category->id)]) }}" class="ps-block__overlay"></a>
					<img src="{{ asset('public/images/category/'.$category->image) }}" height="150px" alt="{{ $category->title }}"> 
					<p>{{ $category->title }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

{{-- <div class="ps-top-categories pt-0">
	<div class="ps-container">
		<h3>Top Brand</h3> 
		<div class="row"><!---->
			@foreach($topbrand as $brand) 
			<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
				<div class="ps-block--category">
					<a href="{{ route('user.brand',['brand_slug'=>\Illuminate\Support\Str::slug($brand->title,'-'),'id'=>Hashids::encode($brand->id)]) }}" class="ps-block__overlay"></a>
					<img src="{{ asset('public/images/brand/'.$brand->image) }}" height="150px" alt="{{ $brand->title }}"> 
					<p>{{ $brand->title }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div> --}}

<div class="ps-home-ads mt-40 mb-40">
	<div class="ps-container">
		<div class="row">
			<div class="col-lg-4">
				<div class="ps-collection">
					<div>
						<a href="https://martfury.botble.com/ads-click/IZ6WU8KUALYD" target="_blank">
							<img src="https://martfury.botble.com/storage/promotion/3.jpg" alt="Homepage middle 1" style="max-width: 100%;">
						</a>
					</div>
				</div>
			</div> 
			<div class="col-lg-4">
				<div class="ps-collection">
					<div>
						<a href="https://martfury.botble.com/ads-click/ILSFJVYFGCPZ" target="_blank"><img src="https://martfury.botble.com/storage/promotion/4.jpg" alt="Homepage middle 2" style="max-width: 100%;"></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="ps-collection">
					<div>
						<a href="https://martfury.botble.com/ads-click/ZDOZUZZIU7FT" target="_blank">
							<img src="https://martfury.botble.com/storage/promotion/5.jpg" alt="Homepage middle 3" style="max-width: 100%;">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="ps-download-app">
	<div class="ps-container">
		<div class="ps-block--download-app">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
						<div class="ps-block__thumbnail">
							<img src="https://martfury.botble.com/storage/general/app.png" alt="screenshot">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
						<div class="ps-block__content">
							<h3>Download Earlybasket App Now!</h3> 
							<p>Shopping fastly and easily more with our app. Get a link to download the app on your phone.</p>
							<form action="https://martfury.botble.com/ajax/send-download-app-links" method="post" class="ps-form--download-app">
								<input type="hidden" name="_token" value="h2ZklCDEkTg1EoswBOG6tj6KxBfyIOy4OaYdWULq">
								<div class="form-group--nest">
									<input type="email" name="email" placeholder="Email Address" class="form-control">
									<button type="submit" class="ps-btn">Subscribe</button>
								</div>
							</form>
							<p class="download-link">
								<a href="https://www.appstore.com">
									<img src="https://martfury.botble.com/themes/martfury/img/google-play.png" alt="Google Play">
								</a>
								<a href="https://play.google.com/store">
									<img src="https://martfury.botble.com/themes/martfury/img/app-store.png" alt="App Store">
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection