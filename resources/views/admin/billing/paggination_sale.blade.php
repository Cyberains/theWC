 
 @if($offlinebillingdata->count()>0)
   @foreach ($offlinebillingdata as $billing)

   <tr>
    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $billing->billerName->name }}  </td>
    <td>{{ $billing->name }}</td>
    <td>{{ $billing->receipt_id }}</td>
    <td>{{ $billing->subtotal }}</td>
    <td>{{ $billing->total_tax }}</td>
    <td>{{ $billing->grand_total }}</td>
   
    
    @if(Auth::user()->role == 'admin')
    <td>

      <a title="View" href="{{ route('admin.billing.view_bill',['id'=>$billing->id]) }}" id="sale-view"><i class="fa fa-television" style="color: #29b6f6;"></i></a>&nbsp&nbsp

      <a title="Edit" href="{{ route('admin.billing.modified_bill_id',['receipt_id'=>$billing->receipt_id]) }}" id="sale-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

      <a href="{{ route('admin.generate_offbill',['id'=>$billing->id]) }}" target="_blank" class="bill-slip"><i class="fa fa-file-pdf-o" style="color: maroon;"></i></a>&nbsp&nbsp

      <a href="javascript:void(0)" data-url="{{ route('admin.billing.delete_offbill',['id'=>$billing->id]) }}"  class="sale-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>

    </td>
    @endif
  </tr>

  @endforeach
@else
  
  <tr>
    <td class="text-center" colspan="9">No Record Found</td>
  </tr>

@endif
<tr>
  <td colspan="9" align="center"> 
   <div class="col-md-12">
    <div class="float-right">
      {{ $offlinebillingdata->links('vendor.pagination.bootstrap-4') }}
    </div>
  </div>
</td>
</tr>