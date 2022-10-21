@php use Illuminate\Support\Str; @endphp
@if(!empty($coupons))
    @foreach ($coupons as $coupon)
        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $coupon->name }}</td>
            <td>{{ $coupon->coupon }} </td>
            <td>{{ $coupon->amount }} </td>
            <td>{{ @$coupon->price_limit }} </td>
            <td>{{ @$coupon->expire_date }} </td>

            @if(Auth::user()->role == 'admin')
                <td>
                    <a title="Edit" href="javascript:void(0)" onclick="ServiceEdit( {{ $coupon->id }} )" id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                    <a href="{{ route('admin.delete-promo',['id'=>$coupon->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>
                </td>
        </tr>
        @endif
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $coupons->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>
