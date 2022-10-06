<div class="c-sidebar c-sidebar-dark c-sidebar-fixed main-sidebar sidebar-light-pink elevation-4 c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: #eea1c6">
        <div class="navbar-brand"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" style="width:70%; height: 100%;"></div>
    </div>
    <nav class="mt-0">
        <ul class="c-sidebar-nav nav nav-pills nav-sidebar flex-column ps">
            <li class="c-sidebar-nav-item menu-open">
            <a href="{{ route('professional.dashboard') }}" class="nav-link active ml-auto">
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
                <a class="c-sidebar-nav-link c-active" href="{{ route('professional.professional-rating') }}">
                    <i class="c-sidebar-nav-icon fa fa-star"></i>Ratings
                </a>
            </li>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </ul>
        </nav>
    </div>
