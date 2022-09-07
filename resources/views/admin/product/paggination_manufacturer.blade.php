@foreach ($manufacturerdata as $manufacturer)

<tr>
    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $manufacturer->title }} </td>
    <td>{{ \Illuminate\Support\Str::limit($manufacturer->description, $limit = 20, $end = '...') }}</td>
    @if(Auth::user()->role == 'admin')
    <td>

        <a title="Edit" href="javascript:void(0)" onclick="manufactureredit( {{ $manufacturer->id }} )"
            id="manufacturer-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

        <a href="javascript:void(0)" data-url="{{ route('admin.delete_manufacturer',['id'=>$manufacturer->id]) }}"
            class="manufacturer-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>

    </td>
</tr>
@endif
@endforeach
<tr>
    <td colspan="4" align="center">
        <div class="col-md-12">
            <div class="float-right" id='paggination'>
                {{ $manufacturerdata->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </td>
</tr>