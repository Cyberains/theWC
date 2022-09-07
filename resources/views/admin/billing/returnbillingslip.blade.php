<style type="text/css">
    
    .table tr th,.table tr td{

        padding-top: 0px;
        padding-bottom: 0px;
        font-size: 10px;


    }

    html{
        margin:20px 10px 20px 10px;
    }

    .bill-table{

        border-collapse:collapse;
    }
    
    .bill-table tr th,.bill-table tr td{

        padding-top: 2px;
        padding-bottom: 2px;
        font-size: 9px;
        text-align: center;
        padding-right: 4px;
        padding-left: 4px;
        border: dotted 1px #000000;
    }

    .bill-table .space-table{

        padding-left: 15px;
    }

    .item_name{

        width: 50px;
    }

</style>
<div style="text-align: center">
    <p style="margin:0px;padding:0px">Return Receipt Invoice</p>
    <span style="font-size:14px;">Early Basket</span>
</div>
<div style="text-align: center;font-size:12px;padding-top:5px;padding-bottom:10px;border-bottom: 1px dotted black">
    <span style="margin:0px;padding:0px"><strong>Regd.Off. : </strong>Shop No-18,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001</span>
    <p style="margin:0px;padding:0px">9717171429</p>
    <p style="margin:0px;padding:0px">admin@earlybasket.com</p>

    </table>               
</div>

@if($billingdata->mobile!=0)
********************************

<div style="font-size: 12px">
    <strong>Mobile No: {{ substr($billingdata->receiptName->mobile, 0, 2) }}*****{{ substr($billingdata->receiptName->mobile, 7, 4) }}</strong>
</div>
********************************
@endif
<div style="font-size: 12px;border-bottom: 1px dotted black;padding-top: 5px;">
    
    <div style="float:left;">
        <table class="table">

            <tr><th align="left">Receipt ID:</th><td>{{ $billingdata->retutrn_receipt_id }}</td>
            </tr>        
            <tr>

                <th align="left">Cashier Name:</th><td>{{ Auth::user()->name }}</td>
            </tr>    
        </table>
    </div>
    <div style="float:right;">
        <table class="table">

            <tr><th align="left">Date:</th><td>{{ date('Y/m/d',strtotime($billingdata->created_at)) }}</td></tr>
            <tr><th align="left">Time:</th><td>{{ date('h:i:s A',strtotime($billingdata->created_at)) }}</td></tr>
                           

        </table>
    </div>
    <div style="clear: both;">
        
    </div>
    
</div>

{{-- <div style="font-size:10px; padding-top:10px;padding-bottom:5px;border-bottom: 1px dotted black">
    <table class="bill-table">
        <tr>
            <th colspan="4">Item Name</th>
            <th class="space-table"></th>
            <th>Amount(Rs)</th>
        </tr>
        <tr>
            <th>SNo</th>
            <th>Qty.</th>
            <th>MRP(Rs)</th>
            <th>Disc(Rs)</th>
            <th class="space-table"></th>
            <th>(Incl.GST)</th>
        </tr>
        <tr>
            <th>HSN/SAC</th>
            <th>CGST(%)</th>
            <th>SGST(%)</th>
        </tr>

    </table>
</div>

<div style="font-size:12px; padding-top:10px;padding-bottom:5px;border-bottom: 1px dotted black">
    <table class="bill-table">
        @for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++)
        <tr>
            <td colspan="4">{{ json_decode($billingdata->product_name)[$i] }}</td>
            <td class="space-table"></td>
            <td></td>
        </tr>
        <tr>
            <td width="40px">{{ $i+1 }}</td>
            <td width="40px">{{ json_decode($billingdata->returnqty)[$i] }}</td>
            <td width="40px">{{ number_format(json_decode($billingdata->mrp_price)[$i],2) }}</td>
            <td width="30px">{{ number_format(floatval(json_decode($billingdata->mrp_price)[$i])-floatval(json_decode($billingdata->price)[$i]),2) }}</td>
            <td class="space-table"></td>
            <td>{{ number_format(floatval(json_decode($billingdata->tax)[$i])+floatval(json_decode($billingdata->amount)[$i]),2) }}</td>
        </tr>
        <tr>
            <td>{{ json_decode($billingdata->hsn_sac)[$i] }}</td>
            <td>{{ floatval(json_decode($billingdata->unit_tax)[$i])/2 }}</td>
            <td>{{ floatval(json_decode($billingdata->unit_tax)[$i])/2 }}</td>
        </tr>
        @endfor
    </table>
</div> --}}

