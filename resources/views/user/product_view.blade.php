@extends('user.layout.master')

@section('title')
<title>Home</title>
@endsection

@section('content')
@php

$selling_price = $productdata->productExpiryOnline->first()->productAttr->selling_price;
$mrp_price = $productdata->productExpiryOnline->first()->productAttr->mrp_price;
$membership_price = $productdata->productExpiryOnline->first()->productAttr->membership_price;

$skucode = $productdata->productExpiryOnline->first()->productAttr->barcode_id;
$weight = $productdata->productExpiryOnline->first()->productAttr->unit;

@endphp
<div class="ps-breadcrumb">
	<div class="ps-container">
		<ul class="breadcrumb">
			<li><a href="{{ route('user.home') }}">Home</a></li>
			<li><a href="#">Products</a></li>
			<li><a href="#">{{ $productdata->categoryName->title }}</a></li>
			<li>{{ $productdata->title }}</li>
		</ul>
	</div>
</div>
<div class="ps-page--product">
	<div class="ps-container">
		<div class="ps-page__container">
			<div class="ps-page__left">
				<div class="ps-product--detail ps-product--fullwidth">
					<div class="ps-product__header">
						<div class="ps-product__thumbnail" data-vertical="true">
							<figure>
								<div class="ps-wrapper">
									<div class="ps-product__gallery" data-arrow="true">
										@foreach ($productdata->productImage as $img)
											<div class="item">
												<a href="{{ asset('public/images/product/'.$img->image) }}">
													<img src="{{ asset('public/images/product/'.$img->image) }}" alt="{{ $productdata->title }}"/>
												</a>
											</div>
										@endforeach
									</div>
								</div>
							</figure>
							<div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
								@foreach ($productdata->productImage as $img)
								<div class="item">
									<img src="{{ asset('public/images/product/'.$img->image) }}" alt="{{ $productdata->title }}"/>
								</div>
								@endforeach
							</div>
						</div>
						<div class="ps-product__info">
							<h1>{{ $productdata->title }}</h1>
							<div class="ps-product__meta">
								@if ($productdata->brandName->title)

								<p>{{ __('Brand') }}: <a href="#">{{ $productdata->brandName->title }}</a></p>

								@endif
								
								@if (1)

								<div class="rating_wrap">
									<a href="#tab-reviews">
										<div class="rating">
											<div class="product_rate" {{--style="width: {{ get_average_star_of_product($productdata->id) * 20 }}%" --}}></div>
										</div>
										<span class="rating_num">({{-- $countRating --}}0 {{ __('reviews') }})</span>
									</a>
								</div>

								@endif

							</div>
							<h4 class="ps-product__price @if ($mrp_price !== $selling_price) sale @endif"><span><i class="fa fa-rupee"></i>{{ $selling_price }}</span> @if ($selling_price !== $mrp_price) <del><i class="fa fa-rupee"></i>{{ $mrp_price }} </del> @endif</h4>

							<div class="ps-product__desc">
								<div class="ps-list--dot">
									{{ $productdata->description }}
								</div>
							</div>

							<form class="add-to-cart-form" method="POST" action="{{ route('user.add_to_cart') }}">
								@csrf
								<div class="ps-product__shopping">
									<figure>
										<figcaption>{{ __('Quantity') }}</figcaption>
										<div class="form-group--number product__qty">
											<button class="up" type="button"><i class="icon-plus"></i></button>
											<button class="down" type="button"><i class="icon-minus"></i></button>
											<input class="form-control qty-input" type="text" name="quantity" value="1" placeholder="1" readonly>
										</div>
									</figure>
									<input type="hidden" name="id" class="hidden-product-id" value="{{ $productdata->id }}" />

									<button class="ps-btn ps-btn--black" type="submit">{{ __('Add to cart') }}</button>

									<button class="ps-btn" type="submit" name="checkout">{{ __('Buy Now') }}</button>

									<div class="ps-product__actions">
										<a class="js-add-to-wishlist-button" href="{{ route('user.add_wishlist',['id'=>$productdata->id]) }}"><i class="icon-heart"></i></a>

									</div>
								</div>
							</form>
							<div class="ps-product__specification">
								@if ($weight)
								<p><strong>{{ __('Weight') }}:</strong> <span id="product-weight">{{ $weight }}</span></p>
								@endif

								@if ($skucode)
								<p><strong>{{ __('SKU') }}:</strong> <span id="product-sku">{{ $skucode }}</span></p>
								@endif

								@if ($productdata->categoryName->count())
								<p class="categories"><strong> {{ __('Categories') }}:</strong>

									<a href="{{ route('user.category',['category_slug'=>\Illuminate\Support\Str::slug($productdata->categoryName->title,'-'),'id'=>Hashids::encode($productdata->categoryName->id)]) }}">{{ $productdata->categoryName->title }}</a>

								</p>
								@endif

								@if ($productdata->SubCategoryName->count())
								<p class="tags"><strong> {{ __('SubCategory') }}:</strong>

									<a href="{{ route('user.category',['category_slug'=>\Illuminate\Support\Str::slug($productdata->categoryName->title,'-'),'id'=>Hashids::encode($productdata->categoryName->id)]) }}">{{ $productdata->SubCategoryName->title }}</a>

								</p>
								@endif

								@if ($productdata->ManufacturerName->count())
								<p class="manufacturer"><strong> {{ __('Manufacturer') }}:</strong>

									<a href="javascript:void(0)">{{ $productdata->ManufacturerName->title }}</a>

								</p>
								@endif
							</div>
						</div>
					</div>
					<div class="ps-product__content ps-tab-root pt-5">
						<ul class="ps-tab-list">
							<li class="active"><a href="#tab-reviews">{{ __('Reviews') }} (0)</a></li>

						</ul>
						<div class="ps-tabs">

							<div class="ps-tab active" id="tab-reviews">
								<div class="row">
									<div class="col-lg-5">
										<div class="ps-block--average-rating">
											<div class="ps-block__header">
												<h3>5</h3>
												@if (1)
												<div class="rating_wrap">
													<div class="rating">
														<div class="product_rate" {{--style="width: {{ $reviews->avg('star') * 20 }}%" --}}></div>
													</div>
													<span class="rating_num">(200  {{ __('reviews') }})</span>
												</div>
												@endif
											</div>
											<div class="ps-block__star"><span>{{ __('5 Star') }}</span>
													{{-- @php
													$stars = $reviews->where('star', 5)->count();
													if ($stars > 0) {
														$stars = $stars / $countRating * 100;
													}
													@endphp --}}
													<div class="ps-progress" data-value="{{-- $stars --}}"><span></span></div><span>{{-- ((int) ($stars * 100)) / 100 --}}5%</span>
												</div>
												<div class="ps-block__star"><span>{{ __('4 Star') }}</span>
													{{-- @php
													$stars = $reviews->where('star', 4)->count();
													if ($stars > 0) {
														$stars = $stars / $countRating * 100;
													}
													@endphp --}}
													<div class="ps-progress" data-value="{{-- $stars --}}"><span></span></div><span>{{-- ((int) ($stars * 100)) / 100 --}}50%</span>
												</div>
												<div class="ps-block__star"><span>{{ __('3 Star') }}</span>
													{{-- @php
													$stars = $reviews->where('star', 3)->count();
													if ($stars > 0) {
														$stars = $stars / $countRating * 100;
													}
													@endphp --}}
													<div class="ps-progress" data-value="{{-- $stars --}}"><span></span></div><span>{{-- ((int) ($stars * 100)) / 100 --}}40%</span>
												</div>
												<div class="ps-block__star"><span>{{ __('2 Star') }}</span>
													{{-- @php
													$stars = $reviews->where('star', 2)->count();
													if ($stars > 0) {
														$stars = $stars / $countRating * 100;
													}
													@endphp --}}
													<div class="ps-progress" data-value="{{-- $stars --}}"><span></span></div><span>{{-- ((int) ($stars * 100)) / 100 --}}20%</span>
												</div>
												<div class="ps-block__star"><span>{{ __('1 Star') }}</span>
													{{-- @php
													$stars = $reviews->where('star', 1)->count();
													if ($stars > 0) {
														$stars = $stars / $countRating * 100;
													}
													@endphp --}}
													<div class="ps-progress" data-value="{{-- $stars --}}"><span></span></div><span>{{-- ((int) ($stars * 100)) / 100 --}}23%</span>
												</div>
											</div>
										</div>
										<div class="col-lg-7">
											<form route="" method="post" class="ps-form--review form-review-product" >
												<input type="hidden" name="product_id" value="{{ $productdata->id }}">
												<h4>{{ __('Submit Your Review') }}</h4>
												@if (!Auth::check())
												<p class="text-danger">{{ __('Please') }} <a href="{{ route('user.login') }}">{{ __('login') }}</a> {{ __('to write review!') }}</p>
												@endif
												<div class="form-group form-group__rating">
													<label for="review-star">{{ __('Your rating of this product') }}</label>
													<select name="star" class="ps-rating" data-read-only="false" id="review-star">
														<option value="0">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
												<div class="form-group">
													<textarea class="form-control" name="comment" id="txt-comment" rows="6" placeholder="{{ __('Write your review') }}" @if (!Auth::check()) disabled @endif></textarea>
												</div>

												<div class="form-group submit">
													<button class="ps-btn @if (!Auth::check()) btn-disabled @endif" type="submit" @if (!Auth::check()) disabled @endif>{{ __('Submit Review') }}</button>
												</div>
											</form>
										</div>
									</div>
									
									<div class="row">
										<div class="col-12">
											<div class="block--product-reviews">
												<div class="block__header">
													<h2>3 {{ __('reviews for ":product"', ['product' => $productdata->title]) }}</h2>
												</div>
												<div class="block__content" id="app">
													
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
				{{-- <div class="ps-page__right">
					<aside class="widget widget_product widget_features">
						<p><i class="{{ theme_option('product_feature_' . $i . '_icon') }}"></i> {{ theme_option('product_feature_' . $i . '_title') }}</p>
					</aside>
					@if (is_plugin_active('ads'))
					<aside class="widget">
						{!! AdsManager::display('product-sidebar') !!}
					</aside>
					@endif
				</div> --}}
			</div>
		</div>
	</div>

	@endsection