<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @yield('title')
        @include('user.layout.header')
        
    </head>
    <body>
        <div id="alert-container"></div>

        <?php 

        $categorydata = App\Models\Category::with('subCategoryName')->get();

        ?>

        <header class="header header--1" data-sticky="true">
            <div class="header__top">
                <div class="ps-container">
                    <div class="header__left">
                        <div class="menu--product-categories">
                            <div class="menu__toggle"><i class="icon-menu"></i><span>Shop By Department</span></div>
                            <div class="menu__content" style="display: none">
                                <ul class="menu--dropdown">
                                    @foreach($categorydata as $category)
                                    <li class="menu-item-has-children has-mega-menu">
                                        <a href="{{ route('user.category',['category_slug'=>\Illuminate\Support\Str::slug($category->title,'-'),'id'=>encrypt($category->id)]) }}">{{ $category->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a class="ps-logo" href="{{ url('/') }}"><h2 class="text-light">EarlyBasket</h2>{{-- <img src="{{ asset('public/assets/img/user/logo1.jpg') }}" alt="" height="60"> --}}</a>
                    </div>

                    <div class="header__center">
                        <form class="ps-form--quick-search" action="#" method="get">
                            <div class="form-group--icon">
                                <div class="product-cat-label">{{ __('All') }}</div>
                                <select class="form-control product-category-select" name="categories[]">
                                    <option value="0">{{ __('All') }}</option>
                                    
                                    @foreach($categorydata as $category)
                                    <option class="level-0" value="{{ $category->id }}" >{{ $category->title }}</option>
                                    @endforeach
                                        
                                    
                                </select>
                            </div>
                            <input class="form-control" name="q" type="text" placeholder="I'm shopping for.." id="input-search">
                            <div class="spinner-icon">
                                <i class="fa fa-spin fa-spinner"></i>
                            </div>
                            <button type="submit">{{ __('Search') }}</button>
                            <div class="ps-panel--search-result"></div>
                        </form>
                    </div>
                    <div class="header__right">
                        <div class="header__actions">
                            
                            <a class="header__extra btn-wishlist" href="#"><i class="icon-heart"></i><span><i>3</i></span></a>
                            
                            <div class="ps-cart--mini">
                
                                <a class="header__extra btn-shopping-cart" href="#"><i class="icon-bag2"></i><span><i>

                                    @if(Auth::check())

                                        @if (session()->has('session_id')) 

                                            {{ $count = App\Models\Cart::where('user_id',Auth::user()->id)->orWhere('session_id',session()->get('session_id'))->sum('quantity') }}

                                        @else

                                            {{ $count = App\Models\Cart::where('user_id',Auth::user()->id)->sum('quantity') }}

                                        @endif

                                    @else

                                        {{ $count = App\Models\Cart::where('session_id',Session::getId())->sum('quantity') }}


                                    @endif

                                    </i></span></a>
                                    @php

                                        if(Auth::check()){

                                            if (session()->has('session_id')) {
                
                                                $session_id = Session::get('session_id');
                                                $cart = App\Models\Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->orWhere('session_id',$session_id)->get();
                                            }
                                            else{

                                                $cart = App\Models\Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->get();
                                            }

                                        }
                                        else{

                                            $cart = App\Models\Cart::with(['productName','productAttr','productExpiryName'])->where('session_id',Session::getId())->get();

                                        }
                                    

                                    @endphp

                
                            
                                <div class="ps-cart--mobile">
                                    @include('user.layout.cart')
                                </div>
                            </div>
                                                        
                            <div class="ps-block--user-header">
                                <div class="ps-block__left"><i class="icon-user"></i></div>
                                <div class="ps-block__right">
                                    @if (Auth::check())
                                        <a href="{{ route('user.overview') }}">{{ Auth::user()->name }}</a>
                                        <form method="post" action="{{ route('user.logout') }}" id="form1">
                                        @csrf
                                            <a href="javascript:void(0)" onclick="document.getElementById('form1').submit()">{{ __('Logout') }}</a>
                                        </form>
                                    @else
                                        <a href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                        <a href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <nav class="navigation">
                <div class="ps-container">
                    <div class="navigation__left">
                        <div class="menu--product-categories">
                            <div class="menu__toggle"><i class="icon-menu"></i><span>Shop by Department</span></div>
                            <div class="menu__content">
                                <ul class="menu--dropdown">
                                    @include('user.layout.product-categories-dropdown')
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="navigation__right">
                        <ul class="menu">
                            <li class="  ">
                                <a href="{{ route('user.home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="  ">
                                <a href="{{ route('user.about_us') }}">
                                    About us
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    Pages
                                </a>
                                <span class="sub-toggle"></span>
                                <ul class="sub-menu">
                                    <li class="  ">
                                        <a href="{{ route('user.terms_of_use') }}">
                                            Terms of Use
                                        </a>
                                    </li>
                                    <li class="  ">
                                        <a href="#">
                                            Terms &amp; Conditions
                                        </a>
                                    </li>
                                    <li class="  ">
                                        <a href="{{ route('user.refund_policy') }}">
                                            Refund Policy
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="  ">
                                <a href="#">
                                    Products
                                </a>
                            </li>
                            
                            <li class="  ">
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <ul class="navigation__extra">
                            <li><a href="#">{{ __('Track your order') }}</a></li>
                        
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </header>

           
        @include('user.layout.header-mobile')
        

        <div id="homepage-1">
            <div id="app">
                @yield('content')
            </div>
        </div>
            
        
        
        <div class="ps-panel--sidebar" id="cart-mobile" style="display: none">
            <div class="ps-panel__header">
                <h3>Shopping Cart</h3>
            </div>
            <div class="navigation__content">
                <div class="ps-cart--mobile">
                   @include('user.layout.cart')
                </div>
            </div>
        </div>
        <div class="ps-panel--sidebar" id="navigation-mobile" style="display: none">
            <div class="ps-panel__header">
                <h3>Categories</h3>
            </div>
            <div class="ps-panel__content">
                <ul class="menu--mobile">
                    @include('user.layout.product-categories-dropdown')
                </ul>
            </div>
        </div>
        
        <div class="navigation--list">
            <div class="navigation__content">
                <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> {{ __('Menu') }}</span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> {{ __('Categories') }}</span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> {{ __('Search') }}</span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> {{ __('Cart') }}</span></a></div>
        </div>
        
        <div class="ps-panel--sidebar" id="search-sidebar" style="display: none">
            <div class="ps-panel__header">
                <form class="ps-form--search-mobile" action="#" method="get">
                    <div class="form-group--nest">
                        <input class="form-control" name="q" value="{{ request()->query('q') }}" type="text" placeholder="{{ __('Search something...') }}">
                        <button type="submit"><i class="icon-magnifier"></i></button>
                    </div>
                </form>
            </div>
            <div class="navigation__content"></div>
        </div>
        
        <div class="ps-panel--sidebar" id="menu-mobile" style="display: none">
            <div class="ps-panel__header">
                <h3>{{ __('Menu') }}</h3>
            </div>
            <div class="ps-panel__content">
                <ul>                   
                    <li class="menu-item-has-children current-menu-item ">
                        <a href="#">Menu1</a>
                    </li>
                    <li class="menu-item-has-children current-menu-item ">
                        <a href="#">Menu2</a>
                    </li>                   
                </ul>
            </div>
        </div>

 
    @include('user.layout.footer')

    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="ps-site-overlay"></div>
    
     
    @yield('modal')    
    @include('user.layout.script')
    @yield('script')

    <script type="text/javascript">
        

    </script>
    
    </body>
</html>