<div style="font-size:10px; padding-top:10px;padding-bottom:5px;">
    <table class="bill-table">
        <tr>
            <th>Sr.No.</th>
            <th class="item_name">Product</th>
            <th>Weight</th>
            <th>Qty</th>
            <th>MRP</th>
            <th>Disc</th>
            <th>Net Amt</th>
        </tr>

        {{ $total_disc =0 }}
        @for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++)

        {{ $total_disc += (floatval(json_decode($billingdata->mrp_price)[$i])-floatval(json_decode($billingdata->price)[$i]))*floatval(json_decode($billingdata->returnqty)[$i]) }}



        
        <tr>
            <td>{{ $i+1 }}</td>
            <td class="item_name">{{ json_decode($billingdata->product_name)[$i] }}</td>

            <td >{{ json_decode($billingdata->weight)[$i] }}</td>
            <td>{{ json_decode($billingdata->returnqty)[$i] }} @if($billingdata->unit_check !=null && json_decode($billingdata->unit_check)[$i] != 'nos'){{ json_decode($billingdata->unit_check)[$i] }} @endif</td>

           
            <td>{{ number_format(json_decode($billingdata->mrp_price)[$i],2) }}</td>
            <td>{{ number_format(floatval(json_decode($billingdata->mrp_price)[$i])-floatval(json_decode($billingdata->price)[$i]),2) }}</td>
            <td>{{ number_format(floatval(json_decode($billingdata->tax)[$i])+floatval(json_decode($billingdata->amount)[$i]),2) }}</td>
        </tr>

        @endfor
    </table>
</div>


{{-- @if($billingdata->cn_status==1)
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px;text-align: right;">

    <p style="margin:0px;padding:0px"><strong>Credit Note : </strong>{{ number_format($billingdata->cn_rupees,2) }}/-</p>
      
</div>
@endif --}}


<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px">
   
    <div style="float: right;">
        <p style="margin:0px;padding:0px"><strong>Grand Total : </strong>{{ number_format($billingdata->grand_total,2) }}/-</p>
    </div>
    <div style="float: left;">
        <p style="margin:0px;padding:0px">{{ $totalqty }} Items</p>
    </div>
    <div style="clear: both;">
        
    </div>
      
</div>


{{-- @if($billingdata->payment_method=='COD')
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px;">

    <div style="float: left;">
        <p style="margin:0px;padding:0px"><strong>Paid Cash : </strong>{{ number_format($billingdata->received_cash,2) }}/-</p>
    </div>
    <div style="float: right;">

        <p style="margin:0px;padding:0px"><strong>Return Amount : </strong>{{ number_format($billingdata->received_cash-$billingdata->grand_total,2) }}/-</p>
      
    </div>
    <div style="clear: both;"></div>
    
</div>
@else
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px;">

    <div style="float: left;">
        <p style="margin:0px;padding:0px"><strong>Payment Mode : </strong>{{ $billingdata->payment_method }}</p>
    </div>
    <div style="float: right;">

        <p style="margin:0px;padding:0px"><strong>Return Amount : </strong>{{ number_format($billingdata->grand_total-$billingdata->grand_total,2) }}/-</p>
      
    </div>
    
    <div style="clear: both;"></div>
    
</div>
@endif --}}

{{-- <div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px;">

    <div>
        <p style="margin:0px;padding:0px">You have saved: <strong>{{ number_format($total_disc,2) }}/-</strong> rupees</p>
    </div>
</div> --}}

