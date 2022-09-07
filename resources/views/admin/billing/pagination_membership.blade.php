@foreach ($membershipcarddata as $membershipcard)
    <tr>
        <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
        <td>@if($membershipcard->cart_number){{$membershipcard->cart_number}}@endif</td>
        <td>@if($membershipcard->user_id)
            {{$membershipcard->user->name}}@endif</td>
        <td>@if($membershipcard->start_date){{$membershipcard->start_date}}@endif</td>
        <td>@if($membershipcard->end_date){{$membershipcard->end_date}}@endif</td>

         
          <td>@if($membershipcard->status==0)
            <div class="inactive-color">Not Assigned</div>
            @elseif($membershipcard->status==1)
             <div class="active-color">Assigned</div>
             @else
             <div class="expired-color">Expired</div>
          @endif</td>
        <td>
          <a title="Membership Id Assigned" href="javascript:void(0)"  onclick="membershipcardedit({{$membershipcard->id}})"  id="membershipcard-edit"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i></a>&nbsp&nbsp
                                     
         <a href="{{ route('admin.delete_membershipcard',['id'=>$membershipcard->id]) }}"  id="membershipcart-delete" onclick="return confirm('Are you sure, you want to delete this membership card?')"><i class="fa fa-trash" style="color: maroon;"></i></a>
          
        </td>
              
      </tr>
  @endforeach

  <tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $membershipcarddata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>