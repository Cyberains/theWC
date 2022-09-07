@extends('user.layout.master')
@section('title')
    <title>Password Reset</title>
@endsection
@extends('user.layout.master')
@section('title')
    <title>Forget Password</title>
@endsection
@section('content')
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{ route('user.home') }}">Home</a></li>
            <li>Forget password?</li>
        </ul>

    </div>
</div>
<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" id="forget-form" method="POST" action="{{ route('user.password.request') }}">
            @csrf
            <div class="ps-form__content">
                <h4>{{ __('Reset Password') }}</h4>
                <div class="form-group">
                    <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="{{ __('Enter Your Registered Mobile Number') }}"        data-parsley-required 
                            data-parsley-required-message="Mobile is required." 
                            data-parsley-pattern="^[6-9]\d{9}$"
                            data-parsley-pattern-message="Enter valid mobile number."
                            data-parsley-maxlength="10"
                            data-parsley-maxlength-message="Enter valid mobile number." 
                            data-parsley-minlength="10"
                            data-parsley-minlength-message="Enter valid mobile number.">
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>

                <div class="form-group submit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit">{{ __('Send OTP') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('script')

    $('#forget-form').parsley();    

@endsection

