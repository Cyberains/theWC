<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
      <i class="fa fa-bars"></i>
    </button><a class="c-header-brand d-lg-none" href="#">
      DASHBOARD</a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="c-header-nav ml-auto mr-4">
      <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
          <i class="c-icon fa fa-bell"></i></a>
      </li>

      <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
          <i class="c-icon fa fa-envelope"></i></a>
      </li>
      @if(Auth::check())
       <li class="c-header-nav-item d-md-down-none mx-2">{{ Auth::user()->name }}
      </li>
      <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="c-avatar"><img class="c-avatar-img" src="{{  URL::asset('public/assets/img/admin/avatars/6.jpg') }}" alt="oops.."></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
          <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
          <a class="dropdown-item" href="#">
            <i class="c-icon mr-2 fa fa-user"></i> Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <i class="c-icon mr-2 fa fa-sign-out"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
      </li>
      @endif
    </ul>
</header>
