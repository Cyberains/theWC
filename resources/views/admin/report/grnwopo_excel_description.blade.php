<table>
	
	<thead>
		<tr>

			<th>Date</th>
			<th>GRNWOPO ID</th>
			<th>Supplier ID</th>
			<th>Supplier Name</th>
			<th>Carrier Name</th>
			<th>Invoice Number</th>
			<th>Invoice Value</th>
			<th>Invoice Date</th>
			<th>Delivery Date</th>
			<th>Product Name</th>
			<th>BarCode</th>
			<th>HSN Code</th>
			<th>MRP Price(Rupees)</th>
			<th>Basic Price(Rupees)</th>
			<th>Cost Price(Rupees)</th>
			<th>SV Sell Price(Rupees)</th>
			<th>EB Sell Price(Rupees)</th>
			<th>Quantity</th>
			<th>SGST(%)</th>
			<th>CGST(%)</th>
			<th>CESS(%)</th>
			<th>Tax(Rupees)</th>
			<th>Taxable Amount(Rs)</th>
			<th>Total Amount(Rs)</th>
			<th>MFg. Date</th>
			<th>Expiry Date</th>

		</tr>
	</thead>
	<tbody>
		
		@foreach($invoices as $invoice)

			{{ $qty =0 }}
			@for($i=0;$i<(count(json_decode($invoice->barcode)));$i++)



				{{$skucode =  json_decode($invoice->barcode)[$i] }}
				{{$hsncode =  json_decode($invoice->hsn_sac)[$i] }}
		
		
				{{ $basic_price = json_decode($invoice->unit_price)[$i] }}
				{{ $mrp_price = json_decode($invoice->mrp_price)[$i] }}

				{{ $qty += json_decode($invoice->quantity)[$i]  }}

				{{ $gst_tax = (floatval($basic_price)-(floatval($basic_price)*100/(100+floatval(json_decode($invoice->unit_gst)[$i]))))*floatval(json_decode($invoice->quantity)[$i]) }}


				{{ $others_tax = (floatval($basic_price)-(floatval($basic_price)*100/(100+floatval(json_decode($invoice->unit_others)[$i]))))*floatval(json_decode($invoice->quantity)[$i]) }}

				<tr>					
					<td>{{ date('d-m-Y h:i A',strtotime($invoice->created_at)) }}</td>
					<td>{{ $invoice->lr_number }}</td>
					<td>{{ $invoice->supplierName->supplier_id }}</td>
					<td>{{ $invoice->supplierName->supplier_name }}</td>
					<td>{{ $invoice->carrier_name }}</td>
					<td>{{ $invoice->invoice_number }}</td>
					<td>{{ $invoice->invoice_value }}</td>
					<td>{{ $invoice->invoice_date }}</td>
					<td>{{ $invoice->delivery_date }}</td>
					<td>{{ json_decode($invoice->product_name)[$i] }}</td>
					<td>{{ $skucode }}</td>
					<td>{{ $hsncode }}</td>
					<td>{{ $mrp_price }}</td>
					<td>{{ $basic_price }}</td>
					<td>{{ json_decode($invoice->cost_price)[$i] }}</td>
					<td>{{ json_decode($invoice->sv_sell_price)[$i] }}</td>
					<td>{{ json_decode($invoice->eb_sell_price)[$i] }}</td>
					<td>{{ json_decode($invoice->quantity)[$i] }}</td>				
					<td>{{ json_decode($invoice->sgst)[$i] }}</td>				
					<td>{{ json_decode($invoice->cgst)[$i] }}</td>				
					<td>{{ json_decode($invoice->cess)[$i] }}</td>				
					<td>{{ json_decode($invoice->tax)[$i] }}</td>				
					<td>{{ json_decode($invoice->amount)[$i] }}</td>				
					<td>{{ floatval(json_decode($invoice->amount)[$i])+floatval(json_decode($invoice->tax)[$i]) }}</td>				
					<td>{{ json_decode($invoice->mfg_date)[$i] }}</td>				
					<td>{{ json_decode($invoice->exp_date)[$i] }}</td>
					

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

