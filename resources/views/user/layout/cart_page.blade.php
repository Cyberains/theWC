<div class="container">
	<div class="ps-section__header">
		<h1>{{ __('Shopping Cart') }}</h1>
	</div>
	<div class="ps-section__content">
		<form class="form--shopping-cart" method="post" action="{{ route('user.cart.update') 
			}}" onsubmit="return false">
			@csrf
			@if ($cart->count() >0)
			<div class="table-responsive">
				<table class="table ps-table--shopping-cart">
					<thead>
						<tr>
							<th>{{ __("Product's name") }}</th>
							<th>{{ __('Price') }}</th>
							<th>{{ __('Quantity') }}</th>
							<th>{{ __('Total') }}</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($cart as $key => $cartItem)

						<tr>
							<td>
								<input type="hidden" name="items[{{ $key }}][rowId]" value="{{ $cartItem->id }}">
								<div class="ps-product--cart">
									<div class="ps-product__thumbnail">
										<a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($cartItem->productName->title,'-'),'id'=>Hashids::encode($cartItem->product_id) ]) }}">
											<img src="{{ asset('public/images/product/'.@$cartItem->productName->productImage->first()->image) }}" alt="" />
										</a>
									</div>
									<div class="ps-product__content"><a href="{{ route('user.product_view',['product_slug'=>\Illuminate\Support\Str::slug($cartItem->productName->title,'-'),'id'=>Hashids::encode($cartItem->product_id) ]) }}">{{ $cartItem->productName->title }}</a>
										<p class="mb-0"><small><small>Weight: {{ $cartItem->productAttr->unit }}</small></small></p>
										
									</div>
								</div>
							</td>
							<td class="price">{{  $cartItem->productAttr->selling_price  }}</td>
							<td>
								<div class="form-group--number product__qty">
									<button class="up">+</button>
									<button class="down">-</button>
									<input type="text" class="form-control qty-input" value="{{ $cartItem->quantity }}" title="{{ __('Qty') }}" data-id="{{ $cartItem->id }}" data-url="{{ route('user.cart_qty') }}" name="items[{{ $key }}][values][qty]" readonly>
								</div>
							</td>
							<td>{{ number_format($cartItem->productAttr->selling_price * $cartItem->quantity,2) }}</td>
							<td><a href="{{ route('user.remove_cart_button',['id'=>$cartItem->id]) }}" class="remove-cart-button"><i class="icon-cross"></i></a></td>
						</tr>
						
						@endforeach
						
					</tbody>
				</table>
			</div>
			@else
			<p class="text-center">{{ __('Your cart is empty!') }}</p>
			@endif

		</form>
	</div>
	@if ($cart->count() >0)
	<div class="ps-section__footer">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 ">
				<div class="ps-block--shopping-total">
					<div class="ps-block__header">
						<p>{{ __('Subtotal') }} <span><i class="fa fa-rupee"></i> {{ number_format($cart->sum('total_price'),2) }}</span></p>
					</div>
					
					<div class="ps-block__header">
						<p>{{ __('Tax') }} <span><i class="fa fa-rupee"></i>{{ number_format($cart->sum('total_tax'),2)  }}</span></p>
					</div>
					
					
					<div class="ps-block__content">
						<h3>{{ __('Total') }} <span><i class="fa fa-rupee"></i>{{ number_format($cart->sum('total_tax')+$cart->sum('total_price'),2) }}</span></h3>
						<p><small>({{ __('Shipping fees not included') }})</small></p>
					</div> 
				</div>

				<a class="ps-btn d-inline-block float-right" href="{{ route('user.checkout') }}">{{ __('Proceed to checkout') }}</a>

				<a class="ps-btn d-inline-block float-left" href="{{ route('user.home') }}">
					<i class="icon-arrow-left"></i> {{ __('Back to Shop') }}
				</a>
			</div>
		</div>
	</div>
	@endif
</div>