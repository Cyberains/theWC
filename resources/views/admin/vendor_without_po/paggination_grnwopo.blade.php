@if($grnwopodata->count()>0)
    @foreach ($grnwopodata as $grnwopo)
    <?php

         $qty=json_decode($grnwopo->quantity);
         $countqty=0;
         for($i=0;$i<count($qty);$i++){

            $countqty+=$qty[$i];

          }     

    ?>

    <tr>
        <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
        <td>{{ $grnwopo->lr_number }}</td>
        <td>{{ @$countqty}} </td>
        <td>{{ @$grnwopo->total_tax }}</td>
        <td>{{ @$grnwopo->sub_total }}</td>
        <td>{{ @$grnwopo->grand_total }}</td>
        <td>
            <a title="Edit" href="{{ route('admin.edit_grn_without_po',['id'=>$grnwopo->id]) }}" id="grn-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp 

            <a href="javascript:void(0)" data-url="{{ route('admin.delete_grnwopo',['id'=>$grnwopo->id]) }}" class="grnwopo-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>      
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" class="text-center">No Record Found</td>
    </tr>
@endif
<tr>
    <td colspan="9">
        <div class="col-md-12">
            <div class="float-right">
                {{ $grnwopodata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>