
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand" style="background-color: #eea1c6">
        <div class="c-sidebar-brand-full"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" style="width:70%; height: 100%;"></div>
      </div>
          <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{ route('professional.dashboard') }}">
                <i class="c-sidebar-nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
              <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Service</a>
                <ul class="c-sidebar-nav-dropdown-items">
                  <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link"
                    href="{{ route('professional.service-history') }}">
                    All Service
                    </a>
                  </li>
                  <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link"
                    href="{{ route('professional.service-pending') }}">
                    Pending Service
                    </a>
                  </li>
                  <li class="c-sidebar-nav-item"> 
                      <a class="c-sidebar-nav-link"
                    href="{{ route('professional.service-done') }}">
                    Done Service
                    </a>
                  </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-link" href="{{ route('professional.professional-rating') }}">
              <i class="c-sidebar-nav-icon fa fa-star"></i>Ratings
              </a>
            </li>
          </ul>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
      </div>
