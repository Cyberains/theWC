@extends('admin.includes.main')
@section('title')
    
    <title>Generate GRN | Vendor Management</title>

@endsection

@section('style')
  
  <style type="text/css">
    
    .chosen-container-single{

      width: 100% !important;
    }
    .tablescroll
    {
      overflow: overflow: auto;
    width: 1200;
    overflow: auto;
    display: block;
    overflow-x: auto;
    overflow: auto;
    }
    .tablescroll td>input{
          width: 120px !important;
    }
     .tablescroll td>select{
          width: 200px !important;
    }   
  </style>

@endsection

@section('body')
 <form class="sform" method="post" action="{{route('admin.edit_grn',['id'=>$purchasedata->id]) }}">
  <div class="container-fluid">
    <div class="fade-in">
     
              @csrf     
        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
            <h4>Details :</h4>
            <div class="col-sm-4">
              <div class="row">
         
                <div class="col-sm-6 pl-0">Po Reference</div>
                <div class="col-sm-6 pl-0">
                  :@if(!empty($purchasedata->poreference))
                    {{  $purchasedata->poreference }}
                  @endif
                </div>

                <div class="col-sm-6 pl-0">Supplier Id</div>
                <div class="col-sm-6 pl-0">
                  :@if(!empty($purchasedata))
                    {{$purchasedata->suppplierid}}
                  @endif
                </div>

                <div class="col-sm-6 pl-0">Supplier Name</div>
                <div class="col-sm-6 pl-0">
                  : @if(!empty($purchasedata))
                      {{$purchasedata->supppliername}}
                  @endif
                </div>

              </div>
            </div>
            <div class="col-sm-4"></div>
          </div>

        </div> 
        <hr style="margin-left: 1%;width: 99%;"> 
        <div class="row mx-0 py-3 mt-2 bg-white mb-4">
         <div class="col-sm-3">
           <div class="form-group">
              <label for="lr">LR Number  <span>*</span></label>
              <input type="text" class="form-control" name="lrnumber" id="lr" value="@if(!empty($purchasedata->lrnumber)){{$purchasedata->lrnumber}}@endif" readonly="" required="">
              <input type="hidden" name="poreference" value="@if(!empty($purchasedata->poreference)){{
                    $purchasedata->poreference}}
                  @endif">
              <input type="hidden" name="suppplierid" value="@if(!empty($purchasedata)){{$purchasedata->suppplierid}}@endif">
              <input type="hidden" name="supppliername" value="@if(!empty($purchasedata)){{$purchasedata->supppliername}}@endif">
          </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="carrier">Carrier Name <span>*</span></label>
        <input type="text" class="form-control" id="carrier" name="carriername" value="{{$purchasedata->carriername}}" required="">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="expected">Expected Date</label>
        <input type="date" class="form-control" id="expected" aria-describedby="Expected Date" name="expected_date" value="{{$purchasedata->expected_date}}">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="skansku">Scan SKU</label>
       <textarea id="skansku" name="scansku" rows="1" class="form-control">{{old('scansku')}}</textarea>
        </div>
         </div> 
        <!--2nd col Row-->
         <div class="col-sm-3">
           <div class="form-group">
        <label for="mduration">Remainder Mail Duration</label>
        <input type="date" class="form-control" name="remaindermail" id="mduration" value="{{$purchasedata->remaindermail}}">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="invoicenumber">Invoice Number <span>*</span></label>
        <input type="number" class="form-control" id="  invoicenumber" name="invoicenumber" value="{{$purchasedata->invoicenumber}}" min="0" required="">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="invoicedate">Invoice Date<span>*</span></label>
        <input type="date" class="form-control" id="invoicedate" aria-describedby="invoicedate Date" name="invoicedate" value="{{$purchasedata->invoicedate}}">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="invoicevalue">Invoice Value <span>*</span></label>
      <input type="number" class="form-control" id="invoicevalue" aria-describedby="invoice value " name="invoicevalue" value="{{$purchasedata->invoicevalue}}" min="0" required="">
        </div>
         </div> 
         <!--3rd row col-->
           <div class="col-sm-3">
           <div class="form-group">
        <label for="discountvalue">Discount(Value)</label>
        <input type="number" class="form-control" id="discountvalue" aria-describedby="discountvalue" name="discountvalue" value="{{$purchasedata->discountvalue}}" min="0">
        </div>
         </div>
         <div class="col-sm-3">
           <div class="form-group">
        <label for="remarks">Remarks</label>
       <textarea id="remarks" name="remark" rows="2" class="form-control">{{old('remark')}}</textarea>
        </div>
         </div> 
         <div class="clearfix"><br/></div>
            
        </div> 
         <button class="btn btn-sm btn-primary ml-2" id="add-membership" style="display: none;"><i class="fa fa-plus"></i>&nbspAdd Other Charges</button>  
    <!-- /.row-->
      <!--Table Panel-->

      <div class="row bg-white mx-0 px-0">
            <div class="col-md-12 px-0">
                <table class="table table-hover tablescroll ">
                  <thead  class="table-primary">
                    <tr>
                     <th>SKU Code</th>
                      <th>Product Name</th>
                      
                      <th>Po Qty</th>
                     {{--<th>Offer ?</th>--}}
                     <th>Received Qty</th>
                       <th>MRP</th>
                     <th>Unit Price</th>
                      <th>Buy Price</th>
                      <th>Barcode ID</th>
                    {{--<th>Discount</th>--}}
                      <th>Mfg Date</th>
                      <th>Exp Date</th>
                      <th>Tax <small><i class="fa fa-rupee"></i></small></th>
                      <th>Cess <small><i class="fa fa-rupee"></i></small></th>
                      <th>APMC <small><i class="fa fa-rupee"></i></small></th>
                      <th>Return Quantity<br>
                        <span style="font-size: 11px;">Damage/Expiry</span></th></th>
                     
                      <th>Total</th>


                      <th><a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">+</a></th>
                    </tr>
                  </thead>
                  <tbody class="wrapper">
                    <?php 
                     $sku=json_decode($purchasedata->skucode);
                    // dd($sku);
                     $product_name=json_decode($purchasedata->productname);

                    $mrp_price=json_decode($purchasedata->mrp);
                    //  dd($mrp_price);
                    $quantity=json_decode($purchasedata->qty);
                    $receivedqty=json_decode($purchasedata->receivedqty);
                    $basic_price=json_decode($purchasedata->buyprice);
                    $cess_tax=json_decode($purchasedata->cess);
                    $tax_price=json_decode($purchasedata->tax_price);
                     $tax=json_decode($purchasedata->tax);
                    $apmc_tax=json_decode($purchasedata->apmc);
                    $amount=json_decode($purchasedata->total);
                    $expdate=json_decode($purchasedata->expdate);
                    $mfgdata=json_decode($purchasedata->mfgdata);
                    $barcode_id=json_decode($purchasedata->barcode_id);
                   // $unit_tax_percentage=json_decode($purchasedata->unit_tax_percentage);
                     ?>
                      @foreach($sku as $key=>$skudata)
                      <?php
                      //get mrp by product name
                      
                        $mrp=0;

                      
                       //cess_tax
                       //$cess_tax=cess_tax($cess_tax[$key]);
                      // $manufacturing=get_mfg($product_name[$key]);
                       //product expire date
                      // $product_exp=get_product_expire($product_name[$key]);
                        
                      

                     ?>

                    <tr class="items">
                      <td>
                          <input type="text" name="skucode[]" value="@if($skudata){{$skudata}}@else{{old('skucode')}}@endif" id="skucode_{{$key}}" class="form-control skucode">
                      </td>
                      <td>
                          <input type="text" name="productname[]" value="@if($product_name[$key]){{$product_name[$key]}}@endif {{old('productname')}}" id="productname_{{$key}}"  class="form-control">
                      </td>
                     
                      <td>
                          <input type="text" name="qty[]" id="quantity_{{$key}}" value="@if($quantity[$key]){{$quantity[$key]}}@else{{old('qty')}}@endif" class="form-control qty" readonly="">
                      </td>
                          {{--<td style="display:none;"><input type="checkbox" name="offer[]"></td>--}}
                     <td>
                          <input type="number" min="1" name="receivedqty[]" value="@if($receivedqty[$key]){{$receivedqty[$key]}}@endif" class="form-control receiveqty" id="receiveqty_{{$key}}">
                      </td>
                     
                      <td> 
                        <input type="text" name="mrp[]" class="form-control mrp" value="{{$mrp_price[$key]}}" id="mrp_{{$key}}">
                         
                      </td>
                      <td>
                         <input type="number" name="unitprice[]" class="form-control" value="@if($basic_price[$key]){{$basic_price[$key]}}@endif" id="unitprice_{{$key}}" >
                         
                      </td>
                      <td>
                        <input type="text" name="buyprice[]" class="form-control buy" value="@if($basic_price[$key]){{$basic_price[$key]}}@endif" id="purchaseprice_{{$key}}">
                          <input type="hidden" name="purprice" id="purchase_{{$key}}" value="@if($basic_price[$key]){{$basic_price[$key]}}@endif">
                      </td>
                      <td><input type="textbox" name="barcode_id[]" id="barcode_{{$key}}" value="@if($barcode_id[$key]){{  $barcode_id[$key] }}@endif" class="form-control" required></td>
                     
                          {{--<td>
                          <input type="number" name="discount[]" value="{{old('discount')}}" min="0" class="form-control" id="discount_{{$key}}">
                      </td>--}}
                     
                      <td>
                          <input type="date" name="mfgdata[]" value="{{$mfgdata[$key]}}" class="form-control" >
                      </td>
                      <td>
                          <input type="date" name="expdate[]" value="{{$expdate[$key]}}" class="form-control" required="">
                      </td>
                      <td>
                          <input type="text" name="tax[]" class="form-control" value="@if($tax[$key]){{$tax[$key]}}@endif" readonly="" id="tax_{{$key}}">
                      </td>
                      <td>
                         <!-- <input type="text" name="cess" class="form-control" value="@if($cess_tax[$key]){{ $cess_tax[$key] }}@endif{{old('cess')}}">-->
                         <select class="form-control cess" name="cess[]"  id="cess_{{$key}}">
                             <option value="0">Select Here</option>
                             @foreach($gst as $cess)
                             <option value="{{$cess->gst_rate}}">{{$cess->gst_type}}</option>
                             @endforeach
                         </select>
                      </td>
                      <td>
                          <!--<input type="text" name="apmc" class="form-control" value="{{old('apmc')}}"> -->
                           <select class="form-control apmc" name="apmc[]" id="apmc_{{$key}}">
                             <option value="">Select Here</option>
                             @foreach($gst as $apmc)
                             <option value="{{$apmc->gst_rate}}">{{$apmc->gst_type}}</option>
                             @endforeach
                         </select>
                      </td>
                      <td>
                          <input type="text" name="returnquantity[]" class="form-control" value="{{old('returnquantity')}}" id="returnquantity_{{$key}}" min="0" >
                      </td>
                     
                      <td>
                          <input type="text" name="total[]" class="form-control subtotals" value="{{$amount[$key]}}" id="amount_{{$key}}">
                      </td>
                      <td style="display: none;">
                          <input type="text" name="hiddenttax[]" id="hiddenttax_{{$key}}" class="hiddenttax" value="@if($tax_price[$key]){{$tax_price[$key]}}@endif">
                      </td>
                      
                    </tr>
                  @endforeach
                
                
                  </tbody>
                  <tfoot class="t-footer">
                      <tr>
                        <td class="text-right" colspan="14"><strong>Sub Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                        <td><input class="form-control sub_total" id="sub_total" name="sub_total" value="{{$purchasedata->sub_total}}" type="text" data-parsley-required="" data-parsley-required-message="Sub Total is required." readonly=""></td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="14"><strong>Total Tax(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                        <td><input class="form-control total_tax" id="total_tax" name="total_tax" value="{{$purchasedata->total_tax}}" type="text" data-parsley-required="" data-parsley-required-message="Total Tax is required." readonly=""></td>
                      </tr>         
                      <tr>
                        <td class="text-right" colspan="14"><strong>Grand Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                        <td><input class="form-control grand_total" id="grand_total" name="grand_total" type="text" value="{{$purchasedata->grand_total}}" readonly="" data-parsley-required="" data-parsley-required-message="Grand Total is required."></td>
                      </tr>
                  </tfoot>
                </table>
            </div>
        </div>
      <!--End Table Panel-->
    
        <div class="col-md-12 text-right mt-3">
            <a href="" type="button" class="btn btn-success mr-3" style="display: none;">Generate Grn</a>
            <button type="submit" name="purchase_submit" id="purchase_submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

@endsection

@section('modal')

 

@endsection

@section('script')
  
  <script type="text/javascript">
    $(document).ready(function(){
      

    $('.qty').on('change',function(){
     qty=$(this).val();
     var id=$(this).attr('id');
     var Arrayd = id.split('_');
     
     purchage=$('#purchaseprice_'+Arrayd[1]).val();
   total=amount(qty,purchage);

   $('#amount_'+Arrayd[1]).val(total);
  
    });
    
//tax 

//multiple field with ajax
 var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.wrapper'); //Input field wrapper
  //New input field html 
    
     //Initial field counter is 1
     var ids=$(".skucode:last").attr('id');
         var Arraycount = ids.split('_');
         var counts=parseInt(Arraycount[1]);
         var con=counts+1;
      var x = con;
    //Once add button is clicked
    $(addButton).click(function(){

        //Check maximum number of input fields
        if(x < maxField){ 
          
            var fieldHTML ='<tr class="items"><td><input type="text" list="sku" name="skucode1[]" id="skucodes_'+x+'"  class="form-control skucode1 sku" ><datalist id="sku"></datalist><input type="hidden" name="skucode[]" id="skucode_'+x+'"></td><td><input type="text" name="productname[]"  class="form-control" id="productname_'+x+'"></td><td><input type="text" name="qty[]" id="quantity_'+x+'" class="form-control qty" readonly=""></td><td style="display:none;"><input type="checkbox" name="offer[]"></td><td><input type="number" min="1" name="receivedqty[]" class="form-control receiveqty" id="receiveqty_'+x+'" value="1"></td><td><select class="unitprice mrp form-control" id="mrp_'+x+'" name="mrp[]"><option>Select Here</option></select><input type="hidden" name="mrps[]" class="form-control" value="" id="mrps_'+x+'"></td><td><input type="text" name="unitprice[]" id="unitprice_'+x+'"></td><td><input type="text" name="buyprice[]" class="form-control buy purchaseprice" value="" id="purchaseprice_'+x+'"><input type="hidden" name="purchaseprice[]" class="form-control buy purchaseprice" value="" id="purchase_'+x+'"></td><td><input type="text" name="barcode_id[]" id="barcode_'+x+'" required></td><td style="display:none;"><input type="number" name="discount[]" min="0" class="form-control" id="discount_'+x+'"></td><td><input type="date" name="mfgdata[]"  class="form-control" ></td><td><input type="date" name="expdate[]" class="form-control" required></td><td><input type="text" name="tax[]" class="form-control"  readonly="" id="tax_'+x+'"></td><td><select class="form-control cess" name="cess[]"  id="cess_'+x+'"><option value="">Select Here</option>@foreach($gst as $cess)<option value="{{$cess->gst_rate}}">{{$cess->gst_type}}</option>      @endforeach</select></td><td><select class="form-control apmc" name="apmc[]" id="apmc_'+x+'"><option value="">Select Here</option>@foreach($gst as $apmc)<option value="{{$apmc->gst_rate}}" >{{$apmc->gst_type}}</option> @endforeach</select></td><td><input type="text" name="returnquantity[]" class="form-control"  id="returnquantity_'+x+'"  min="0"></td><td><input type="text" name="total[]" class="form-control subtotals"  id="amount_'+x+'"></td><td><a href="javascript:void(0);" class="remove_button btn btn-danger " id="remove_'+x+'">-</a></td><td><input type="hidden" name="hiddenttax[]" id="hiddenttax_'+x+'" class="hiddenttax"></td></tr>';
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
         var id=$(this).attr('id');
  var Arrayd = id.split('_');
      // purchage=$('#purchase_'+Arrayd[1]).val();
       //console.log(purchage);
$('#hiddenttax_'+Arrayd[1]).val(0);
$('#amount_'+Arrayd[1]).val(0);  
total_tax();
    subtotals(); 
    grndtotals();
        $(this).closest('tr').remove(); //Remove field html
        x--; //Decrement field counter
    }); 
//sku click 


});
var token = $('meta[name="csrf-token"]').attr('content');
  $(document).on('keyup','.skucode1',function(){
    var productsku_val=$(this).val();
    
     if (productsku_val.length>1) {
    var html='';
      $.ajax({
            url: "{{ route('admin.sku-search') }}",
            dataType: "json",
            type: "POST",
            data: {
                    _token:token,
                      productsku_val:productsku_val
                },

            success:function(data){
            if(data.status == 1){
            var productdata = data.productdata;
         // console.log(productdata);
            for(key in productdata){
                html += '<option value="'+productdata[key].product_code+'-'+productdata[key].title+'"/>';

                }
               
             }
           else if(data.status == 0){
                $('#sku option').remove();
                html = "<option value='No Record Found'/>";
                }
                $('#sku').html(html);
         }
    })
  }
  });  
  //==========Sku code search End ===========//
  $(document).on('change','.skucode1',function(){
    unitprice="";
   var skucode=$(this).val();
   var id=$(this).attr('id');
     skucodeonly=skucode.split('-');
     skuid=id.split('_');
     var skuname=skucodeonly[0];
         var html='';
    var rowid=skuid[1];
      $.ajax({
            url: "{{ route('admin.sku-product') }}",
            dataType: "json",
            type: "POST",
            data: {
                    _token:token,
                      skuname:skuname
                },

            success:function(data){

            if(data.status == 1){
                $('#productname_'+rowid+'').val(data.productdata.title);
 console.log(data.productdata.product_attribute);
                  var pricearray = data.productdata.product_attribute;
                  unitprice='<option>Select Here</option>';
               for(var key in pricearray){

                        unitprice += '<option value="'+pricearray[key].mrp_price+'">'+pricearray[key].mrp_price+'</option>';
                        
                      }
                  $('#skucode_'+rowid+'').val(skuname);
              $('#mrp_'+rowid+'').html(unitprice);
         
            }
           else if(data.status == 0){
                $('#sku option').remove();
                html = "<option value='No Record Found'/>";
                }
                $('#sku').html(html);
         }
    })
  });
    //==========Sku code search End ===========//
  $(document).on('change','.mrp',function(){
   
   var mrp=$(this).val();
   var id=$(this).attr('id');
  
    splitid=id.split('_');
     idcount=splitid[1];
     $('#mrps_'+idcount+'').val(mrp);
     title=$('#productname_'+idcount+'').val();
        $.ajax({
            url: "{{ route('admin.mrp') }}",
            dataType: "json",
            type: "POST",
            data: {
                    _token:token,
                      mrp:mrp,
                      title:title,

                     
                },

            success:function(data){
       
              console.log(mrp);
              console.log(data.productdata);
         if(data.productdata.basic_price){
          $('#unitprice_'+idcount+'').val(data.productdata.basic_price);
           $('#purchaseprice_'+idcount+'').val(data.productdata.basic_price);
            $('#purchase_'+idcount).val(data.productdata.basic_price);
            $('#unitprice_'+idcount).val(data.productdata.basic_price);
            $('#tax_'+idcount).val(data.taxcount);
            $('#hiddenttax_'+idcount).val(data.tax);
              qty=$('#receiveqty_'+idcount+'').val();
              barcode_id=$('#barcode_'+idcount+'').val(data.productdata.barcode_id);
          purchage=$('#purchaseprice_'+idcount+'').val();
          console.log(purchage);
            totals=amount(qty,purchage);
           $('#amount_'+idcount+'').val(totals);
             total_tax();
    subtotals(); 
    grndtotals();
         }else{
          $('#unitprice_'+idcount+'').val(0);
           $('#purchaseprice_'+idcount+'').val(0);
            $('#purchase_'+idcount).val( );
            $('#tax_'+idcount).val(data.taxcount);
           
         }
        
    }
  }); 
  }); 
  $(document).on('change','.buy',function(){
    var values=$(this).val();
   var id=$(this).attr('id');
    splitid=id.split('_');
     idcount=splitid[1];
 qty=$('#receiveqty_'+idcount+'').val();
   purchage=$('#purchaseprice_'+idcount+'').val(values);
  var purchage=$(this).val();
  $('#purchase_'+idcount).val(values);
totals=amount(qty,purchage);
   $('#amount_'+idcount+'').val(totals);
tax=$('#tax_'+idcount+'').val();;
totalsgt=gstcalculaterall(tax,purchage,qty);
    $('#hiddenttax_'+idcount+'').val(totalsgt);
      total_tax();
    subtotals();
   grndtotals();

  }); 
$(document).on('keyup','.receiveqty',function(){
 var id=$(this).attr('id');
   qty=$(this).val();
     var Arrayd = id.split('_');

    purchage=$('#purchase_'+Arrayd[1]).val();
//  console.log(purchage);
    oldqty=$('#quantity_'+Arrayd[1]).val();
    recqty=$('#receiveqty_'+Arrayd[1]).val();

  totals=amount(qty,purchage);
        count=oldqty-recqty;
        if(count>=0){
            $('#returnquantity_'+Arrayd[1]).val(count);
        }else{
          $('#returnquantity_'+Arrayd[1]).val(0);  
        }
       

tax=$('#tax_'+Arrayd[1]).val();;
purchage=$('#purchase_'+Arrayd[1]).val();
recqty=$('#receiveqty_'+Arrayd[1]).val();

   totalsgt=gstcalculaterall(tax,purchage,recqty);
    $('#hiddenttax_'+Arrayd[1]).val(totalsgt);
    $('#amount_'+Arrayd[1]).val(totals);
    total_tax();
    subtotals(); 
    grndtotals();
    
  
});

$(document).on('change','.apmc',function(){
var id=$(this).attr('id');
  var Arrayd = id.split('_');
   apmc=$('#apmc_'+Arrayd[1]).val();

    title=$('#productname_'+Arrayd[1]).val();
if(apmc!=''){
   $.ajax({
            url: "{{ route('admin.apmc') }}",
            dataType: "json",
            type: "POST",
            data: {
                    _token:token,
                      apmc:apmc,
                      title:title,
                     
                },

            success:function(data){
       
           console.log(data.productdata);
$('#tax_'+Arrayd[1]).val(data.productdata);
tax=data.productdata;
purchage=$('#purchase_'+Arrayd[1]).val();
recqty=$('#receiveqty_'+Arrayd[1]).val();

   totalsgt=gstcalculaterall(tax,purchage,recqty);
   
   $('#hiddenttax_'+Arrayd[1]).val(totalsgt);
   total_tax();
    subtotals(); 
    grndtotals();
    }
  });




  }
});

$(document).on('change','.cess',function(){
var id=$(this).attr('id');
  var Arrayd = id.split('_');
  
   cess=$('#cess_'+Arrayd[1]).val();
    title=$('#productname_'+Arrayd[1]).val();
if(cess!=''){
   $.ajax({
            url: "{{ route('admin.cess') }}",
            dataType: "json",
            type: "POST",
            data: {
                    _token:token,
                      cess:cess,
                      title:title,
                      index:Arrayd,
                },

            success:function(data){
         
          console.log(data.productdata);
$('#tax_'+Arrayd[1]).val(data.productdata);
tax=data.productdata;
purchage=$('#purchase_'+Arrayd[1]).val();
recqty=$('#receiveqty_'+Arrayd[1]).val();
console.log(purchage);
   totalsgt=gstcalculaterall(tax,purchage,recqty);

   $('#hiddenttax_'+Arrayd[1]).val(totalsgt);
   total_tax();
    subtotals(); 
    grndtotals();
    }
  });

   
}

});
  function gstcalculaterall(tax=null,purchage=null,recqty=null){
   // console.log(recqty);
     return total_tax_rupees = purchage*tax/100*recqty;

      
    }
    function total_tax()
  {
       var sum = 0;
    $(".hiddenttax").each(function(){
        sum += +$(this).val();
    });
    
   $('#total_tax').val(sum.toFixed(2));
   grndtotals();
  }
   function amount(qty,price){
      
        return parseFloat(qty*price).toFixed(2);
    }

     function grndtotals(){

          total=$('#total_tax').val();
          totalsub=$('#sub_total').val();
           var grand_total = parseFloat(total)+parseFloat(totalsub);
    
        $('#grand_total').val((grand_total).toFixed(2));
  }
   function subtotals()
  {
       var sum = 0;
    $(".subtotals").each(function(){
        sum += +$(this).val();
    });
   $('#sub_total').val(parseFloat(sum).toFixed(2));
  }
  </script> 

@endsection
