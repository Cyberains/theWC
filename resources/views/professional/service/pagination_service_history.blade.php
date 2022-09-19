@if(!empty($service_history))
    @foreach ($service_history as $service)
        <tr>
            <td>{{ (($current_page-1)*25)+$loop->iteration }}</td>
            <td>{{ $service->bookingId }}</td>
            <td>{{ $service->user->name }}</td>
            <td>{{ $service->user->mobile }}</td>
            <td>{{ $service->user->email }}</td>
            <td>{{ $service->service->title }}</td>
            <td><img src="{{ $service->service->base_path.'/'.$service->service->service_image  }}" height="30px"></td>
            <td>{{ $service->amount }}</td>
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
        </tr>
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $service_history->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
