@extends('user.customers.master')
@section('title')
    <title>Edit Account</title>
@endsection
@section('customer')
    <form action="{{ route('user.update-account') }}" method="POST">
        <div class="ps-form__header">
            <h3>Edit Account</h3>
        </div>
        <div class="ps-form__content">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="name">{{ __('Full Name') }}:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('dob')) has-error @endif">
                <label for="date_of_birth">{{ __('Date of birth') }}:</label>
                <input id="date_of_birth" type="date" placeholder="yyyy-mm-dd" class="form-control" name="dob" value="{{ Auth::user()->dob }}">
            </div>
            @error('dob')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email">{{ __('Email') }}:</label>
                <input id="email" type="text" class="form-control" disabled="disabled" value="{{ Auth::user()->email }}" name="email">
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('phone')) has-error @endif">
                <label for="phone">{{ __('Phone') }}</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('Phone') }}" value="{{ Auth::user()->mobile }}" disabled="disabled">

            </div>
            
            @error('phone')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group text-center">
                <div class="form-group submit">
                    <button class="ps-btn">{{ __('Update') }}</button>
                </div>
            </div>
        </div>
    </
@endsection
