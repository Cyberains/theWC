@extends('admin.includes.main')
@section('title')
    
    <title>Sale View | Billing Management</title>


@endsection

@section('style')
  
  <style type="text/css">
    

  </style>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Billing Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Generate Offline Billing</li>

@endsection

@section('btitle2')
    
    <li class="breadcrumb-item">View</li>

@endsection

@section('body')
  <div class="container-fluid">
    <div class="fade-in">     
      <div class="row bg-white mx-0 py-3 mb-4">
            <div class="col-md-3 d-flex">
              <strong>Biller Name : </strong>
              <p class="pl-2" class="pl-2">{{ $offlinebillingdata->billerName->name }}</p>
            </div>
            <div class="col-md-3 d-flex">
              <strong>Buyer Name : </strong>
              <p class="pl-2">{{ $offlinebillingdata->name }}</p>
            </div>
            <div class="col-md-3 d-flex">
              <strong>Receipt ID : </strong>
              <p class="pl-2">{{ $offlinebillingdata->receipt_id }}</p>
            </div>
            <div class="col-md-3 d-flex">
              <strong>Taxable Amount(<i class="fa fa-rupee"></i>): </strong>
              <p class="pl-2">{{ $offlinebillingdata->subtotal }}/-</p>
            </div>
            <div class="col-md-3 d-flex">
              <strong>Total Tax(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->total_tax }}/-</p>
            </div>
            <div class="col-md-3 d-flex">
              <strong>Grand Total(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->grand_total }}/-</p>
            </div>
            @if($offlinebillingdata->eb_coupon_method=='Eb Coupon')
            <div class="col-md-3 d-flex">
              <strong>EB Coupon(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->eb_coupon_cash }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='COD')
            <div class="col-md-3 d-flex">
              <strong>Received Cash(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='Card')
            <div class="col-md-3 d-flex">
              <strong>Card(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @elseif($offlinebillingdata->payment_method1=='Card')
              <div class="col-md-3 d-flex">
              <strong>Card(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash1 }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='Paytm Wallet')
            <div class="col-md-3 d-flex">
              <strong>Paytm Wallet(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @elseif($offlinebillingdata->payment_method1=='Paytm Wallet')
              <div class="col-md-3 d-flex">
              <strong>Paytm Wallet(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash1 }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='Phone Pay')
            <div class="col-md-3 d-flex">
              <strong>Phone Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @elseif($offlinebillingdata->payment_method1=='Phone Pay')
              <div class="col-md-3 d-flex">
              <strong>Phone Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash1 }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='Google Pay')
            <div class="col-md-3 d-flex">
              <strong>Google Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @elseif($offlinebillingdata->payment_method1=='Google Pay')
              <div class="col-md-3 d-flex">
              <strong>Google Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash1 }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='Amazon Pay')
            <div class="col-md-3 d-flex">
              <strong>Amazon Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash }}/-</p>
            </div>
            @elseif($offlinebillingdata->payment_method1=='Amazon Pay')
              <div class="col-md-3 d-flex">
              <strong>Amazon Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->received_cash1 }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->cn_rupees!=null)
            <div class="col-md-3 d-flex">
              <strong>Amazon Pay(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ $offlinebillingdata->cn_rupees }}/-</p>
            </div>
            @endif

            @if($offlinebillingdata->payment_method=='COD' && $offlinebillingdata->eb_coupon_method==null && $offlinebillingdata->payment_method1 == null)
            <div class="col-md-3 d-flex">
              <strong>Return Cash(<i class="fa fa-rupee"></i>) : </strong>
              <p class="pl-2">{{ number_format($offlinebillingdata->received_cash-$offlinebillingdata->grand_total,2)}}/-</p>
            </div>
            @endif
        
            <div class="col-md-12">
              <table class="table" id="multiple_select">
                <thead class="table-primary">
                    <tr>
                      <td class="barcode_display">BarCode</td>
                      <td style="width: 200px;">Product Name</td>
                      <td style="width: 120px;">MRP Price (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td id="customer_price">Selling Price (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Weight</td>
                      <td class="discount_display">Discount(%)</td>
                      <td>Expiry Date</td>
                      <td>Qty.</td>
                      <td>Tax(<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Amount (<small><i class="fa fa-rupee"></i></small>) </td>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ $total_disc =0 }} --}}
                    @for($i=0;$i<(count(json_decode($offlinebillingdata->barcode)));$i++)

                    {{-- {{ $total_disc += (floatval(json_decode($offlinebillingdata->mrp_price)[$i])-floatval(json_decode($offlinebillingdata->price)[$i]))*floatval(json_decode($offlinebillingdata->quantity)[$i])}} --}}
                    
                    <tr>
                        <td>{{ json_decode($offlinebillingdata->barcode)[$i] }}</td>
                        <td class="item_name">{{ json_decode($offlinebillingdata->product_name)[$i] }}</td>
                        <td>{{ number_format(json_decode($offlinebillingdata->mrp_price)[$i],2) }}</td>
                        <td>{{ number_format(json_decode($offlinebillingdata->price)[$i],2) }}</td>
                        <td >{{ json_decode($offlinebillingdata->weight)[$i] }}</td>
                        <td >{{ json_decode($offlinebillingdata->discount)[$i] }}</td>
                        <td >{{ json_decode($offlinebillingdata->expiry_date)[$i] }}</td>
                        <td>
                            @if($offlinebillingdata->unit_check !=null && json_decode($offlinebillingdata->unit_check)[$i] != 'nos')

                                @if(json_decode($offlinebillingdata->quantity)[$i]>=1 && (json_decode($offlinebillingdata->unit_check)[$i] == 'gm'||json_decode($offlinebillingdata->unit_check)[$i] == 'kg'))

                                    {{ floatval(json_decode($offlinebillingdata->quantity)[$i]) }}{{ ' kg' }}

                                @elseif(json_decode($offlinebillingdata->quantity)[$i]<1 && (json_decode($offlinebillingdata->unit_check)[$i] == 'gm'||json_decode($offlinebillingdata->unit_check)[$i] == 'kg'))

                                    {{ floatval(json_decode($offlinebillingdata->quantity)[$i])*1000 }}{{ ' gm' }}

                                @elseif(json_decode($offlinebillingdata->quantity)[$i]>=1 && (json_decode($offlinebillingdata->unit_check)[$i] == 'ml'||json_decode($offlinebillingdata->unit_check)[$i] == 'ltr'))

                                    {{ floatval(json_decode($offlinebillingdata->quantity)[$i]) }}{{ ' gm' }}{{ ' ltr' }}

                                @elseif(json_decode($offlinebillingdata->quantity)[$i]<1 && (json_decode($offlinebillingdata->unit_check)[$i] == 'ml'||json_decode($offlinebillingdata->unit_check)[$i] == 'ltr'))

                                    {{ floatval(json_decode($offlinebillingdata->quantity)[$i])*1000 }}{{ ' gm' }}{{ ' ml' }}
                                     
                                @endif
                            @else
                                    {{ floatval(json_decode($offlinebillingdata->quantity)[$i]) }}
                            @endif
                        </td>
                        
                        <td>{{ json_decode($offlinebillingdata->tax)[$i] }}</td>
                        <td>{{ json_decode($offlinebillingdata->amount)[$i] }}</td>

                    </tr>

                    @endfor

                </tbody>
              </table>
          </div>                    
        </div> 
      <!-- /.row-->
    </div>


  </div>

@endsection

@section('modal')
  
@endsection

@section('script')
  
  <script type="text/javascript">
      
  </script>

@endsection
