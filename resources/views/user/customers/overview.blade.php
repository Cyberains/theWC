@extends('user.customers.master')
@section('title')
    <title>Overview</title>
@endsection
@section('customer')


<div class="ps-section--account-setting">
    <div class="ps-section__header">
        <h3>{{ Auth::user()->name }}</h3>
    </div>
    <div class="ps-section__content">
        <p><i class="icon-user"></i> {{ __('Name') }}: <strong>{{ Auth::user()->name }}</strong></p>
        <p><i class="icon-calendar-31"></i> {{ __('Date of birth') }}:<strong>{{ Auth::user()->dob ? date('d-m-Y',strtotime(Auth::user()->dob)) : __('N/A') }}</strong></p>
        <p><i class="icon-envelope"></i> {{ __('Email') }}: <strong>{{ Auth::user()->email ? Auth::user()->email : __( 'N/A' ) }}</strong><a href="{{ route('user.update-email') }}" class="btn btn-lg btn-warning py-1 ml-3">Edit</a></p>
        <p><i class="icon-phone-bubble"></i> {{ __('Phone') }}: <strong>{{ Auth::user()->mobile ? Auth::user()->mobile : __('N/A') }}</strong><a href="{{ route('user.update-mobile') }}" class="btn btn-lg btn-warning py-1 ml-3">Edit</a></p>
    </div>
</div>
@endsection



