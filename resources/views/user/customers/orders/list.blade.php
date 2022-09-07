@extends('user.customers.master')
@section('title')
    <title>Edit Account</title>
@endsection
@section('customer')
    <div class="ps-section__header">
        <h3>My Orders</h3>
    </div>
    <div class="ps-section__content">
        <div class="table-responsive">
            <table class="table ps-table--whishlist">
                <thead>
                    <tr>
                        <th>{{ __('ID number') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Total') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @if (1)
                    
                        <tr>
                            <td>1234567890</td>
                            <td>2021/06/02</td>
                            <td>202.00</td>
                            <td>confirmed</td>
                            <td>
                                <a class="ps-btn ps-btn--sm ps-btn--small" href="">{{ __('View') }}</a>
                            </td>
                        </tr>
                    
                @else
                    <tr>
                        <td colspan="5" class="text-center">{{ __('No orders!') }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        {{--<div class="ps-pagination">
            
        </div>--}}
    </div>
@endsection
