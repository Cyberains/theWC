<table>
	
	<thead>
		<tr>
			<th>PO Date</th>
			<th>PO Number</th>
			<th>Supplier ID</th>
			<th>Supplier Name</th>
			<th>SKU Code</th>
			<th>Product Name</th>
			<th>Brand</th>
			<th>Category</th>
			<th>SubCategory</th>
			<th>PO Qty.</th>
			<th>Unit Price with Tax</th>
			<th>Unit Price without Tax</th>
			<th>MRP</th>
			<th>Pre Tax PO Amount</th>
			<th>Tax</th>
			<th>After Tax PO Amount</th>
			<th>Qty Received</th>
		</tr>
	</thead>
	<tbody>
		@foreach($invoices as $invoice)

			@for($i=0;$i<(count(json_decode($invoice->sku_code)));$i++)

				{{$skucode =  json_decode($invoice->sku_code)[$i] }}

				{{ $tax = json_decode($invoice->unit_tax_percentage)[$i] }}
				{{ $basicprice = json_decode($invoice->basic_price)[$i] }}
				{{ $mrpid = json_decode($invoice->mrp_price)[$i] }}

				<tr>

					<td>{{ date('d-m-Y h:i A',strtotime($invoice->created_at)) }}</td>
					<td>{{ $invoice->purchase_id }}</td>
					<td>{{ $invoice->supplierName->supplier_id }}</td>
					<td>{{ $invoice->supplierName->supplier_name }}</td>
					<td>{{ json_decode($invoice->sku_code)[$i] }}</td>
					<td>{{ json_decode($invoice->product_name)[$i] }}</td>
					<td>{{ (App\Models\Product::with('brandName')->where('product_code',$skucode)->first())->brandName->title }}</td>
					<td>{{ (App\Models\Product::with('categoryName')->where('product_code',$skucode)->first())->categoryName->title }}</td>
					<td>{{ (App\Models\Product::with('SubCategoryName')->where('product_code',$skucode)->first())->SubCategoryName->title }}</td>
					<td>{{ json_decode($invoice->quantity)[$i] }}</td>				
					<td>{{ (floatval($tax)*floatval($basicprice)/100)+floatval($basicprice) }}</td>

					<td>{{ floatval($basicprice) }}</td>
					<td>{{ App\Models\ProductAttribute::find(intval($mrpid))->mrp_price }}</td>
					<td>{{ json_decode($invoice->amount)[$i] }}</td>			
					<td>{{ json_decode($invoice->unit_tax_percentage)[$i] }}</td>	
					<td>{{ floatval(json_decode($invoice->amount)[$i])+floatval(json_decode($invoice->tax_price)[$i]) }}</td>				

				</tr>

			 @endfor

		@endforeach

	</tbody>
</table>

