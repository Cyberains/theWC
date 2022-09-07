@foreach ($subbranddata as $subbrand)
<tr>
    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $subbrand->BrandName->title }}</td>
    <td>{{ $subbrand->title }} </td>
    <td>
        <img src="{{ asset('public/images/subbrand/'.$subbrand->image) }}" height="30px">
    </td>
    <td>{{ \Illuminate\Support\Str::limit($subbrand->description, $limit = 20, $end = '...') }}</td>
    @if(Auth::user()->role == 'admin')
    <td>
        <a title="Edit" href="javascript:void(0)" onclick="subbrandedit( {{ $subbrand->id }} )" id="subbrand-edit"><i
                class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

        <a href="{{ route('admin.delete_subbrand',['id'=>$subbrand->id]) }}" id="subbrand-delete"
            onclick="return confirm('Are you sure, you want to delete this subbrand?')"><i class="fa fa-trash"
                style="color: maroon;"></i></a>

    </td>
    @endif
</tr>

@endforeach
<tr>
    <td colspan="6" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $subbranddata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>