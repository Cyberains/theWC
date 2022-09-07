<div class="customer-address-payment-form">

    <div class="form-group">
        @if (!Auth::check())
            <p>{{ __('You have an account already?') }} <a style="color: blue;" href="{{ route('user.login') }}">{{ __('Login') }}</a></p>
        @endif
    </div>

    @if (Auth::check())
        @php

            $isAvailableAddress = !$addresses->isEmpty() ? true : false;
        @endphp
        <div class="form-group">

            @if ($isAvailableAddress)

                <label class="control-label" for="address_id">{{ __('Select available addresses') }}:</label>


            @endif

            <div class="list-customer-address" @if (!$isAvailableAddress) style="display: none;" @endif>
                <div class="select--arrow">
                    <select name="address[address_id]" class="form-control address-control-item" id="address_id">
                        <option value="new" >{{ __('Add new address...') }}</option>
                        @if ($isAvailableAddress)
                            @foreach ($addresses as $address)
                                <option
                                    value="{{ $address->id }}"
                                    @if ($address->is_active==1)
                                    selected="selected"
                                    @endif
                                >
                                    {{ $address->zip_code }}, {{ $address->city }}, {{ $address->state }}</option>
                            @endforeach
                        @endif
                    </select>
                    <i class="fa fa-angle-down"></i>
                </div>
                <br>
                <div class="address-item-selected">
                    @if ($isAvailableAddress)
                        @if (get_default_customer_address() != null)
                            @include('user.orders.address-item',['address'=>get_default_customer_address()])
                        @else
                            @include('user.orders.address-item',['address'=>$addresses->first()])
                        @endif
                    @endif
                </div>
                <div class="list-available-address" style="display: none;">
                    @if ($isAvailableAddress)
                        @foreach($addresses as $address)
                            <div class="address-item-wrapper" data-id="{{ $address->id }}">
                                @include('user.orders.address-item')
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="address-form-wrapper" @if (Auth::check() && $isAvailableAddress) style="display: none;" @endif>
        <div class="row">
            <div class="col-12">
                <div class="form-group @if ($errors->has('address.name')) has-error @endif">
                    <input type="text" name="address[name]" id="address[name]" placeholder="{{ __('Full Name') }}" class="form-control address-control-item checkout-input"
                           value="">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="form-group  @if ($errors->has('address.email')) has-error @endif">
                    <input type="text" name="address[email]" id="address[email]" placeholder="{{ __('Email') }}" class="form-control address-control-item checkout-input" value="">
                    
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="form-group  @if ($errors->has('address.phone')) has-error @endif">
                    <input type="text" name="address[phone]" id="address[phone]" placeholder="{{ __('Phone') }}" class="form-control address-control-item checkout-input" value="">
                    
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-12">
                    <div class="form-group @if ($errors->has('address.country')) has-error @endif">
                        <div class="select--arrow">
                            <select name="address[country]" class="form-control address-control-item" id="address_country">
                                
                                    <option value="">Select Country</option>
                                    @foreach($countrydata as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                
                            </select>
                            <i class="fa fa-angle-down"></i>
                        </div>
                        
                    </div>
                </div>
            
            <div class="col-sm-6 col-12">
                <div class="form-group @if ($errors->has('address.state')) has-error @endif">
                    <input id="address_state" type="text" class="form-control address-control-item checkout-input" placeholder="{{ __('State') }}" name="address[state]" value="">
                    
                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="form-group  @if ($errors->has('address.city')) has-error @endif">
                    <input id="address_city" type="text" class="form-control address-control-item checkout-input" placeholder="{{ __('City') }}" name="address[city]" value="">
                    
                </div>
            </div>

            <div class="col-12">
                <div class="form-group @if ($errors->has('address.address')) has-error @endif">
                    <input id="address_address" type="text" class="form-control address-control-item checkout-input" placeholder="{{ __('Address') }}" name="address[address]" value="">
                    
                </div>
            </div>

            <div class="col-12">
                <div class="form-group @if ($errors->has('address.zip_code')) has-error @endif">
                    <input id="address_zip_code" type="text" class="form-control address-control-item checkout-input" placeholder="{{ __('Zip code') }}" name="address[zip_code]" value="">
                    
                </div>
            </div>
        
        </div>
    </div>

    @if (!Auth::check())
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input type="checkbox" name="create_account" value="1" id="create_account" @if (empty($errors) && old('create_account') == 1) checked @endif>
                    <label for="create_account" class="control-label" style="padding-left: 5px">{{ __('Register an account with above information?') }}</label>
                </div>
            </div>
        </div>
        <div class="password-group" @if (!$errors->has('password') && !$errors->has('password_confirmation')) style="display: none;" @endif>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control checkout-input" name="password" placeholder="{{ __('Password') }}">
                        
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control checkout-input" placeholder="{{ __('Password confirmation') }}" name="password_confirmation">
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
