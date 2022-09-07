@component('mail::message')

# Hello {{ $data['client_name'] }},

Your OTP is {{ $data['otp'] }}.OTP is valid for 30 minutes.

@component('mail::button',['url'=>'javascript:void(0)'])
{{ $data['otp'] }}
@endcomponent

Thanks,<br>
Early Basket
@endcomponent