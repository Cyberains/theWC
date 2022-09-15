<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <div class="c-sidebar-brand-full"><img src="{{ asset('public/assets/img/admin/logo1.jpg') }}" width="118" height="46"></div>
    <div class="c-sidebar-brand-minimized">EB</div>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('professional.dashboard') }}">
        <i class="c-sidebar-nav-icon fa fa-tachometer"></i>Dashboard</a>
    </li>

      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('professional.service-history') }}">
              <i class="c-sidebar-nav-icon fa fa-wrench"></i>Service History</a>
      </li>
    @if(Auth::user()->role=='Professional')
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon fa fa-users"></i>Information</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('professional.professional-rating') }}"><span class="c-sidebar-nav-icon"></span>Ratings</a></li>
          </ul>
        </li>
    @endif

{{--      @if(Auth::user()->role=='Professional')--}}
{{--      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--          <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Product Management</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.gst') }}"><span class="c-sidebar-nav-icon"></span>GST</a></li>--}}
{{--          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.category') }}"><span class="c-sidebar-nav-icon"></span> Category</a></li>--}}
{{--          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.subcategory') }}"><span class="c-sidebar-nav-icon"></span> Sub-Category</a></li>--}}
{{--        </ul>--}}
{{--      </li>--}}
{{--      @endif--}}
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
