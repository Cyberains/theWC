{{--@php use Illuminate\Support\Str; @endphp--}}
{{--@if(!empty($bookings))--}}
{{--    @foreach ($bookings as $booking)--}}

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $booking->bookingId }}</td>
            <td>{{ bookingAddressFormatting($booking->bookingAddress) }}</td>
            <td>{{ $booking->user->name }}</td>
            @if(@@$booking->professional->name == null)
                <td style="background-color: #9f191f">
                    <div class="btn-group">
                        <select class="form-select professional_selected" aria-label="Default select example"
                                data-bookingId="{{ $booking->bookingId }}"
                                id="professional_selected_id">
                            <option selected>Select Professional</option>
                            @foreach(getAllPaidProfessionals() as $prof)
                                <option value={{ $prof->id }} >{{ $prof->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            @elseif(@@$booking->professional->name != null)
                <td>{{ @@$booking->professional->name }}</td>
            @endif
            <td>{{ getServiceAmountByBookingId($booking->bookingId) + 84 + 15.12 }} ₹</td>
            <td>{{ getServicePayedAmountByBookingId($booking->bookingId) }} ₹</td>
            <td>{{ getServiceDueAmountByBookingId($booking->bookingId) }} ₹</td>
            <td>{{ $booking->date_slot }}</td>
            <td>{{ $booking->time_slot }}</td>
            <td>{{$booking->created_at->diffForHumans()}}</td>
            <td>{{ $booking->status }}</td>
            <td>{{ $booking->servicePaymentStatus->payment_status ?? 'Pending' }}</td>
            <td>
                <a href="{{route('admin.getlocation',['booking_id'=>$booking->bookingId])}}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
{{--                <a href="{{route('admin.getlocation',['booking_id'=>$booking->bookingId])}}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
            </td>
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


@section('script')
    <script>

        $('.professional_selected').on('change', function() {
            let professional_id = this.value;
            let booking_id = $(this).attr("data-bookingId");
            assignProfessional(booking_id,professional_id)
        });

        function assignProfessional(booking_id,professional_id){
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('admin.assign-prof') }}",
                method:'POST',
                data:{
                    _token:token,
                    booking_id:booking_id,
                    professional_id:professional_id
                }
            });
        }
    </script>
@endsection
