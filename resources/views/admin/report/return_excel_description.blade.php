<table>
	
	<thead>
		<tr>
			<th>Date</th>
			<th>Biller Name</th>
			<th>Return Receipt ID</th>
			<th>Receipt ID</th>
			<th>Product Name</th>
			<th>BarCode</th>
			<th>HSN Code</th>
			<th>MRP Price(Rupees)</th>
			<th>Price(Rupees)</th>
			<th>Discount(%)</th>
			<th>Quantity</th>
			<th>Expiry Date</th>
			<th>GST_Tax(Rupees)</th>
			<th>Others_Tax(Rupees)</th>
			<th>Amount(Rupees)</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($invoices as $invoice)

			{{ $qty =0 }}
			@for($i=0;$i<(count(json_decode($invoice->barcode)));$i++)



				{{$skucode =  json_decode($invoice->barcode)[$i] }}
				{{$hsncode =  json_decode($invoice->hsn_sac)[$i] }}
				{{$discount = json_decode($invoice->discount)[$i] }}
		
				{{ $price = json_decode($invoice->price)[$i] }}
				{{ $mrp_price = json_decode($invoice->mrp_price)[$i] }}

				{{ $qty += json_decode($invoice->returnqty)[$i]  }}

				{{ $gst_tax = (floatval($price)-(floatval($price)*100/(100+floatval(json_decode($invoice->unit_gst)[$i]))))*floatval(json_decode($invoice->returnqty)[$i]) }}


				{{ $others_tax = (floatval($price)-(floatval($price)*100/(100+floatval(json_decode($invoice->unit_others)[$i]))))*floatval(json_decode($invoice->returnqty)[$i]) }}

				<tr>					
					<td>{{ date('d-m-Y h:i A',strtotime($invoice->created_at)) }}</td>
					<td>{{ @$invoice->billerName->name }}</td>
					<td>{{ $invoice->receipt_id }}</td>
					<td>{{ $invoice->return_receipt_id }}</td>
					<td>{{ json_decode($invoice->product_name)[$i] }}</td>
					<td>{{ $skucode }}</td>
					<td>{{ $hsncode }}</td>
					<td>{{ $mrp_price }}</td>
					<td>{{ $price }}</td>
					<td>{{ $discount }}</td>
					<td>{{ json_decode($invoice->returnqty)[$i] }}</td>				
					<td>{{ json_decode($invoice->expiry_date)[$i] }}</td>
					@if($invoice->unit_gst!= null)
					<td>{{ number_format($gst_tax,2) }}</td>
					@else

					<td>{{ number_format(0) }}</td>	

					@endif
					@if($invoice->unit_others !=null)

						<td>{{ number_format($others_tax,2) }}</td>

					@else

						<td>{{ number_format(0) }}</td>

					@endif
					<td>{{ floatval(json_decode($invoice->amount)[$i]) }}</td>

				</tr>

			@endfor

			{{-- <tr>
				<th>Total Quantity</th>
				<td>{{ $qty }}</td>
				<td></td>
				<th>Total Amount</th>
				<td>{{ $invoice->subtotal }}/-</td>
				<td></td>
				<th>Total Tax</th>
				<td>{{ $invoice->total_tax }}/-</td>
				<td></td>
				<th>Grand Total</th>
				<td>{{ $invoice->grand_total }}/-</td>

			</tr> --}}
			<tr>

			</tr>

		@endforeach

	</tbody>
</table>

