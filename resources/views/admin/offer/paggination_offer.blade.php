@foreach ($offerdata as $offer)
    <tr>
        <td>{{ (($currentpage-1)*25)+$loop->iteration }}</td>
        <td>{{ $offer->offer_id }}</td>
        <td>{{ $offer->productName->title }}</td>
        <td>{{ $offer->productAttrName->mrp_price }}</td>
        <td>{{ $offer->selling_price }}</td>
        <td>{{ $offer->today_price }}</td>
        <td>{{ $offer->start_date }}</td>
        <td>{{ $offer->end_date }}</td>
        <td>

            <a title="Edit" href="javascript:void(0)" onclick="offeredit( {{ $offer->id }} )"
            id="offer-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
            
            <a href="{{ route('admin.delete_today_offer',['id'=>$offer->id]) }}"  id="offer-delete" onclick="return confirm('Are you sure, you want to delete this offer?')"><i class="fa fa-trash" style="color: maroon;"></i></a>
          
        </td>
              
      </tr>
  @endforeach

  <tr>
    <td colspan="12" align="center">
        <div class="col-md-12">
            <div class="float-right">
                {{ $offerdata->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </td>
</tr>