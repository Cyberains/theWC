@extends('admin.includes.main')
@section('title')
    
    <title>Purchase Details | Billing Management</title>

@endsection

@section('style')
  
  <style type="text/css">
  
    .payment_option,.payment_amount{

      display: none;
    }

    .table .td{

      min-width: 400px !important;
    }

  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in"> 
         
      <div class="row bg-white mx-0 py-3 mt-2" id="add_purchase_info">
            <input type="number" name="uni_purchase_id" value="" hidden>
            <div class="col-md-3">
              <div class="form-group">
                  <label for="supplier_info">Supplier ID:</label>  
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$podata->supplierName->supplier_id}}</span>
                  </div>
               
                </div>  
               
                
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_id">Purchase ID</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$podata->purchase_id}}</span>
                  </div>
               
                </div>                          
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="seller">Seller:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if('early_basket'== $podata->seller){{'Early Basket'}}@elseif('shri_vinayak' == $podata->seller){{'Shri Vinayak'}}@endif</span>
                  </div>
               
                </div> 
                               
              </div>              
            </div>
            <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Payment Type:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if('credit' == $podata->advance_payment_type){{'credit'}}@elseif('partial' == $podata->advance_payment_type){{'Partial'}}@else{{'Full'}}@endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
             <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Payment Option:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if('percent' == $podata->payment_rupee_percent){{'Percent'}}@else{{'Rupees'}}@endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
            <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Advance Payment Amount:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($podata->advance_payment_amount){{$podata->advance_payment_amount }}@endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
               <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">PO Delivery Date:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($podata->po_delivery_date){{$podata->po_delivery_date }}@endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
               <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Shipping Address:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if('Early Basket Delhi' == $podata->ship_address){{ 'Early Basket Delhi' }}@else {{ 'Shree Vinayak Gurgaon' }} @endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
            <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Ship To:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($podata->ship_to){{ $podata->ship_to }}@endif</span>
                  </div>
               
                </div>                
              </div>              
            </div>
                         
        </div>
        <hr>
        <div class="row bg-white mt-2 py-3 mx-0">
        	 <?php $sku=json_decode($podata->sku_code);
        	  $product_name=json_decode($podata->product_name);
        	  $mrp_price=json_decode($podata->mrp_price);
        	  $basic_price=json_decode($podata->basic_price);
        	   $quantity=json_decode($podata->quantity);
        	   $cgst_tax=json_decode($podata->cgst_tax);
        	   $sgst_tax=json_decode($podata->sgst_tax);
        	   $igst_tax=json_decode($podata->igst_tax);
        	   $ugst_tax=json_decode($podata->ugst_tax);
        	   $cess_tax=json_decode($podata->cess_tax);
        	   $apmc_tax=json_decode($podata->apmc_tax);
        	   $tax_price=json_decode($podata->tax_price);
        	   $amount=json_decode($podata->amount);
        	   $procount=count($product_name);
        	   $proqty=0;
        	 ?>
           
        	@foreach($sku  as $key=>$skudata)
        	<?php

              $mrp=0;
              $proqty+=$quantity[$key];

	           if($mrp_price[$key]){
	            $mrps=get_mrp($mrp_price[$key]);
	            $mrp=$mrps->mrp_price;

	         }
        	?>
                 <div class="col-sm-12">
        		<h4>SKU Code: {{$skudata}}</h4>
        	</div>
              <div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">Product:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$product_name[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              </div>
               <div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">MRP Price (<small><i class="fa fa-rupee"></i></small>) :</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$mrp}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">Basic Price (<small><i class="fa fa-rupee"></i></small>) :</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$basic_price[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">Qty:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$quantity[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">SGST(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$sgst_tax[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">CGST(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$cgst_tax[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">IGST(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">{{$igst_tax[$key]}}</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">UGST(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($ugst_tax[$key]){{$ugst_tax[$key]}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">CESS(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($cess_tax[$key]){{$cess_tax[$key]}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">APMC(%):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($apmc_tax[$key]){{$apmc_tax[$key]}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        		<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">Tax(<small><i class="fa fa-rupee"></i></small>):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($tax_price[$key]){{$tax_price[$key]}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-2">
              	 <div class="form-group">
                <label for="payment_type">Amount(<small><i class="fa fa-rupee"></i></small>):</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($amount[$key]){{$amount[$key]}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	@endforeach
        </div>
        <hr>
        <div class="row bg-white mt-2 mb-4  py-3 mx-0">
        	<div class="col-3">
              	 <div class="form-group">
                <label for="payment_type"><b>Total Product</b>:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($procount){{$procount}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        		<div class="col-3">
              	 <div class="form-group">
                <label for="payment_type"><b>Total Quantity</b>:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($proqty){{$proqty}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        		<div class="col-3">
              	 <div class="form-group">
                <label for="payment_type"><b>Sub Total(<small><i class="fa fa-rupee"></i></small>)</b>:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($podata->sub_total){{$podata->sub_total}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        	<div class="col-3">
              	 <div class="form-group">
                <label for="payment_type"><b>Grand Total(<small><i class="fa fa-rupee"></i></small>)</b>:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@if($podata->grand_total){{$podata->grand_total}}@endif</span>
                  </div>
               
                </div>                
              </div>  
              
        	</div>
        </div>
      <!-- /.row-->
    </div>
  
  </div>

@endsection

@section('modal')

  
@endsection

@section('script')
  
 

@endsection
