@extends('user.customers.master')
@section('title')
    <title>Create Address</title>
@endsection
@section('customer')
    <form action="{{ route('user.address.store') }}" method="post">
        @csrf
        <div class="ps-form__header">
            <h3>Add Address</h3>
        </div>
        <div class="ps-form__content">
            <div class="form-group">
                <label for="address_type">{{ __('Address Type') }}:</label>
                <select id="address_type" type="text" class="form-control" name="address_type" value="{{ old('address_type') }}">

                    <option value="">Select Address Type</option>
                    <option value="home">Home</option>
                    <option value="office">Office</option>

                </select>
            </div>
            @error('address_type')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group">
                <label for="name">{{ __('Full Name') }}:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group">
                <label for="email">{{ __('Email') }}:</label>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group">
                <label for="phone">{{ __('Phone') }}:</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

            </div>
            @error('phone')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('country')) has-error @endif">
                <label for="country">{{ __('Country') }}:</label>
                <select name="country" class="form-control" id="country">
                    <option value="">Select Country</option>
                    @foreach($countrydata as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('country')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('state')) has-error @endif">
                <label for="state">{{ __('State') }}:</label>
                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">

            </div>
            @error('state')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group @if ($errors->has('city')) has-error @endif">
                <label for="city">{{ __('City') }}:</label>
                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

            </div>
            @error('city')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group">
                <label for="house_no">{{ __('House No') }}:</label>
                <input id="house_no" type="text" class="form-control" name="house_no" value="{{ old('house_no') }}">
                @error('house_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="area">{{ __('Area') }}:</label>
                <input id="area" type="text" class="form-control" name="area" value="{{ old('area') }}">
                @error('area')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="landmark">{{ __('Landmark') }}:</label>
                <input id="landmark" type="text" class="form-control" name="landmark" value="{{ old('area') }}">
                @error('landmark')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label>{{ __('Zip code') }}:</label>
                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                @error('zip_code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" value="1" name="is_default" id="is-default">
                    <label for="is-default">{{ __('Use this address as default') }}</label>
                </div>
                @error('zip_code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="ps-btn ps-btn--sm" type="submit">{{ __('Add Address') }}</button>
            </div>
        </div>
    </form>
@endsection
