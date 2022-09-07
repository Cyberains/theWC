@extends('user.layout.master')
@section('title')
    <title>Login</title>
@endsection
@section('content')
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{ route('user.home') }}">Home</a></li>
            <li>Login</li>
        </ul>

    </div>
</div>
<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" id="login-form" method="POST" action="{{ route('user.login.post') }}" autocomplete="off">
            @csrf
            <div class="ps-form__content">
                <h4>{{ __('Log In Your Account') }}</h4>
                <div class="form-group">
                    <input class="form-control" name="mobile" type="text" value="{{ old('mobile') }}" placeholder="{{ __('Your Mobile Number') }}"
                            data-parsley-pattern="^[6-9]\d{9}$"
                            data-parsley-pattern-message="Enter valid mobile number."
                            data-parsley-maxlength="10"
                            data-parsley-maxlength-message="Enter valid mobile number." 
                            data-parsley-minlength="10"
                            data-parsley-minlength-message="Enter valid mobile number."
                          data-parsley-required 
                          data-parsley-required-message="Mobile No is required.">
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>
                <div class="form-group form-forgot">
                    <input class="form-control" type="password" name="password" placeholder="{{ __('Password') }}" data-parsley-required 
                          data-parsley-required-message="Password is required."><a href="{{ route('user.password.reset') }}">{{ __('Forgot?') }}</a>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" name="remember" id="remember-me">
                        <label for="remember-me">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <div class="form-group submit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit">{{ __('Login') }}</button>
                </div>

                <div class="form-group">
                    <p class="text-center">{{ __("Don't Have an Account?") }} <a href="{{ route('user.register') }}">{{ __('Sign up now') }}</a></p>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@section('script')
        
        <script type="text/javascript">
            
            $('#login-form').parsley();

        </script>

@endsection
