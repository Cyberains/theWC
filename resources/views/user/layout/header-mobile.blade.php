<header class="header header--mobile" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p>hello Manoj</p>
        </div>
        
        <div class="header__right">
            <ul class="navigation__extra">
                <li><a href="">{{ __('Track your order') }}</a></li>
                <li>
                    <div class="ps-dropdown"><a href=""><span>India</span></a>
                        <ul class="ps-dropdown-menu">
                            
                                <li><a href="#"><span>USD</span></a></li>
                            
                        </ul>
                    </div>
                </li>                
            </ul>
        </div>
    
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{ url('/') }}"><img src="" alt=""></a></div>

        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini">
                    <a class="header__extra btn-shopping-cart" href="javascript:void(0)">
                        <i class="icon-bag2"></i><span><i>8</i></span>
                    </a>
                    <div class="ps-cart--mobile">
                       @include('user.layout.cart') 
                    </div>
                </div>
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><a href="#"><i class="icon-user"></i></a></div>
                </div>
            </div>
        </div>
        
    </div>   
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="" method="get">
            <div class="form-group--nest">
                <input class="form-control" name="q" value="" type="text" placeholder="{{ __('Search something...') }}">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    
</header>
