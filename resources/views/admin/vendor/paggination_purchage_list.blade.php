@foreach ($purchasedata as $purchase)

<tr>
    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $purchase->supplierName->supplier_id }}</td>
    <td>{{ $purchase->purchase_id }}</td>
    <td>{{ $purchase->sub_total }}</td>
    <td>{{ $purchase->total_tax }}</td>
    <td>{{ $purchase->grand_total }}</td>
    <td>{{ $purchase->po_delivery_date }}</td>
    <td>{{ $purchase->advance_payment_type }}</td>
    <td>{{ $purchase->payment_rupee_percent }}</td>
    <td>{{ $purchase->advance_payment_amount }}
        @if($purchase->payment_rupee_percent=='percent' && $purchase->advance_payment_type=='partial')
        <small>(%)</small>
        @elseif($purchase->payment_rupee_percent=='rupee' && $purchase->advance_payment_type=='partial')
        <small>(<i class="fa fa-rupee"></i>)</small>

        @elseif($purchase->advance_payment_type=='full')
        <small>(<i class="fa fa-rupee"></i>)</small>
        @else

        @endif
    </td>
    <td>
        @if($purchase->expire_status==1)
        <span style="color: maroon;font-weight: 600">Expired</span>
        @else
        <span style="color: green;font-weight: 600">Not Expired</span>
        @endif
    </td>
    <td>

        @if($purchase->expire_status==0)
        <a title="Receive Po" href="{{ route('admin.addreceivepo',['id'=>$purchase->id]) }}"><i
                class="fa fa-cog fa-spin fa-1x fa-fw"></i></a>&nbsp&nbsp


        <a title="Generate PDF" href="{{ route('admin.get_purchase_pdf',['id'=>$purchase->id]) }}" target="_blank"
            id="purchase-pdf"><i class="fa fa-file-pdf" style="color: #29b6f6;"></i></a>&nbsp&nbsp

        @endif

        <a title="View" href="{{ route('admin.view_purchase',['id'=>$purchase->id]) }}"><i
                class="fa fa-eye"></i></a><br>

        @if($purchase->expire_status==0)
        <a title="Edit" href="{{ route('admin.edit_purchase',['id'=>$purchase->id]) }}" id="purchase-edit"><i
                class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
        @endif
        <a href="javascript:void(0)" data-url="{{ route('admin.delete_purchase',['id'=>$purchase->id]) }}"
            class="purchase-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>


    </td>

</tr>
@endforeach
<tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $purchasedata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>