@if(!empty($ratings))
    @foreach ($ratings as $rating)
        <tr>
            <td>{{ (($current_page-1)*25)+$loop->iteration }}</td>
            <td>{{ $rating->getUser->name }}</td>
            <td>
                @foreach(range(1,5) as $i)
                    @if($rating->rating >0)
                        @if($rating->rating >0.5)
                            <span class="fa fa-star" style="color: orange"></span>
                        @else
                            <span class="fa fa-star-half-o" style="color: orange"></span>
                        @endif
                    @else
                        <span class="fa  fa-star-o" style="color: orange"></span>
                    @endif
                        <?php $rating->rating--; ?>
                @endforeach
            </td>
            <td>{{ $rating->comment }}</td>
            <td>{{ $rating->created_at->diffForHumans() }}</td>
        </tr>
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $ratings->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
