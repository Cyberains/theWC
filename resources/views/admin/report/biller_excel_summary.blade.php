<table>
	
	<thead>
		<tr>
			<th>Date</th>
			<th>Biller Name</th>
			<th>Receipt ID</th>
			<th>Total Quantity</th>
			<th>GST_Tax(Rupees)</th>
			<th>Others_Tax(Rupees)</th>
			<th>Total Tax(Rupees)</th>
			<th>Taxable Amount(Rupees)</th>
			<th>Grand_Total(Rupees)</th>
			<th>EB Coupon</th>
			<th>Cash</th>
			<th>Card</th>
			<th>Paytm</th>
			<th>Phone Pay</th>
			<th>Google Pay</th>
			<th>Amazon pay</th>
			<th>Credit Note(Rupees)</th>
		</tr>
	</thead>
	<tbody>
		
		@php
            $total_cgst_tax =0;
            $total_sgst_tax =0;

            $_0_gst_tax = 0;
            $_0_taxable_amount=0;
            $_0_cgst_tax=0;
            $_0_sgst_tax=0;
            $_0_total_tax=0;

            $_5_gst_tax = 0;
            $_5_taxable_amount=0;
            $_5_cgst_tax=0;
            $_5_sgst_tax=0;
            $_5_total_tax=0;

            $_12_gst_tax = 0;
            $_12_taxable_amount=0;
            $_12_cgst_tax=0;
            $_12_sgst_tax=0;
            $_12_total_tax=0;

            $_18_gst_tax = 0;
            $_18_taxable_amount=0;
            $_18_cgst_tax=0;
            $_18_sgst_tax=0;
            $_18_total_tax=0;

            $_28_gst_tax = 0;
            $_28_taxable_amount=0;
            $_28_cgst_tax=0;
            $_28_sgst_tax=0;
            $_28_total_tax=0;
            
        @endphp
		@foreach($invoices as $invoice)

			{{ $gst_tax=0 }}
			{{ $others_tax=0 }}
			{{ $qty =0 }}
			{{ $amount=0 }}

			@for($i=0;$i<(count(json_decode($invoice->barcode)));$i++)


				{{$skucode =  json_decode($invoice->barcode)[$i] }}
				{{$hsncode =  json_decode($invoice->hsn_sac)[$i] }}
				{{$discount = json_decode($invoice->discount)[$i] }}
		
				{{ $price = json_decode($invoice->price)[$i] }}
				{{ $mrp_price = json_decode($invoice->mrp_price)[$i] }}

				{{ $qty += json_decode($invoice->quantity)[$i]  }}

				{{ $gst_tax += (floatval($price)-(floatval($price)*100/(100+floatval(json_decode($invoice->unit_gst)[$i]))))*floatval(json_decode($invoice->quantity)[$i]) }}

				{{ $amount += floatval(json_decode($invoice->amount)[$i])  }}


				{{ $others_tax += (floatval($price)-(floatval($price)*100/(100+floatval(json_decode($invoice->unit_others)[$i]))))*floatval(json_decode($invoice->quantity)[$i]) }}

				@php

                $total_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
                $total_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);

	            @endphp            

	            @if (intval(json_decode($invoice->unit_gst)[$i]==0))

	                @php
	                
	                    $_0_gst_tax = json_decode($invoice->unit_gst)[$i];
	                    $_0_taxable_amount += floatval(json_decode($invoice->amount)[$i]);
	                    $_0_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_0_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_0_total_tax += floatval(json_decode($invoice->tax)[$i]);

	                @endphp

	            @elseif(intval(json_decode($invoice->unit_gst)[$i]==5))

	                @php
	                
	                    $_5_gst_tax = json_decode($invoice->unit_gst)[$i];
	                    $_5_taxable_amount += floatval(json_decode($invoice->amount)[$i]);
	                    $_5_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_5_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_5_total_tax += floatval(json_decode($invoice->tax)[$i]);

	                @endphp

	            @elseif(intval(json_decode($invoice->unit_gst)[$i]==12))

	                @php
	                
	                    $_12_gst_tax = json_decode($invoice->unit_gst)[$i];
	                    $_12_taxable_amount += floatval(json_decode($invoice->amount)[$i]);
	                    $_12_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_12_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_12_total_tax += floatval(json_decode($invoice->tax)[$i]);

	                @endphp

	            @elseif(intval(json_decode($invoice->unit_gst)[$i]==18))

	                @php
	                
	                    $_18_gst_tax = json_decode($invoice->unit_gst)[$i];
	                    $_18_taxable_amount += floatval(json_decode($invoice->amount)[$i]);
	                    $_18_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_18_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_18_total_tax += floatval(json_decode($invoice->tax)[$i]);

	                @endphp

	            @elseif(intval(json_decode($invoice->unit_gst)[$i]==28))

	                @php
	                
	                    $_28_gst_tax = json_decode($invoice->unit_gst)[$i];
	                    $_28_taxable_amount += floatval(json_decode($invoice->amount)[$i]);
	                    $_28_cgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_28_sgst_tax += floatval(json_decode($invoice->tax)[$i]/2);
	                    $_28_total_tax += floatval(json_decode($invoice->tax)[$i]);

	                @endphp
	                            
	            @endif



			@endfor

			<tr>
		
				<td>{{ date('d-m-Y h:i A',strtotime($invoice->created_at)) }}</td>
				<td>{{ $invoice->billerName->name }}</td>
				<td>{{ $invoice->receipt_id }}</td>
				<td>{{ $qty }}</td>
				<td>{{ number_format($gst_tax,2) }}</td>
				<td>{{ number_format($others_tax,2) }}</td>
				<td>{{ $invoice->total_tax }}</td>
				<td>{{ $invoice->subtotal }}</td>
				<td>{{ $invoice->grand_total }}</td>
				
				@if($invoice->eb_coupon_method=='Eb Coupon')

					<td>{{ $invoice->eb_coupon_cash }}</td>
				@else
					<td></td>
				@endif

				@if($invoice->payment_method=='COD' && $invoice->payment_method1==null && $invoice->eb_coupon_method==null)

					<td>{{ $invoice->grand_total }}</td>

				@elseif($invoice->payment_method=='COD' && ($invoice->payment_method1!=null || $invoice->eb_coupon_method!=null))

					<td>{{ $invoice->received_cash }}</td>

				@else

					<td></td>

				@endif

				@if($invoice->payment_method=='Card')

					<td>{{ $invoice->received_cash }}</td>

				@elseif($invoice->payment_method1=='Card')
					<td>{{ $invoice->received_cash1 }}</td>
				@else
					<td></td>
				@endif

				@if($invoice->payment_method=='Paytm Wallet')

					<td>{{ $invoice->received_cash }}</td>

				@elseif($invoice->payment_method1=='Paytm Wallet')

					<td>{{ $invoice->received_cash1 }}</td>

				@else
					<td></td>
				@endif

				@if($invoice->payment_method=='Phone Pay')

					<td>{{ $invoice->received_cash }}</td>

				@elseif($invoice->payment_method1=='Phone Pay')

					<td>{{ $invoice->received_cash1 }}</td>
					
				@else
					<td></td>
				@endif

				@if($invoice->payment_method=='Google Pay')

					<td>{{ $invoice->received_cash }}</td>

				@elseif($invoice->payment_method1=='Google Pay')

					<td>{{ $invoice->received_cash1 }}</td>
					
				@else
					<td></td>
				@endif

				@if($invoice->payment_method=='Amazon Pay')

					<td>{{ $invoice->received_cash }}</td>

				@elseif($invoice->payment_method1=='Amazon Pay')

					<td>{{ $invoice->received_cash1 }}</td>
					
				@else
					<td></td>
				@endif

				<td>{{ $invoice->cn_rupees }}</td>



			</tr>

		@endforeach

	</tbody>
