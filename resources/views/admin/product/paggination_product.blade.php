@foreach ($productdata as $product)

<tr>

    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $product->title }} </td>
    <td>{{ $product->title }} </td>
    <td>{{ @$product->SubCategoryName->title }} </td>
    <td>{{ @$product->brandName->title }} </td>

    <td>{{ \Illuminate\Support\Str::limit($product->description, $limit = 20, $end = '...') }}</td>
    <td class="table-status">
        @if($product->is_active == 1 )
        <div class='active-color'>
            Active</div>

        @else
        <div class='inactive-color'>
            Inactive</div>


        @endif
    </td>
    @if(Auth::user()->role == 'admin')
    <td>

        <a title="Active" style="@if($product->is_active == 0)

          display:none;transition: 0.5s;

          @endif">
            <i class="fa fa-toggle-on" id="active-toggle-on" onclick="activeinactivetoggle(0,{{ $product->id }})"></i>&nbsp</a>

        <a title="Inactive" style="@if($product->is_active == 1)

      display:none;transition: 0.5s;

    @endif">
            <i class="fa fa-toggle-off" id="active-toggle-off" onclick="activeinactivetoggle(1,{{ $product->id }})"></i>&nbsp</a>

        <a title="View" href="{{ route('admin.view_product',['id'=>$product->id]) }}"><i class="fa fa-television" style="color: #29b6f6;"></i></a>&nbsp&nbsp
        <a title="Edit" href="javascript:void(0)" onclick="productedit( {{ $product->id }} )" id="product-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

        <a href="javascript:void(0)" data-url="{{ route('admin.delete_product',['id'=>$product->id]) }}" class="product-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>

    </td>
    @endif
</tr>
@endforeach
<tr>
    <td colspan="8" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $productdata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>
