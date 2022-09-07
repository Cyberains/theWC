@if ($product)

    @php 
    $selling_price = $product->productExpiryOnline->first()->productAttr->selling_price;
    $mrp_price = $product->productExpiryOnline->first()->productAttr->mrp_price;
    $membership_price = $product->productExpiryOnline->first()->productAttr->membership_price;   
    @endphp

    <div class="ps-product__thumbnail">
        <a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($product->title,'-'),'id'=>Hashids::encode($product->id) ]) }}">
            <img src="{{ asset('public/images/product/'.@$product->productImage->first()->image) }}"  alt="#">
        </a>
        {{--@if ($product->front_sale_price !== $product->price)
            <div class="ps-product__badge">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
        @endif--}}

        <ul class="ps-product__actions">

            <li><a class="add-to-cart-button" data-id="{{ $product->id }}" href="{{ route('user.add_to_cart') }}" title="{{ __('Add To Cart') }}"><i class="icon-bag2"></i></a></li>
            
            <li><a href="{{ route('user.quick_view',['id'=>$product->id]) }}" title="{{ __('Quick View') }}" class="js-quick-view-button"><i class="icon-eye"></i></a></li>

            <li><a class="js-add-to-wishlist-button" href="{{  route('user.add_wishlist', 
            ['id'=> $product->id]) }}" title="{{ __('Add to Wishlist') }}"><i class="icon-heart"></i></a></li>

        </ul>
    </div>
    <div class="ps-product__container">
        <div class="ps-product__content"><a class="ps-product__title" href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($product->title,'-'),'id'=>Hashids::encode($product->id) ]) }}">{{ $product->title }}</a>
                @if (1)
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="{{--width: {{ get_average_star_of_product($product->id) * 20 }}% --}}"></div>
                        </div>
                        <span class="rating_num">(4.5)</span>
                    </div>
                @endif
            <p class="ps-product__price @if ($selling_price !== $mrp_price) sale @endif"><i class="fa fa-rupee"></i>{{ $selling_price }} @if ($selling_price !== $mrp_price) <del><i class="fa fa-rupee"></i>{{ $mrp_price }}</del> @endif</p>
        </div>
        <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($product->title,'-'),'id'=>Hashids::encode($product->id) ]) }}">{{ $product->title }}</a>
            @if (1)
                    <div class="rating_wrap">
                        <div class="rating">
                            <div class="product_rate" style="{{--width: {{ get_average_star_of_product($product->id) * 20 }}% --}}"></div>
                        </div>
                        <span class="rating_num">(4.5)</span>
                    </div>
                @endif
            <p class="ps-product__price @if ($selling_price !== $mrp_price) sale @endif"><i class="fa fa-rupee"></i>{{ $selling_price }} @if ($selling_price !== $mrp_price) <del><i class="fa fa-rupee"></i>{{ $mrp_price }} </del> @endif</p>
        </div>
    </div>
@endif
