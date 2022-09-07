  <style type="text/css">
      

    .table tr th,.table tr td{

        padding-top: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        padding-right: 0px;
        font-size: 12px;
        text-align: center;


    }

    .total{

        font-size: 14px;
    }

    .total tr td, .total tr th{

        text-align: left;
    }


    .supplier{

        width: 50%;
        font-size: 14px;
    }
    .supplier tr th,.supplier tr td{

        text-align: left;
        vertical-align: top;
    }

    .supplier tr td{

        word-break:break-all;
    }

  </style>
          <div style="text-align: center;border-bottom:2px solid black">
             <h3>PURCHASE ORDER</h3>
          </div>
          <div>
            <h3>Shri Vinayak Associates India Pvt Ltd</h3>
            <div style="float:left;padding-top:10px">            
                <table>                  
                    <tr><th align="left">Phone:</th><td>9717171429</td></tr>
                    <tr><th align="left">Email:</th><td>admin@earlybasket.com</td></tr>
                    <tr><th align="left" valign="top">address:</th><td>Shop No-18,Suncity Avenue,<br>Sector-102,Gurgaon,Haryana,<br>122001</td></tr>
                </table> 
            </div>
            <div style="float:right;padding-top:10px">
               <table>
                    <tr>
                        <th align="left">Purchase ID:</th><td>{{ $purchasedata->purchase_id }}</td>

                    </tr>
                    <tr>
                        <th align="left">Date:</th><td>{{ date('yy-m-d',strtotime($purchasedata->created_at)) }}</td>

                    </tr>
               </table>               
            </div>
            <div style="clear:both;border-bottom:2px solid black;margin-top:10px">

            </div>
          </div>
        <div>
            <table>
                
            </table>
        </div>
        <div style="padding-top:20px;float:left">
           <table class="supplier" >
               
                <tr>
                        <th align="left">Supplier Info:</th>
                    
                <tr>

                    <th>ID:</th><td>{{ $purchasedata->supplierName->supplier_id }}</td>
                </tr>
                <tr>

                    <th>Name:</th><td>{{ $purchasedata->supplierName->supplier_name }}</td>
                </tr>
                <tr>
                    <th>Address:</th><td>{{ $purchasedata->supplierName->supplier_address }}</td>

                </tr>
                <tr>
                    <th align="left">Telephone No:</th><td>{{ $purchasedata->supplierName->supplier_mobile }}</td>
                </tr>
                <tr>
                    <th align="left">GSTIN:</th><td>{{ $purchasedata->supplierName->gst_in }}</td>
                </tr>                    
            </table> 
        </div>
        <div style="padding-top:20px;float:right">
            <table class="supplier">
                   
                    <tr>
                        <th align="left">Ship To:</th>
                    </tr>
                    <tr>
                        <th align="left">Name:</th>
                        <td>{{ $purchasedata->ship_to }}</td>
                    </tr>
                    <tr>
                        <th align="left">Address:</th><td>{{ $purchasedata->ship_address }}</td>
                    </tr>
                
                    <tr>
                        <th align="left">Telephone No:</th><td>9717171429</td>
                    </tr>
                    <tr>
                        <th align="left">GSTIN:</th><td>06ABFCS3618H1ZD</td>
                    </tr>
                   
                    

            </table>
        </div>

        <div style="clear:both">
        </div>
            
        <div style="padding-top:30px;">
            <table class="table" align="center" cellspacing="0" border="1">

                <tr>
                    <th style="width:50px">SKU</th>
                    <th style="width:50px">Desc</th>
                    <th style="width:40px">Qty.</th>
                    <th style="width:50px">Weight</th>
                    <th style="width:40px">MRP Price</th>
                    <th style="width:40px">Basic Price</th>
                    <th style="width:50px">Amt</th>
                    <th style="width:40px">SGST (%)</th>
                    <th style="width:40px">CGST (%)</th>
                    <th style="width:40px">IGST (%)</th>
                    <th style="width:40px">CESS (%)</th>
                    <th style="width:40px">APMC (%)</th>
                    <th style="width:40px">UTGST (%)</th>
                    <th style="width:50px">Total(with Tax)</th>
                </tr>
            
                {{ $quantity =0 }}
                @for($i=0;$i<(count(json_decode($purchasedata->sku_code)));$i++)

                    {{ $skucode = json_decode($purchasedata->sku_code)[$i] }}
                    

                    {{ $quantity += intval(json_decode($purchasedata->quantity)[$i]) }}
       
                <tr>
                    <td width="50px">{{ json_decode($purchasedata->sku_code)[$i] }}</td>
                    <td width="50px">{{ json_decode($purchasedata->product_name)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->quantity)[$i] }}</td>
                    <td width="50px">{{ json_decode($purchasedata->weight)[$i] }}</td>
                    <td width="40px">{{ number_format((App\Models\ProductAttribute::find(json_decode($purchasedata->mrp_price)[$i])->mrp_price),2) }}</td>
                    <td width="40px">{{ number_format(floatval(json_decode($purchasedata->basic_price)[$i]),2) }}</td>
                    <td width="50px">{{ number_format(floatval(json_decode($purchasedata->amount)[$i]),2) }}</td>
                    <td width="40px">{{ json_decode($purchasedata->sgst_tax)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->cgst_tax)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->igst_tax)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->ugst_tax)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->cess_tax)[$i] }}</td>
                    <td width="40px">{{ json_decode($purchasedata->apmc_tax)[$i] }}</td>
                    <td width="50px">{{ number_format(floatval(json_decode($purchasedata->tax_price)[$i])+floatval(json_decode($purchasedata->amount)[$i]),2) }}</td>
                </tr>
               
                @endfor



        </table>
        </div>

        <div style="border-bottom:1px solid black;">

                <table style="padding-top:10px" class="total" >
                    <tr>

                
                        <th>Total Order Quantity:</th>
                        <td>{{ $quantity }}</td>

                    </tr>
                    <tr>

                
                        <th>Total Amount:</th>
                        <td>{{ $purchasedata->sub_total }}</td>

                    </tr>
                    <tr>

                
                        <th>Total Tax:</th>
                        <td>{{ $purchasedata->total_tax }}</td>

                    </tr>
                    <tr>

                
                        <th>Total PO Amount:</th>
                        <td>{{ $purchasedata->grand_total }}</td>

                    </tr>
                    <tr>
                        <th>Round Off Value:</th>
                        <td>{{ number_format(floatval($purchasedata->grand_total)-floor(floatval($purchasedata->grand_total)),2) }}</td>
                    </tr>
                    <tr>
                        <th>Total Amount:</th>
                        <td>{{ number_format(round(floatval($purchasedata->grand_total)),2) }}</td>
                    </tr>
                        
                </table>

        </div>
        <div style="padding-top: 5px;border-bottom:1px solid black">

            <p style="margin-top: 0px;"><strong>Amount In Words:</strong><strong style="padding-left: 10px;">{{ numberTowords(round(floatval($purchasedata->grand_total))) }}</strong></p>

        </div>
        <div style="text-align: right">
            <h4 style="margin-bottom: 50px;margin-top: 5px">For Shri Vinayak Associates India Pvt Ltd</h4>
            <h4>Authorized Signatory</h4>
        </div>