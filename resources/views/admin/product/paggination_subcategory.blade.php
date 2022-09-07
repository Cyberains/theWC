@foreach ($subcategorydata as $subcategory)
<tr>
    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $subcategory->getCategoryName->title }}</td>
    <td>{{ $subcategory->title }} </td>
    <td><img src="{{ asset('public/images/subcategory/'.$subcategory->image) }}" height="30px"></td>
    <td>{{ \Illuminate\Support\Str::limit($subcategory->description, $limit = 20, $end = '...') }}</td>
    @if(Auth::user()->role == 'admin')
    <td>
        <a title="Edit" href="javascript:void(0)" onclick="subcategoryedit( {{ $subcategory->id }} )" id="subcategory-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

        <a href="javascript:void(0)" data-url="{{ route('admin.delete_subcategory',['id'=>$subcategory->id]) }}" class="subcategory-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
    </td>
    @endif
</tr>
@endforeach
<tr>
    <td colspan="5" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $subcategorydata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
