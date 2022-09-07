@component('mail::message')
# Name:{{ $data['name'] }}
Mail:{{ $data['email'] }}<br>
Phone:{{ $data['phone'] }}<br>
Message:{{ $data['message'] }}




@component('mail::button', ['url' => 'www.earlybasket.com'])
Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
