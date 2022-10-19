@php use Illuminate\Support\Str; @endphp
@if(!empty($new_launches))
    @foreach ($new_launches as $new)

        <tr>
            <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
            @if($new->banner_image != null)
                <td><img src="{{ $new->base_path.'/'.$new->banner_image }}" height="30px"></td>
            @elseif($new->banner_image == null)
                <td><img src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="Logo" height="30px"></td>
            @endif

            <td>{{ $new->type }}</td>

            <td>{{ @$new->category_id }} </td>
            <td>{{ @$new->sub_category_id }} </td>
            <td>{{ @$new->service_id }} </td>

            @if(Auth::user()->role == 'admin')
                <td>
                    <a title="Edit" href="javascript:void(0)" onclick="ServiceEdit( {{ $new->id }} )"
                       id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                    <a href="{{ route('admin.delete-new-launched',['id'=>$new->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>
                </td>
        </tr>
        @endif
    @endforeach
@endif
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $new_launches->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>
