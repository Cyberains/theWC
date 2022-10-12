@if(!empty($service_done))
    @foreach ($service_done as $service)
        <tr>
            <td>{{ (($current_page-1)*25)+$loop->iteration }}</td>
            <td>{{ $service->bookingId }}</td>
            <td>{{ @$service->user->name }}</td>
            <td>{{ @$service->user->mobile }}</td>
            <td>{{ @$service->user->email }}</td>
            <td>{{ getServiceAmountByBookingId($service->bookingId) }}</td>
            <td>
                <div class="btn-group btn btn-success">
                    Done
                </div>
            </td>
            <td> {{ $service->created_at->diffForHumans() }}</td>
{{--            <td>--}}
{{--                <a title="View" href="javascript:void(0)" onclick="viewBooking({{ $service->id }})" id="view-booking"><i class="fa fa-eye" style="color: #29b6f6;"></i></a>--}}
{{--            </td>--}}
        </tr>
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $service_done->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
