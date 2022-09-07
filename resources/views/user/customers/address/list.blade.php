@extends('user.customers.master')
@section('title')
    <title>Address</title>
@endsection

@section('style')
    
    <style type="text/css">
        
        .table tr td{

            text-align: center;
        }

    </style>

@endsection
@section('customer')
    <div class="ps-section__header">
        <h3></h3>
        <div class="float-left">
            <h3>Addresses</h3>
        </div>
        <div class="float-right">
            <a class="add-address ps-btn ps-btn--sm ps-btn--small" href="{{ route('user.address.create') }}">
                <span>{{ __('Add a new address') }}</span>
            </a>
        </div>
    </div>
    <div class="ps-section__content">
        <div class="table-responsive">
            <table class="table ps-table--whishlist">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Mobile') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Is default?') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @if ($addresses->count()>0)
                    @foreach($addresses as $address)
                        <tr>
                            <td>{{ $address->name }}</td>
                            <td>{{ $address->mobile }}</td>
                            <td style="white-space: inherit;">
                                <p>{{ $address->house_no }} {{ $address->area }} {{ $address->landmark }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}- {{ $address->zipcode }}</p>
                            </td>
                            <td style="width: 120px;">
                                @if ($address->is_active==1) {{ __('Yes') }} @else {{ __('No') }} @endif
                            </td>
                            <td style="width: 150px;">
                                <a class="ps-btn ps-btn--sm ps-btn--small" href="{{ route('user.address.edit', $address->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="ps-btn ps-btn--sm ps-btn--small" href="{{ route('user.address.destroy', $address->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">{{ __('No address!') }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
      
    </div>
@endsection
