{{--@php use Illuminate\Support\Str; @endphp--}}
@if(!empty($bookings))
    @foreach ($bookings as $booking)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $booking->bookingId }}</td>
            <td>{{ $booking->user->name }}</td>
            @if(@@$booking->professional->name == null)
                <td style="background-color: #9f191f">{{ @@$booking->professional->name }}</td>
            @elseif(@@$booking->professional->name != null)
                <td>{{ @@$booking->professional->name }}</td>
            @endif
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
