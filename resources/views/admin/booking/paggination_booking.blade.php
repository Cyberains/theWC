{{--@php use Illuminate\Support\Str; @endphp--}}
{{--@if(!empty($bookings))--}}
    @foreach ($bookings as $booking)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $booking->bookingId }}</td>
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
            <td>{{ $booking->service->title }}</td>
            <td>{{ $booking->amount }} ₹</td>
            <td>{{ $booking->status }}</td>
        </tr>

    @endforeach
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
