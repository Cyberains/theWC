@foreach ($receivepodata as $receivepo)
<?php 
     $qty=json_decode($receivepo->qty);
     $countqty=0;
     for($i=0;$i<count($qty);$i++){
     $countqty+=$qty[$i];
      }
                          //receive Qty
    $reqty=json_decode($receivepo->receivedqty);
    $recountqty=0;
    for($i=0;$i<count($reqty);$i++){
        $recountqty+=$reqty[$i];
    }
    $creditordebit=$receivepo->grand_total-$receivepo->purchage_grand_total;
    if($creditordebit > 0){
        $crd=$creditordebit;
     $node="credit";
}
elseif($creditordebit < 0){
  $node="Debit";
   $crd=substr($creditordebit, 1);;
}
    ?>
<tr>

    <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
    <td>{{ $receivepo->poreference }}</td>
    <td>{{ @$receivepo->expected_date}}</td>
    <td>{{ @$countqty}}</td>
    <td>{{@$recountqty}}</td>
    <td>@if($receivepo->remark){{$receivepo->remark}}@endif</td>
    <td>{{$receivepo->suppplierid}} / {{ucfirst($receivepo->supppliername)}}</td>
    <td>{{$node}}-{{$crd}}</td>
    <td><a title="Edit" href="{{ route('admin.edit_grn',['id'=>$receivepo->id]) }}" id="grn-edit"><i
                class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
        <a href="{{  route('admin.delete_grn',['id'=>$receivepo->id]) }}" class="delete-delete"><i class="fa fa-trash"
                style="color: maroon;"></i></a>
    </td>


</tr>
@endforeach
<tr>
    <td colspan="9">
        <div class="col-md-12">
            <div class="float-right">
                {{ $receivepodata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>