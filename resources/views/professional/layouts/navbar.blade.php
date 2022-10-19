
    <style type="text/css">

        .notification{
            width: 24rem;
            top: 36px;
        }

        .notification .dropdown-menu-header {
            border-bottom: 1px solid #E4E5EC;
        }
        .w3-red{
            position: relative;
            border-radius: 50%;
            color: #fff;
            background-color: #e55353;
            padding: 2px 5px;
            line-height: 19px;
            font-size: 13px;
            top: -10px;
            left: -10px;
        }
        .notification .notification-tag{

            position: absolute;
            top: 14px;
            right: 20px;
        }
        .notification h6 span{


            text-transform: uppercase;

        }
        .ps a:hover {
            cursor: pointer;
            text-decoration: none;
            background-color: #ebedef;
        }
        .notification .ps{
            position: relative;
            margin-top: 0;
            top: -4px;

        }
        .notification .media{
            padding: 3px 22px;
            border: none;
            border-bottom: 1px solid #E4E5EC;
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .notification .media-body > p{
            margin-top: 5px;
            font-size: 12px;
            margin-bottom: 1px;
        }
        .notification .media-body > p{
            margin-top: 0;
            margin-bottom: 0rem;
        }
        .notification .media-body .media-heading{
            margin-top: 0;
            margin-bottom: 2px;
        }
        .notification .ps, .notification .dropdown-menu-footer {
            position: relative;
            margin-top: 0;
            top: 0px;
        }
        .round {
  position: relative;
}

.round label {
  background-color: #ccc;
  border: 1px solid #ccc;
  border-radius: 50%;
  cursor: pointer;
  height: 1rem;
  left: 0;
  position: absolute;
  top: 0;
  width: 1rem;
}

.round input[type="checkbox"] {
  visibility: hidden;
}

.round input[type="checkbox"]:checked + label {
  background-color: #28a745;
  border-color: #28a745;
}

.round input[type="checkbox"]:checked + label:after {
  opacity: 1;
}


    </style>

<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
      <i class="fa fa-bars"></i>
    </button>
    <a class="c-header-brand d-lg-none" href="#">DASHBOARD</a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
      <i class="fa fa-bars"></i>
    </button>
    <?php
        $notifycount = DB::table('notifications')->where('notifiable_id',auth()->user()->id)->whereNull('read_at')->count();

       if ($notifycount<10) {
            $notifycount = '0'.$notifycount;
              $notificationdata = auth()->user()->unreadNotifications()->take(4)->get();
        }
        if($notifycount>0){
          $notificationdata = auth()->user()->unreadNotifications()->take(4)->get();
        }

    $activeStatus = DB::table('professional_active_status')->where('professional_id' , auth()->user()->id)->first();
?>

    <ul class="c-header-nav ml-auto mr-2">
        <li class="mx-2">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="active-status">
                <label class="custom-control-label" for="active-status" data-on="Yes" data-off="No"></label>
            </div>
        </li>

        <li class="c-header-nav-item mx-2"><a class="c-header-nav-link" href="#" data-toggle="dropdown">
                <i class="c-icon fa fa-bell"></i>
                @if($notifycount>0)
                    <span class="w3-badge w3-red badgebadge-pill badge-danger" id="w3-badge">{{ $notifycount }}</span>
                @else
                    <span class="w3-badge badgebadge-pill badge-danger" id="w3-badge"></span>
                @endif</a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right notification">
                @if($notifycount>0)

                    @include('professional.layouts.notification',compact('notifycount','notificationdata'))
                @else
                    @include('professional.layouts.notification',compact('notifycount'))
                @endif
            </ul>
        </li>
      <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#"><i class="c-icon fa fa-envelope"></i></a></li>
      @if(Auth::check())
            <li class="c-header-nav-item d-md-down-none mx-2">{{ Auth::user()->name }}</li>
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar">
                        @if(auth()->user()->upload_photo == null)
                            <img class="c-avatar-img" src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="oops..">
                        @else
                            <img class="c-avatar-img" src="{{  auth()->user()->upload_photo }}" alt="oops..">
                        @endif

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                        <a class="dropdown-item" href="{{ route('professional.profile') }}"><i class="c-icon mr-2 fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

<script>
    document.getElementById("active-status").addEventListener("change", function () {
        alert(document.getElementById('active-status').attributes)
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"{{ route('professional.prof-active') }}",
            method:'POST',
            data: {
                _token:token,
                id: {{ auth()->id() }},
                active : document.getElementById('active-status').value
            },
            success:function(data){
                console.log('data');
            }
        });
    });
</script>
