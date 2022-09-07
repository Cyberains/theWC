@foreach ($productattrdata as $productattr)

<tr>
 <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
 <td>{{ $productattr->productName->title }}  </td>
 <td>{{ $productattr->barcode_id }}  </td>
 <td>{{ $productattr->mrp_price }}  </td>
 <td>{{ $productattr->selling_price }}  </td>
 <td>{{ $productattr->membership_price }}  </td>
 <td>{{ $productattr->basic_price }}  </td>
 <td>{{ $productattr->cost_price }}  </td>
 <td>{{ $productattr->eb_cost_price }}  </td>

 <td class="table-status"> 
      @if($productattr->is_active == 1 ) 
          <div class='active-color'>
              Active</div> 
          
      @else
            <div class='inactive-color'>
              Inactive</div>
          
      
      @endif
</td>
  @if(Auth::user()->role == 'admin')
 <td>

    <a title="Active" style="@if($productattr->is_active == 0)

          display:none;transition: 0.5s;
                        
          @endif">
    <i class="fa fa-toggle-on" id="active-toggle-on" onclick="activeinactivetoggle(0,{{ $productattr->id }})"></i>&nbsp</a>
    
    <a title="Inactive"
    style="@if($productattr->is_active == 1)

      display:none;transition: 0.5s;
    
    @endif">
    <i class="fa fa-toggle-off" id="active-toggle-off" onclick="activeinactivetoggle(1,{{ $productattr->id }})"></i>&nbsp</a>
    
    <a title="Edit" href="javascript:void(0)"  onclick="productattredit( {{ $productattr->id }} )"  id="product-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                             
    <a href="javascript:void(0)" data-url="{{ route('admin.delete_productatt',['id'=>$productattr->id]) }}"  class="productattr-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
 
  </td>
  </tr>
  @endif
@endforeach
<tr>
    <td colspan="11" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $productattrdata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>