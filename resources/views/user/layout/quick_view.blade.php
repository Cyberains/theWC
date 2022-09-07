@php

$selling_price = $productdata->productExpiryOnline->first()->productAttr->selling_price;
$mrp_price = $productdata->productExpiryOnline->first()->productAttr->mrp_price;
$membership_price = $productdata->productExpiryOnline->first()->productAttr->membership_price;

$skucode = $productdata->productExpiryOnline->first()->productAttr->barcode_id;
$weight = $productdata->productExpiryOnline->first()->productAttr->unit;

@endphp

<div class="ps-product__header">
	<div class="ps-product__thumbnail" data-vertical="false">
		<div class="ps-product__images" data-arrow="true">
			@foreach ($productdata->productImage as $img)
			<div class="item"><img src="{{ asset('public/images/product/'.$img->image) }}" alt="{{ $productdata->title }}"></div>
			@endforeach
		</div>
	</div>
	<div class="ps-product__info">
		<h1><a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($productdata->title,'-'),'id'=>Hashids::encode($productdata->id) ]) }}">{{ $productdata->title }}</a></h1>
		<div class="ps-product__meta">
			<p>{{ __('Brand') }}: <a href="#">{{ $productdata->brandName->title }}</a></p>
			
			
			{{--@php $countRating = get_count_reviewed_of_product($product->id) @endphp--}}
			@if (1)
			<div class="rating_wrap">
				<div class="rating">
					<div class="product_rate" style="{{--width: {{ get_average_star_of_product($product->id) * 20 }}% --}}"></div>
				</div>
				<span class="rating_num">({{-- $countRating --}} {{ __('reviews') }})</span>
			</div>
			@endif
		</div>
		<h4 class="ps-product__price @if ($mrp_price !== $selling_price) sale @endif"><span><i class="fa fa-rupee"></i>{{ $selling_price }}</span> @if ($selling_price !== $mrp_price) <del><i class="fa fa-rupee"></i>{{ $mrp_price }} </del> @endif</h4>
		<div class="ps-product__desc">
			<div class="ps-list--dot">
				{{ $productdata->description }}
			</div>
		</div>
		{{--@if ($product->variations()->count() > 0)
		
		<div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
		@endif--}}
		<form class="add-to-cart-form" method="POST" action="{{ route('user.add_to_cart') }}">
			@csrf
			<div class="ps-product__shopping">
				
				<button class="ps-btn ps-btn--black" type="submit">{{ __('Add to cart') }}</button>

				<button class="ps-btn" type="submit" name="checkout">{{ __('Buy Now') }}</button>

				<input type="hidden" name="id" class="hidden-product-id" value="{{ $productdata->id }}" />


				<div class="ps-product__actions">
					<a class="js-add-to-wishlist-button" href="{{ route('user.add_wishlist',['id'=>$productdata->id]) }}"><i class="icon-heart"></i></a>

				</div>
			</div>
		</form>

	</div>
</div>
	