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
        {{--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.role') }}"><span class="c-sidebar-nav-icon"></span> Role</a>
    </li>--}}
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.customer') }}"><span class="c-sidebar-nav-icon"></span>Employees</a></li>


  </ul>
  </li>
  @endif

  @if(Auth::user()->role=='admin' || Auth::user()->role=='vendor')
  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
      <i class="c-sidebar-nav-icon fa fa-list-alt"></i>Product Management</a>
    <ul class="c-sidebar-nav-dropdown-items">
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.gst') }}"><span class="c-sidebar-nav-icon"></span>GST</a></li>--}}
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.category') }}"><span class="c-sidebar-nav-icon"></span> Category</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.subcategory') }}"><span class="c-sidebar-nav-icon"></span> Sub-Category</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.service') }}"><span class="c-sidebar-nav-icon"></span>Services</a></li>
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.subbrand') }}"><span class="c-sidebar-nav-icon"></span>Sub-Brand</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.manufacturer') }}"><span class="c-sidebar-nav-icon"></span>Manufacturer</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.product') }}"><span class="c-sidebar-nav-icon"></span>Product</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.productatt') }}"><span class="c-sidebar-nav-icon"></span>Product Attributes</a></li>--}}

{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.productexpiry') }}"><span class="c-sidebar-nav-icon"></span>Product Expiry</a></li>--}}

    </ul>
  </li>
  @endif

{{--  @if(Auth::user()->role=='admin'||Auth::user()->role=='biller'||Auth::user()->role=='membership')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-users"></i>Billing Management</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      @if(Auth::user()->role=='biller'||Auth::user()->role=='admin')--}}
{{--      <li class="c-sidebar-nav-item "><a class="c-sidebar-nav-link" href="{{ route('admin.billing.sale') }}"><span class="c-sidebar-nav-icon"></span>Sale</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.billing') }}"><span class="c-sidebar-nav-icon"></span>Genrate Bill</a></li>--}}
{{--      --}}{{-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.billing.modified_bill') }}"><span class="c-sidebar-nav-icon"></span>Modify Bill</a>--}}
{{--  </li> --}}
{{--  <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.billing.return_items') }}"><span class="c-sidebar-nav-icon"></span>Return Item</a></li>--}}
{{--  @endif--}}
{{--  @if(Auth::user()->role=='membership'||Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.membership') }}"><span class="c-sidebar-nav-icon"></span>Membership</a></li>--}}
{{--  @endif--}}
{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.barcode_label') }}"><span class="c-sidebar-nav-icon"></span>Barcode/Label</a></li>--}}
{{--  @endif--}}
{{--  </ul>--}}
{{--  </li>--}}
{{--  @endif--}}

{{--  @if(Auth::user()->role =='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-users"></i>Vendor Management</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.supplier') }}"><span class="c-sidebar-nav-icon"></span> Suppliers</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.purchase') }}"><span class="c-sidebar-nav-icon"></span>Purchases</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.receivepo') }}"><span class="c-sidebar-nav-icon"></span>Receive Po</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.grn_without_po') }}"><span class="c-sidebar-nav-icon"></span>GRN Without PO</a></li>--}}
{{--    </ul>--}}
{{--  </li>--}}
{{--  @endif--}}
{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-inbox"></i>Offer Management</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.today_offer') }}"><span class="c-sidebar-nav-icon"></span>Today Offer</a></li>--}}
{{--    </ul>--}}
{{--  </li>--}}
{{--  @endif--}}

  {{-- @if(Auth::user()->role =='admin')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon fa fa-users"></i>Notification Management</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.supplier') }}"><span class="c-sidebar-nav-icon"></span>Low Stock</a></li>
  <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.purchase') }}"><span class="c-sidebar-nav-icon"></span>About To Be Expired</a></li>
  </ul>
  </li>
  @endif --}}


{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-file"></i>Report Management</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.po_report') }}"><span class="c-sidebar-nav-icon"></span>PO Report</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.billing_report') }}"><span class="c-sidebar-nav-icon"></span>Billing Report</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.return_item_report') }}"><span class="c-sidebar-nav-icon"></span>Return Item Report</a></li>--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.grnwopo_report') }}"><span class="c-sidebar-nav-icon"></span>GRN Without PO Report</a></li>--}}
{{--    </ul>--}}
{{--  </li>--}}
{{--  @endif--}}
{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-inbox"></i>Marketing Management</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.sms') }}"><span class="c-sidebar-nav-icon"></span>SMS Marketing</a></li>--}}
{{--    </ul>--}}
{{--  </li>--}}
{{--  @endif--}}

{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--    <a class="c-sidebar-nav-link " href="{{ route('admin.banners.index') }}">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-inbox"></i> Manage Banner</a>--}}
{{--  </li>--}}
{{--  @endif--}}


{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--    <a class="c-sidebar-nav-link " href="{{ route('admin.inquiry.index') }}">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-inbox"></i> Manage Inquiry</a>--}}
{{--  </li>--}}
{{--  @endif--}}


{{--  @if(Auth::user()->role=='admin')--}}
{{--  <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">--}}
{{--      <i class="c-sidebar-nav-icon fa fa-inbox"></i>--}}
{{--      Manage CMS</a>--}}
{{--    <ul class="c-sidebar-nav-dropdown-items">--}}
{{--      <li class="c-sidebar-nav-item">--}}
{{--        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index',['type'=>'about_us']) }}">--}}
{{--          <span class="c-sidebar-nav-icon"></span>About Us--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="c-sidebar-nav-item">--}}
{{--        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index','privacy_policy') }}">--}}
{{--          <span class="c-sidebar-nav-icon"></span>Privacy Policy--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="c-sidebar-nav-item">--}}
{{--        <a class="c-sidebar-nav-link" href="{{ route('admin.cms.index','term_condition') }}">--}}
{{--          <span class="c-sidebar-nav-icon"></span>Terms & Conditions--}}
{{--        </a>--}}
{{--      </li>--}}
{{--    </ul>--}}
{{--  </li>--}}
{{--  @endif--}}
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
