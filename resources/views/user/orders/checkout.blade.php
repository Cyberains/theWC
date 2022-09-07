@extends('user.layout.master')

@section('title')
<title>Home</title>

@endsection

@section('content')
    
    <link rel="stylesheet" href="{{ asset('public/assets/css/user/card.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/user/payment.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/user/front-theme.css') }}">
    
    <div class="container mt-40">
        @if ($cart->count() > 0)
        <form method="post" action="{{  route('user.checkout.process') }}">
        @csrf
        <input type="hidden" name="checkout-token" id="checkout-token" value="#">
        
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12 left">
                <div class="checkout-logo">
                    <a href="{{ url('/') }}" title="checkout">
                        <h2>Checkout</h2>
                        {{-- <img src="{{ asset('public/assets/img/user/logo.jpg') }}" class="img-fluid" width="150" alt="checkout" /> --}}
                    </a>
                </div>
                <hr/>
                

                <!-- for mobile device display -->
                <div class="d-sm-block d-md-none" style="padding: 0 15px;" id="main-checkout-product-info-mobile">
                    <div class="payment-info-loading" style="display: none;">
                        <div class="payment-info-loading-content">
                            <i class="fas fa-spinner fa-spin"></i>
                        </div>
                    </div>
                    <div id="cart-item">
                        @if ($cart)
                            <p>{{ __('Product(s)') }}:</p>
                            @foreach($cart as $cartItem)
                                @if(!empty($cartItem))
                                    <div class="row cart-item">
                                        <div class="col-3">
                                            <div class="checkout-product-img-wrapper">
                                                <img class="item-thumb img-thumbnail img-rounded" src="" alt="">
                                                <span class="checkout-quantity"></span>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <p style="margin-bottom: 0;">{{ $cartItem->productName->title }}</p>
                                            <p style="margin-bottom: 0">
                                                
                                                @if (1)
                                                    <small>
                                                        manoj kumar
                                                    </small>
                                                @endif
                                            </p>

                                        </div>
                                        <div class="col-4 float-right">
                                            <p>{{ $cartItem->productAttr->selling_price }}</p>
                                        </div>
                                    </div> <!--  /item -->
                                @endif
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-6">
                                <p>{{ __('Subtotal') }}:</p>
                            </div>
                            <div class="col-6">
                                <p class="price-text sub-total-text text-right"> {{ $cart->sum('total_price') }} </p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <p>{{ __('Tax') }}:</p>
                            </div>
                            <div class="col-6 float-right">
                                <p class="price-text tax-price-text">{{ $cart->sum('total_tax') }}</p>
                            </div>
                        </div>
                        
                        <hr/>
                        <div class="row">
                            <div class="col-6">
                                <p>{{ __('Total') }}:</p>
                            </div>
                            <div class="col-6 float-right">
                                <p class="total-text raw-total-text"
                                   data-price="{{ $cart->sum('total_price')+$cart->sum('total_tax') }}"> {{ $cart->sum('total_price')+$cart->sum('total_tax') }} </p>
                            </div>
                        </div>

                    </div>

                    <div>
                        <hr />
                            @include('user.orders.discount-form')
                        <hr />
                    </div>
                </div> <!-- /mobile display -->

                <div class="form-checkout">
                    <form action="" method="post">
                        @csrf

                        <div>
                            <h3 class="checkout-payment-title">{{ __('Shipping information') }}</h3>
                            <input type="hidden" value="" id="save-shipping-information-url">
                                @include('user.orders.address-form')
                        </div>
                        
                        <br>

                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                            <label for="description" class="control-label">{{ __('Note') }}</label>
                            <br>
                            <textarea name="description" id="description" rows="3" class="form-control" placeholder="{{ __('Note') }}..."></textarea>
                            
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 d-none d-md-block" style="line-height: 53px">
                                    <a class="text-info" href="{{ route('user.cart') }}"><i class="fa fa-arrow-left"></i> {{ __('Back to cart') }}</a>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 40px">
                                    <button type="submit" class="btn payment-checkout-btn payment-checkout-btn-step float-right" data-processing-text="{{ __('Processing. Please wait...') }}" data-error-header="{{ __('Error') }}">
                                        {{ __('Checkout') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div> <!-- /form checkout -->

            </div>
            <!---------------------- start right column ---------------- -->
            <div class="col-lg-5 col-md-6 d-none d-md-block right"  id="main-checkout-product-info">
                <div class="payment-info-loading" style="display: none;">
                    <div class="payment-info-loading-content">
                        <i class="fas fa-spinner fa-spin"></i>
                    </div>
                </div>
                @if (1)
                    @foreach($cart as $key => $cartItem)
                
                        @if(!empty($cartItem->productName))
                            <div class="row product-item">
                                <div class="col-lg-2 col-md-2">
                                    <div class="checkout-product-img-wrapper">
                                        <img class="item-thumb img-thumbnail img-rounded" src="#" alt="{{ $cartItem->productName->title ?? '' }}">
                                        <span class="checkout-quantity">{{ $cartItem->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5">
                                    <p style="margin-bottom: 0;">{{ $cartItem->productName->title }}</p>
                                    <p style="margin-bottom: 0">
                                        <small>
                                            Weight:{{ $cartItem->productAttr->unit }}
                                        </small>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4 float-right">
                                    <p class="price-text">
                                        <span>{{ number_format($cartItem->productAttr->selling_price) }}</span>
                                    </p>
                                </div>
                            </div> <!--  /item -->
                        @endif
                    @endforeach
                @endif
                <hr />
                @include('user.orders.discount-form')
                <hr/>
                <div class="row price">
                    <div class="col-lg-7 col-md-8 col-5">
                        <p>{{ __('Subtotal') }}:</p>
                    </div>
                    <div class="col-lg-5 col-md-4 col-5">
                        <p class="price-text sub-total-text"> {{ $cartItem->sum('total_price') }} </p>
                    </div>
                </div>
                <div class="row shipment">
                    <div class="col-lg-7 col-md-8 col-5">
                        <p>{{ __('Tax') }}:</p>
                    </div>
                    <div class="col-lg-5 col-md-4 col-5 float-right">
                        <p class="price-text tax-price-text"> {{ $cartItem->sum('total_tax') }} </p>
                    </div>
                </div>
                
                <hr/>
                <div class="row total-price">
                    <div class="col-lg-7 col-md-8 col-5">
                        <p>{{ __('Total') }}:</p>
                    </div>
                    <div class="col-lg-5 col-md-4 col-5 float-right">
                        <p class="total-text raw-total-text"
                           data-price="{{ $cartItem->sum('total_price') }}"> {{ $cartItem->sum('total_tax')+$cartItem->sum('total_price') }} </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (1)
                        <div class="checkout-logo">
                            <a href="{{ url('/') }}" title="{{ 'Earlybasket' }}">
                                <img src="" class="img-fluid" width="150" alt="{{ 'Earlybasket' }}" />
                            </a>
                        </div>
                        <hr/>
                    @endif
                    <div class="alert alert-warning" style="margin: 50px auto;">
                        <span>{!! __('No products in cart') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
	
@endsection