</table>
<table>
	<tr></tr>
	<tr></tr>
	<tr></tr>
</table>
<table>
	<thead>
		<tr>

			<th>GST(%)</th>
			<th>Taxable Amount(Rupees)</th>
			<th>SGST Tax(Rupees)</th>
			<th>CGST Tax(Rupees)</th>
			<th>Total GST Tax(Rupees)</th>

		</tr>
		
	</thead>
	<tbody>
		

        @if($_0_taxable_amount !=0)
        <tr>
            <td>{{ $_0_gst_tax }}</td>
            <td>{{ $_0_taxable_amount }}</td>
            <td>{{ $_0_cgst_tax }}
                </td>
            <td>{{ $_0_sgst_tax }}
                </td>
            <td>{{ $_0_total_tax }}
                </td>

        </tr>
        @endif

        @if($_5_taxable_amount !=0)
        <tr>
            <td>{{ $_5_gst_tax }}</td>
            <td>{{ $_5_taxable_amount }}</td>
            <td>{{ $_5_cgst_tax }}
                </td>
            <td>{{ $_5_sgst_tax }}
                </td>
            <td>{{ $_5_total_tax }}
                </td>

        </tr>
        @endif

        @if($_12_taxable_amount !=0)
        <tr>
            <td>{{ $_12_gst_tax }}</td>
            <td>{{ $_12_taxable_amount }}</td>
            <td>{{ $_12_cgst_tax }}
                </td>
            <td>{{ $_12_sgst_tax }}
                </td>
            <td>{{ $_12_total_tax }}
                </td>

        </tr>
        @endif

        @if($_18_taxable_amount !=0)
        <tr>
            <td>{{ $_18_gst_tax }}</td>
            <td>{{ $_18_taxable_amount }}</td>
            <td>{{ $_18_cgst_tax }}
                </td>
            <td>{{ $_18_sgst_tax }}
                </td>
            <td>{{ $_18_total_tax }}
                </td>

        </tr>
        @endif

        @if($_28_taxable_amount !=0)
        <tr>
            <td>{{ $_28_gst_tax }}</td>
            <td>{{ $_28_taxable_amount }}</td>
            <td>{{ $_28_cgst_tax }}
                </td>
            <td>{{ $_28_sgst_tax }}
                </td>
            <td>{{ $_28_total_tax }}
                </td>

        </tr>
        @endif
	</tbody>
</table>

