<!-- <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show main-sidebar sidebar-light-pink elevation-4" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: hotpink">
        <div class="navbar-brand"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" style="width:70%; height: 100%;"></div>
    </div>
    <nav class="mt-2">
    <ul class="c-sidebar-nav nav nav-pills nav-sidebar flex-column">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link"
               href="{{ route('professional.dashboard') }}">
                <i class="c-sidebar-nav-icon fa fa-home"></i>
            </a>
        </li>

        @if(Auth::user()->role=='Professional')
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Service
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-history') }}">
                            All Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-pending') }}">
                            Pending Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-done') }}">
                            Done Service
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link"
               href="{{ route('professional.professional-rating') }}">
                <i class="c-sidebar-nav-icon fa fa-star"></i>Ratings
            </a>
        </li>
  </ul>

  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </nav>
</div>
 -->

 <div class="c-sidebar c-sidebar-dark c-sidebar-fixed main-sidebar sidebar-light-pink elevation-4 c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: #eea1c6">
        <div class="navbar-brand"><img src="http://localhost/project/the_wc/public/assets/img/admin/logo1.jpg" style="width:70%; height: 100%;"></div>
    </div>
    <nav class="mt-0">
        <ul class="c-sidebar-nav nav nav-pills nav-sidebar flex-column ps">
            <!-- <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="http://localhost/project/the_wc/professional/dashboard">
                    <i class="c-sidebar-nav-icon fa fa-home"></i>
                </a>
            </li> -->
            <li class="c-sidebar-nav-item menu-open">
            <a href="http://localhost/project/the_wc/professional/dashboard" class="nav-link active ml-auto">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="display:inline-block;margin-bottom: 0rem!important;">
                Dashboard
              </p>
            </a>

          </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Service
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-history') }}">
                            All Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-pending') }}">
                            Pending Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-done') }}">
                            Done Service
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link c-active" href="http://localhost/project/the_wc/professional/professional-rating">
                    <i class="c-sidebar-nav-icon fa fa-star"></i>Ratings
                </a>
            </li>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>

            <!-- <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button> -->
        </nav>
    </div>