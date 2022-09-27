<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show main-sidebar sidebar-light-pink elevation-4" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: hotpink">
        <div class="navbar-brand"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" style="width:70%; height: auto;"></div>
    </div>
    <ul class="c-sidebar-nav nav nav-pills nav-sidebar flex-column">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link"
               href="{{ route('professional.dashboard') }}">
                <i class="c-sidebar-nav-icon fa fa-home"></i>Dashboard
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
                            <i class="c-sidebar-nav-icon fa fa-eercast"></i>All Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-pending') }}">
                            <i class="c-sidebar-nav-icon fa fa-eercast"></i>Pending Service
                        </a>
                        <a class="c-sidebar-nav-link"
                           href="{{ route('professional.service-done') }}">
                            <i class="c-sidebar-nav-icon fa fa-eercast"></i>Done Service
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
</div>
