@extends('user.customers.master')
@section('title')
    <title>Update Address</title>
@endsection
@section('customer')
    <form method="post" action="{{ route('user.address.update') }}">
        @csrf
        <div class="ps-form__header">
            <h3>Edit Address</h3>
        </div>
        <div class="ps-form__content">
            <input type="hidden" name="id" value="{{ $address->id }}">
            <div class="form-group">
                <label for="name">{{ __('Full Name') }}:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $address->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Email') }}:</label>
                <input id="email" type="text" class="form-control" name="email" value="{{ $address->email }}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

           <div class="form-group">
                <label for="phone">{{ __('Phone:') }}</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $address->mobile }}">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group @if ($errors->has('country')) has-error @endif">
                <label for="country">{{ __('Country') }}:</label>
                <select name="country" class="form-control" id="country">
                    <option value="">Select Country</option>
                    @foreach($countrydata as $country)
                        <option value="{{ $country->name }}" @if ($address->country == $country->name) selected @endif>{{ $country->name }}</option>
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
                <input id="state" type="text" class="form-control" name="state" value="{{ $address->state }}">
                @error('state')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group @if ($errors->has('city')) has-error @endif">
                <label for="city">{{ __('City') }}:</label>
                <input id="city" type="text" class="form-control" name="city" value="{{ $address->city }}">
                @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="house_no">{{ __('House No') }}:</label>
                <input id="house_no" type="text" class="form-control" name="house_no" value="{{ $address->house_no }}">
                @error('house_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="area">{{ __('Area') }}:</label>
                <input id="area" type="text" class="form-control" name="area" value="{{ $address->area }}">
                @error('area')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="landmark">{{ __('Landmark') }}:</label>
                <input id="landmark" type="text" class="form-control" name="landmark" value="{{ $address->landmark }}">
                @error('landmark')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>{{ __('Zip code') }}:</label>
                <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ $address->zipcode }}">
                @error('zip_code')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            
            <div class="form-group">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" name="is_default" value="1" @if ($address->is_active) checked @endif id="is-default">
                    <label for="is-default">{{ __('Use this address as default') }}</label>
                </div>
                @error('is_default')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <button class="ps-btn ps-btn--sm" type="submit">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
@endsection
