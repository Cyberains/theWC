@extends('user.layout.master')
@section('title')
    <title>Reset password</title>
@endsection
@section('content')
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{ route('user.home') }}">Home</a></li>
            <li>Reset Password</li>
        </ul>

    </div>
</div>
<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" id="recover-form" method="POST" action="{{ route('user.password.update') }}">
            @csrf
            <div class="ps-form__content">
                <h4>{{ __('Recover Password') }}</h4>
                <input type="hidden" name="mobile" value="{{ $mobile_no }}">
                <div class="form-group">
                    <input class="form-control" type="text" name="otp" placeholder="{{ __('Enter OTP') }}" data-parsley-required 
                          data-parsley-required-message="OTP is required.">
                    @if ($errors->has('otp'))
                        <span class="text-danger">{{ $errors->first('otp') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="txt-password" placeholder="{{ __('Password') }}" data-parsley-required 
                          data-parsley-required-message="Password is required.">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" id="txt-password-confirmation" placeholder="{{ __('Confirm Password') }}" data-parsley-required 
                  data-parsley-required-message="Confirm Password is required."
                  data-parsley-equalto="#txt-password"  data-parsley-equalto-message="password does not match.">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="form-group submit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit">{{ __('Submit') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    
    $('#recover-form').parsley();

@endsection