<div style="font-size:10px; padding-top:0px;padding-bottom:5px;">

    <h4 style="margin-top: 5px;margin-bottom: 5px;">Tax Details</h4>
    <table class="bill-table">
        <tr>
            <th>GST Tax(%)</th>
            <th>Taxable Amount</th>
            <th>CGST Tax</th>
            <th>SGST Tax</th>
            <th>Total Tax</th>
        </tr>

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

        @for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++)

            @php

                $total_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                $total_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);

            @endphp            

            @if (intval(json_decode($billingdata->unit_gst)[$i]==0))

                @php
                
                    $_0_gst_tax = json_decode($billingdata->unit_gst)[$i];
                    $_0_taxable_amount += floatval(json_decode($billingdata->amount)[$i]);
                    $_0_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_0_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_0_total_tax += floatval(json_decode($billingdata->tax)[$i]);

                @endphp

            @elseif(intval(json_decode($billingdata->unit_gst)[$i]==5))

                @php
                
                    $_5_gst_tax = json_decode($billingdata->unit_gst)[$i];
                    $_5_taxable_amount += floatval(json_decode($billingdata->amount)[$i]);
                    $_5_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_5_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_5_total_tax += floatval(json_decode($billingdata->tax)[$i]);

                @endphp

            @elseif(intval(json_decode($billingdata->unit_gst)[$i]==12))

                @php
                
                    $_12_gst_tax = json_decode($billingdata->unit_gst)[$i];
                    $_12_taxable_amount += floatval(json_decode($billingdata->amount)[$i]);
                    $_12_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_12_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_12_total_tax += floatval(json_decode($billingdata->tax)[$i]);

                @endphp

            @elseif(intval(json_decode($billingdata->unit_gst)[$i]==18))

                @php
                
                    $_18_gst_tax = json_decode($billingdata->unit_gst)[$i];
                    $_18_taxable_amount += floatval(json_decode($billingdata->amount)[$i]);
                    $_18_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_18_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_18_total_tax += floatval(json_decode($billingdata->tax)[$i]);

                @endphp

            @elseif(intval(json_decode($billingdata->unit_gst)[$i]==28))

                @php
                
                    $_28_gst_tax = json_decode($billingdata->unit_gst)[$i];
                    $_28_taxable_amount += floatval(json_decode($billingdata->amount)[$i]);
                    $_28_cgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_28_sgst_tax += floatval(json_decode($billingdata->tax)[$i]/2);
                    $_28_total_tax += floatval(json_decode($billingdata->tax)[$i]);

                @endphp
                            
            @endif

        @endfor

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

        
        <tr>
            <th>GRAND TOTALS</th>
            <td></td>
            <td>{{ number_format($total_cgst_tax,2) }}</td>
            <td>{{ number_format($total_sgst_tax,2) }}</td>
            <td>{{ number_format(floatval($billingdata->total_tax),2) }}
                </td>
        </tr>

    </table>

</div>
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;font-size: 12px;">

    <div>
        <p style="margin:0px;padding:0px">Your Credit Number: <strong>{{ $billingdata->credit_id }}</strong><br>Please keep it safe.It will be redeem in your next billing.</p>
    </div>
</div>
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;text-align: center">
    <p style="font-size: 12px;margin:0px;padding:0px">No Tax is Payable under Reverse Charge Only Packed items will be exchanged within 7 days.</p>
    <p style="font-size: 12px;margin:0px;padding:0px">Item Once Sold cannot be refunded.</p>
    <p style="font-size: 12px;margin:0px;padding:0px">GST is included in the selling price.</p>
    <p style="font-size: 12px;margin:0px;padding:0px">Tax shown seperately are mandated by GST Regulations.</p>
    <p style="font-size: 12px;margin:0px;padding:0px">Thank You Visit Again</p>

</div>
<div style="padding-top:5px;padding-bottom:5px;border-bottom: 1px dotted black;text-align: center">
    <p style="font-size: 12px;margin:0px;padding:0px">Now you can shop online tool www.earlybasket.com | Android</p>

</div>

<div style="font-size: 12px;text-align: center;">

    <p style="margin: 0px;padding-top: 5px">For Phone Ordering Call<br> +91-800-8271-800,0124-793-7177</p>

</div>



