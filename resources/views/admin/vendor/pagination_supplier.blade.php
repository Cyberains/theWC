@foreach ($supplierdata as $supplier)

    <tr>
      <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
      <td>{{ $supplier->supplier_id }}</td>
      <td>{{ $supplier->supplier_name }}</td>
      <td>{{ $supplier->supplier_mobile }}</td>
      <td>{{ $supplier->supplier_email }}</td>
      <td>{{ $supplier->supplier_address }}</td>
      <td>{{ $supplier->balance }}</td>
      <td>{{ $supplier->po_expiry_duration }}</td>
        @if(Auth::user()->role == 'admin')
      <td>
        
        <a title="Edit" href="javascript:void(0)"  onclick="supplieredit( {{ $supplier->id }} )"  id="supplier-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                              
        <a href="javascript:void(0)" data-url="{{ route('admin.delete_supplier',['id'=>$supplier->id]) }}" class="supplier-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
       
      </td>
        @endif
    </tr>
@endforeach
<tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $supplierdata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>