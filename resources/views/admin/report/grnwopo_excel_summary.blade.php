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
			<th>Total Quantity</th>
			<th>Taxable Amount(Rs.)</th>
			<th>Total Tax(Rs.)</th>
			<th>Grand Total(Rs.)</th>

		</tr>
	</thead>
	<tbody>
		@foreach($invoices as $invoice)
			{{ $tqty =0 }}
			@for($i=0;$i<(count(json_decode($invoice->barcode)));$i++)
			
				
				{{$tqty +=  floatval(json_decode($invoice->quantity)[$i]) }}

			@endfor

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
				<td>{{ $tqty }}</td>
				<td>{{ $invoice->sub_total }}</td>
				<td>{{ $invoice->total_tax }}</td>
				<td>{{ $invoice->grand_total }}</td>
			</tr>

		@endforeach

	</tbody>
</table>

