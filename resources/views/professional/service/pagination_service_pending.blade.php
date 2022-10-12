@if(!empty($service_pending))
    @foreach ($service_pending as $service)
        <tr>
            <td>{{ (($current_page-1)*25)+$loop->iteration }}</td>
            <td>{{ $service->bookingId }}</td>
            <td>{{ @$service->user->name }}</td>
            <td>{{ @$service->user->mobile }}</td>
            <td>{{ @$service->user->email }}</td>
            <td>{{ getServiceAmountByBookingId($service->bookingId) }}</td>
            <td>
                <div class="btn-group">
                    @if($service->status == 'done')
                        <button type="button" class="btn btn-success">{{ $service->status }}</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                    @elseif($service->status == 'processing')
                        <button type="button" class="btn btn-secondary">{{ $service->status }}</button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                    @elseif($service->status == 'pending')
                        <button type="button" class="btn btn-warning">{{ $service->status }}</button>
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                    @endif

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('professional.service-status-up',['bookingId'=>$service->bookingId,'status'=>'pending']) }}">Pending</a>
                        <a class="dropdown-item" href="{{ route('professional.service-status-up',['bookingId'=>$service->bookingId,'status'=>'processing']) }}">Processing</a>
                        <a class="dropdown-item" href="{{ route('professional.service-status-up',['bookingId'=>$service->bookingId,'status'=>'done']) }}">Done</a>
                    </div>
                </div>
            </td>
            <td> {{ $service->created_at->diffForHumans() }}</td>
{{--            <td>--}}
{{--                <a title="Location" href="javascript:void(0)" onclick="viewMap()" id="view-user-location"><i class="fa fa-map-marker" style="color: #075680;"></i></a>&nbsp&nbsp--}}
{{--                <a title="View" href="javascript:void(0)" onclick="viewBooking({{ $service->id }})" id="view-booking"><i class="fa fa-eye" style="color: #29b6f6;"></i></a>--}}
{{--            </td>--}}
        </tr>
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $service_pending->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
