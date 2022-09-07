@foreach ($smsdata as $sms)
    <tr>
        <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
        <td>{{ $sms->mobile }}</td>
        <td>{{ $sms->message }}</td>
        <td>{{ $sms->failed  }}</td>
        <td>
         
         <a href="{{ route('admin.send_sms',['id'=>$smsdata->id]) }}"  id="sms-send" onclick="return confirm('Are you sure, you want to resend this failed sms?')"><i class="fa fa-sms" style="color: maroon;"></i></a>

         <a title="resend" href="{{ route('admin.delete_sms',['id'=>$smscard->id]) }}" id="sms-delete" onclick="return confirm('Are you sure, you want to delete this sms?')"><i class="fa fa-trash" style="color: maroon;"></i></a>
          
        </td>
              
      </tr>
  @endforeach

  <tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $smsddata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>