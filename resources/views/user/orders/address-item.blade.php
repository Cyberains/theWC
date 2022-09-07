<div class="address-item @if ($address->is_active) is-default @endif" data-id="{{ $address->id }}">
    <p class="name">{{ $address->name }}</p>
    <p class="address"
       title="{{ $address->address }}, {{ $address->city }}, {{ $address->state }} {{ $address->country_name }}{{ $address->zip_code }}">
        {{ $address->address }}, {{ $address->city }}, {{ $address->state }} {{ $address->country_name }} {{ $address->zip_code }}
    </p>
    <p class="phone">{{ __('Phone') }}: {{ $address->phone }}</p>
    @if ($address->email)
        <p class="email">{{ __('Email') }}: {{ $address->email }}</p>
    @endif
    @if ($address->is_active)
        <span class="default">{{ __('Default') }}</span>
    @endif
</div>