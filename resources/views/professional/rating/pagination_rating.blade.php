@if(!empty($ratings))
    @foreach ($ratings as $rating)
        <tr>
            <td>{{ (($current_page-1)*25)+$loop->iteration }}</td>
            <td>{{ $rating->getUser->name }}</td>
            <td>{{ $rating->getService->title }}</td>
            @if($rating->rating == 5 )
                <span class="fa fa-star" style="color: orange"></span>
                <span class="fa fa-star" style="color: orange"></span>
                <span class="fa fa-star" style="color: orange"></span>
                <span class="fa fa-star" style="color: orange"></span>
                <span class="fa fa-star" style="color: orange"></span>
            @elseif($rating->rating == 4)
                <td>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star"></span>
                </td>
            @elseif($rating->rating == 3)
                <td>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
            @elseif($rating->rating == 2)
                <td>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
            @elseif($rating->rating == 1)
                <td>
                    <span class="fa fa-star" style="color: orange"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
            @endif
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
