@extends('user.layout.master')

@section('content')

<section class="ps-section--account crop-avatar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ps-section__left">
                    <aside class="ps-widget--account-dashboard">
                        <div class="ps-widget__header">
                            <form id="avatar-upload-form" enctype="multipart/form-data" action="javascript:void(0)" onsubmit="return false">
                                <div class="avatar-upload-container">
                                    <div id="account-avatar">
                                        <div class="profile-image">
                                            <div class="avatar-view mt-card-avatar">
                                                <img class="br2" 

                                                @if(Auth::user()->upload_photo!=null) 
                                                    src="{{ asset('public/images/avatar/'.Auth::user()->upload_photo) }}" 
                                                @else 

                                                    src='https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=000&color=fff' 

                                                @endif

                                                alt="">

                                                <div class="mt-overlay br2">
                                                    <span><i class="fa fa-edit"></i></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <figure>
                                <figcaption>{{ __('Hello') }}</figcaption>
                                <p>{{ Auth::user()->name }}</p>
                            </figure>
                        </div>
                        <div class="ps-widget__content">
                            <ul>
                                <li @if (Route::currentRouteName() == 'user.overview'||Route::currentRouteName()=='user.update-email' || Route::currentRouteName()=='user.update-mobile') class="active" @endif><a href="{{ route('user.overview') }}"><i class="icon-user"></i> {{ __('Account Information') }}</a></li>


                                <li @if (Route::currentRouteName() == 'user.edit-account' || Route::currentRouteName() == 'user.orders.view') class="active" @endif><a href="{{ route('user.edit-account') }}"><i class="icon-pencil"></i> {{ __('Update Account') }}</a></li>

                                <li @if (Route::currentRouteName() == 'user.orders') class="active" @endif><a href="{{ route('user.orders') }}"><i class="icon-papers"></i> {{ __('Orders') }}</a></li>
                                <li @if (Route::currentRouteName() == 'user.address' || Route::currentRouteName() == 'user.address.create' || Route::currentRouteName() == 'user.address.edit') class="active" @endif><a href="{{ route('user.address') }}"><i class="icon-map-marker"></i> {{ __('Address') }}</a></li>
                                <li @if (Route::currentRouteName() == 'user.change-password') class="active" @endif><a href="{{ route('user.change-password') }}"><i class="icon-lock"></i> {{ __('Change password') }}</a></li>
                                <li>
                                    <form method="post" action="{{ route('user.logout') }}" id="form1">
                                        @csrf
                                        <a href="javascript:void(0)" onclick="document.getElementById('form1').submit()"><i class="icon-power-switch"></i>{{ __('Logout') }}</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ps-section__right">
                    @yield('customer')
                </div>
            </div>
        </div>

        <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" method="post" action="{{ route('user.update_avatar') }}" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong>{{ __('Profile Image') }}</strong></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="avatar-body">

                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input type="hidden" name="avatar_id" id="avatar_id">
                                    <input class="avatar-src" name="avatar_src" type="hidden">
                                    <input class="avatar-data" name="avatar_data" type="hidden">
                                    {!! csrf_field() !!}
                                    <label for="avatarInput">{{ __('New image') }}</label>
                                    <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                </div>

                                <div class="loading" tabindex="-1" role="img" aria-label="{{ __('Loading') }}"></div>

                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                        <div class="error-message text-danger" style="display: none"></div>
                                    </div>
                                    <div class="col-md-3 avatar-preview-wrapper">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="ps-btn ps-btn--sm ps-btn--gray" type="button" data-dismiss="modal">{{ __('Close') }}</button>
                            <button class="ps-btn ps-btn--sm avatar-save" type="submit">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->
    </div>
</section>

@endsection

@section('script')
        
        <script type="text/javascript">
            
            $('#account-avatar').click(function(){

                $('#avatar_id').val({{ Auth::user()->id }})
            });

        </script>

@endsection

