 @foreach ($gstratedata as $gst)

 <tr>
     <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
     <td>{{ $gst->gst_type }} </td>
     <td>{{ $gst->gst_rate }}</td>
     @if(Auth::user()->role == 'admin')
     <td>

         <a title="Edit" href="javascript:void(0)" onclick="gstedit( {{ $gst->id }} )" id="gst-edit"><i
                 class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

         <a href="javascript:void(0)" data-url="{{ route('admin.delete_gst',['id'=>$gst->id]) }}" class="gst-delete"><i
                 class="fa fa-trash" style="color: maroon;"></i></a>

     </td>
     @endif
     @endforeach
 <tr>
     <td colspan="5" align="center">
         <div class="col-md-12">
             <div class="float-right">
                 {{ $gstratedata->links('vendor.pagination.bootstrap-4') }}
             </div>
         </div>
     </td>
 </tr>