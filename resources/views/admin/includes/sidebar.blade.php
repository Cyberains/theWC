<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <div class="c-sidebar-brand-full"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" width="118" height="46"></div>
    <div class="c-sidebar-brand-minimized">EB</div>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">
        <i class="c-sidebar-nav-icon fa fa-tachometer"></i>Dashboard</a>
    </li>
    @if(Auth::user()->role=='admin')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon fa fa-users"></i>Employees Management</a>
      <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.customer') }}"><span class="c-sidebar-nav-icon"></span>Employees</a></li>


  </ul>
  </li>
  @endif

  @if(Auth::user()->role=='admin' || Auth::user()->role=='vendor')
  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
      <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Product Management</a>
    <ul class="c-sidebar-nav-dropdown-items">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.category') }}"><span class="c-sidebar-nav-icon"></span> Category</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.subcategory') }}"><span class="c-sidebar-nav-icon"></span> Sub-Category</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.service') }}"><span class="c-sidebar-nav-icon"></span>Services</a></li>
    </ul>
  </li>
  @endif

      @if(Auth::user()->role=='admin')
          <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-link " href="{{ route('admin.plan') }}">
                  <i class="c-sidebar-nav-icon fa fa-subway"></i> Manage Plan</a>
          </li>
      @endif

      @if(Auth::user()->role=='admin')
          <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-link " href="{{ route('admin.cities') }}">
                  <i class="c-sidebar-nav-icon fa fa-map-marker"></i> Manage City's</a>
          </li>
      @endif

      @if(Auth::user()->role=='admin')
          <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-link " href="{{ route('admin.lead-mail-page') }}">
                  <i class="c-sidebar-nav-icon fa fa-envelope"></i> Lead's</a>
          </li>
      @endif

      @if(Auth::user()->role=='admin')
          <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-link " href="{{ route('admin.bookings') }}">
                  <i class="c-sidebar-nav-icon fa fa-book"></i> Manage booking</a>
          </li>
      @endif

  @if(Auth::user()->role=='admin')
  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link " href="{{ route('admin.banners.index') }}">
      <i class="c-sidebar-nav-icon fa fa-bandcamp"></i> Manage Banner</a>
  </li>
  @endif


  @if(Auth::user()->role=='admin')
  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link " href="{{ route('admin.inquiry.index') }}">
      <i class="c-sidebar-nav-icon fa fa-inbox"></i> Manage Inquiry</a>
  </li>
  @endif
  @if(Auth::user()->role=='admin')
 <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.usermanagement') }}">
        <i class="c-sidebar-nav-icon fa fa-user"></i>User Management
        </a>
      </li>
 @endif
 @if(Auth::user()->role=='admin')
 <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.addbooking') }}">
        <i class="c-sidebar-nav-icon fa fa-bookmark-o"></i>Add Booking
        </a>
      </li>
 @endif

  @if(Auth::user()->role=='admin')
  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
      <i class="c-sidebar-nav-icon fa fa-inbox"></i>
      Manage CMS</a>
    <ul class="c-sidebar-nav-dropdown-items">
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index',['type'=>'about_us']) }}">
          <span class="c-sidebar-nav-icon"></span>About Us
        </a>
      </li>
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index','privacy_policy') }}">
          <span class="c-sidebar-nav-icon"></span>Privacy Policy
        </a>
      </li>
     
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index','term_condition') }}">
          <span class="c-sidebar-nav-icon"></span>Terms & Conditions
        </a>
      </li>
    </ul>
  </li>
  @endif
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
