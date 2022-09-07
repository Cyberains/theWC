@extends('user.customers.master')
@section('title')
    <title>Change Password</title>
@endsection
@section('customer')
    <form action="{{ route('user.update_password') }}" method="post">
      @csrf
    <div class="ps-form__header">
        <h3>Change password</h3>
    </div>
    <div class="ps-form__content">
        <div class="form-group @if ($errors->has('old_password')) has-error @endif">
            <label for="old_password">{{ __('Current password') }}:</label>
            <input type="password" class="form-control" name="old_password" id="old_password"
                   placeholder="{{ __('Current Password') }}">
            @error('old_password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
            <label for="password">{{ __('New password') }}:</label>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="{{ __('New Password') }}">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
            <label for="password_confirmation">{{ __('Password confirmation') }}:</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                   placeholder="{{ __('Password Confirmation') }}">
            @error('password_confirmation')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

        </div>

        <div class="form-group text-center">
            <div class="form-group submit">
                <button class="ps-btn">{{ __('Update') }}</button>
            </div>
        </div>
    </div>
    </form>
@endsection
