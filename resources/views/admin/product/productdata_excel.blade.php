<table>
	
	<thead>
		<tr>
			<th>Category</th>
	        <th>Sub_Category</th>
	        <th>Brand</th>
	        <th>Sub_Brand</th>
	        <th>Manufacturer</th>
	        <th>Bar_Code</th>
	        <th>Title</th>
	        <th>HSN_Code</th>
	        <th>Sub_Category_Type</th>
	        <th>Description</th>
	        <th>SGST_Tax</th>
	        <th>CGST_Tax</th>
	        <th>IGST_Tax</th>
	        <th>UGST_Tax</th>
	        <th>CESS_Tax</th>
	        <th>APMC_Tax</th>
	        <th>MRP_Price</th>
	        <th>Selling_Price </th>
	        <th>Membership_Price</th>
	        <th>Cost_Price</th>
	        <th>SV_Sell_Price</th>
	        <th>Aisle</th>
	        <th>Rack</th>
	        <th>Shelf</th>
	        <th>Weight</th>
	        <th>Unit</th>
	        <th>Net Stock</th>
	        <th>Mfg_Date</th>
	        <th>Expiry_Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productdata as $product)

			@foreach($product->productAttributeNames as $productattr)

				@foreach($productattr->productExpiry as $productexpiry)

					<tr>
						<td>{{ @$product->categoryName->title }}</td>
						<td>{{ @$product->SubCategoryName->title }}</td>
						<td>{{ @$product->BrandName->title }}</td>
						<td>{{ @$product->SubBrandName->title }}</td>			
						<td>{{ @$product->ManufacturerName->title }}</td>			
						<td>{{ $productattr->barcode_id }}</td>
						<td>{{ $product->title }}</td>				
						<td>{{ $product->hsn_code }}</td>				
						<td>{{ $product->package_type }}</td>				
						<td>{{ $product->description }}</td>				
						<td>{{ @$product->sgstName->gst_rate }}</td>				
						<td>{{ @$product->cgstName->gst_rate }}</td>
						<td>{{ @$product->igstName->gst_rate }}</td>
						<td>{{ @$product->ugstName->gst_rate }}</td>
						<td>{{ @$product->cessName->gst_rate }}</td>
						<td>{{ @$product->apmcName->gst_rate }}</td>
						<td>{{ $productattr->mrp_price }}</td>
						<td>{{ $productattr->selling_price }}</td>
						<td>{{ $productattr->membership_price }}</td>
						<td>{{ $productattr->cost_price }}</td>
						<td>{{ $productattr->eb_cost_price }}</td>
						<td>{{ $productexpiry->aisle }}</td>
						<td>{{ $productexpiry->rack }}</td>
						<td>{{ $productexpiry->shelf }}</td>
						<td>{{ $productattr->unit }}</td>
						<td>{{ $productattr->unit_check }}</td>
						<td>{{ $productexpiry->quantity }}</td>
						<td>{{ $productexpiry->mfg_date }}</td>
						<td>{{ $productexpiry->expiry_date }}</td>			

					</tr>
				@endforeach

			@endforeach

		@endforeach

	</tbody>
</table>

