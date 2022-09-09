{{--@php use Illuminate\Support\Str; @endphp--}}
@if(!empty($bookings))
    @foreach ($bookings as $booking)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $booking->bookingId }}</td>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->professional->name }}</td>
            <td>{{ $booking->service->title }}</td>
            <td>{{ $booking->amount }} ₹</td>
            <td>{{ $booking->status }}</td>
        </tr>

    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $bookings->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>
