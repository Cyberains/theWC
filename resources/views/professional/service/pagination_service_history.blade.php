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
            <td>{{ $service->status }}</td>
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
