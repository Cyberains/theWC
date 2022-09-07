@foreach ($productexpirydata as $productexpiry)

<tr>
 <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
 <td>{{ $productexpiry->productName->title }}  </td>
 <td>{{ $productexpiry->productAttr->mrp_price }}  </td>
 <td>{{ $productexpiry->aisle }}  </td>
 <td>{{ $productexpiry->rack }}  </td>
 <td>{{ $productexpiry->shelf }}  </td>
 <td>{{ $productexpiry->quantity }}  </td>
 <td>{{ $productexpiry->mfg_date }}  </td>
 <td>{{ $productexpiry->expiry_date }}  </td>
 
  <td class="table-status"> 
      @if($productexpiry->is_active == 1 ) 
          <div class='active-color'>
              Active</div> 
          
      @else
            <div class='inactive-color'>
              Inactive</div>
          
      
      @endif
  </td>
  <td class="table-status"> 
      @if($productexpiry->on_active == 1 ) 
          <div class='active-color'>
              Active</div> 
          
      @else
            <div class='inactive-color'>
              Inactive</div>
          
      
      @endif
  </td>
  @if(Auth::user()->role == 'admin')
  <td>

    <a title="Offline Active" style="@if($productexpiry->is_active == 0)

          display:none;transition: 0.5s;
                        
          @endif">
    <i class="fa fa-toggle-on" id="active-toggle-on" onclick="activeinactivetoggle(0,{{ $productexpiry->id }})"></i>&nbsp</a>
    
    <a title="Offline Inactive"
    style="@if($productexpiry->is_active == 1)

      display:none;transition: 0.5s;
    
    @endif">
    <i class="fa fa-toggle-off" id="active-toggle-off" onclick="activeinactivetoggle(1,{{ $productexpiry->id }})"></i>&nbsp</a>
    
      <a title="Edit" href="javascript:void(0)"  onclick="productexpiryedit( {{ $productexpiry->id }} )"  id="product-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                             
      <a href="javascript:void(0)" data-url="{{ route('admin.delete_productexpiry',['id'=>$productexpiry->id]) }}"  class="productexpiry-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>&nbsp&nbsp


      <a title="Online Active" style="@if($productexpiry->on_active == 0)

          display:none;transition: 0.5s;
                        
          @endif">
    <i class="fa fa-toggle-on" id="active-toggle-on" onclick="onlineactiveinactivetoggle(0,{{ $productexpiry->id }})"></i>&nbsp</a>
    
    <a title="Online Inactive"
    style="@if($productexpiry->on_active == 1)

      display:none;transition: 0.5s;
    
    @endif">
    <i class="fa fa-toggle-off" id="active-toggle-off" onclick="onlineactiveinactivetoggle(1,{{ $productexpiry->id }})"></i></a>
 
  </td>
  @endif
@endforeach
<tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $productexpirydata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>