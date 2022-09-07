@php use Illuminate\Support\Str; @endphp
@if(!empty($cities))
    @foreach ($cities as $city)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            <td>{{ $city->name }}</td>
            <td><img src="{{ asset('public/images/city/'.$city->image) }}" height="30px"></td>

            @if(Auth::user()->role == 'admin')
                <td>
                    <a title="Edit" href="javascript:void(0)" onclick="cityedit( {{ $city->id }} )"
                       id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                    <a href="{{ route('admin.delete-city',['id'=>$city->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>
                </td>
        </tr>
        @endif
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $cities->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>
