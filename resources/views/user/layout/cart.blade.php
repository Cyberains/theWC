<div class="ps-cart__content">
    @if (count($cart)>0)

        <div class="ps-cart__items">
            <div class="ps-cart__items__body">
        
                @foreach($cart as $key=>$item) 
                
                <div class="ps-product--cart-mobile">
                    <div class="ps-product__thumbnail">
                        <a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($item->productName->title,'-'),'id'=>Hashids::encode($item->product_id) ]) }}"><img src="{{ asset('public/images/product/'.@$item->productName->productImage->first()->image) }}" alt="" /></a>
                    </div>
                    <div class="ps-product__content">
                        <a class="ps-product__remove remove-cart-item" href="{{ route('user.remove_cart_item',['id'=>$item->id]) }}"><i class="icon-cross"></i></a>
                        <a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($item->productName->title,'-'),'id'=>Hashids::encode($item->product_id) ]) }}">{{  $item->productName->title }}</a>
                        <p class="mb-0"><small>{{ $item->quantity }} x <i class="fa fa-rupee"></i>{{ $item->productAttr->selling_price }}</small></p>
                        <p class="mb-0"><small><small>Weight: {{ $item->productAttr->unit }}</small></small></p>
                        {{--<p class="mb-0"><small>{{ $option['key'] }}: <strong> {{ $option['value'] }}</strong></small></p>--}}
                                
                    </div>
                </div>
                 @endforeach     
               
            </div>
        </div>

        <div class="ps-cart__footer">
            
                <h5>{{ __('Sub Total') }}:<strong><i class="fa fa-rupee"></i>{{ $cart->sum('total_price') }}</strong></h5>
                <h5>{{ __('Tax') }}:<strong><i class="fa fa-rupee"></i>{{ $cart->sum('total_tax') }}</strong></h5>
                <h3>{{ __('Total') }}:<strong><i class="fa fa-rupee"></i>{{ $cart->sum('total_price')+$cart->sum('total_tax') }}</strong></h3>
            
            <figure>
                <a class="ps-btn" href="{{ route('user.cart') }}">{{ __('View Cart') }}</a>                
                <a href="{{ route('user.checkout') }}" class="ps-btn">{{ __('Checkout') }}</a>
            </figure>
        </div>

    @else
        <div class="ps-cart__items ps-cart_no_items">
            <span class="cart-empty-message">{{ __('No products in the cart.') }}</span>
        </div>
    @endif
</div>
