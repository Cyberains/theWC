{{--@php use Illuminate\Support\Str; @endphp--}}
@if(!empty($subscriptions))
    @foreach ($subscriptions as $subscription)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $subscription->name }}</td>
            <td>{{ $subscription->description }}</td>
            <td>{{ $subscription->months }}</td>
            <td>{{ $subscription->price }} ₹</td>
            <td>{{ $subscription->discount }} ₹</td>
            <td>{{ $subscription->final_price }} ₹</td>
            <td><img src="{{ asset('public/images/plans/'.$subscription->image) }}" height="30px" alt="subscription img"></td>

            @if(Auth::user()->role == 'admin')
                <td>
                    <a title="Edit" href="javascript:void(0)" onclick="subscriptionEdit( {{ $subscription->id }} )"
                       id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                    <a href="{{ route('admin.delete-plan',['id'=>$subscription->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>
                </td>
            @endif
        </tr>

    @endforeach
@endif
<tr>
{{--    <td colspan="6" align="center">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="float-right" id='paggination'>--}}
{{--                {{ $subscription->links('vendor.pagination.bootstrap-4') }}--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </td>--}}
</tr>
