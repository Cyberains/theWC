@extends('admin.includes.main')
@section('title')
    
    <title>Billing | Billing Management</title>

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

@section('btitle')
    
    <li class="breadcrumb-item">Vendor Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Purchase</li>

@endsection

@section('btitle2')
    
    <li class="breadcrumb-item">Edit</li>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in"> 
      <form class="sform" id="purchase_form" action="{{ route('admin.update_purchase') }}" method="post">
      @csrf      
      <div class="row bg-white mx-0 py-3 mt-2" id="add_purchase_info">
            <input type="number" name="uni_purchase_id" value="{{ $podata->id }}" hidden>
            <div class="col-md-3">
              <div class="form-group">
                  <label for="supplier_info">Supplier ID:<span>*</span></label>
                  <select class="form-control select2" name="supplier_info" id="supplier_info" data-parsley-required data-parsley-required-message="Supplier is required.">
                    <option value=""> select one </option>
                    @foreach($supplierdata as $data)
                      <option value="{{ $data->id }}" {{ $data->id == $podata->supplier_id ? 'selected' : '' }}>{{ $data->supplier_id }} ( {{ $data->supplier_name }} )</option>
                    @endforeach
                  </select>
                
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_id">Purchase ID<span>*</span></label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">EBPO</span>
                  </div>
                  <input class="form-control mt-0 @error('purchase_id') is-invalid @enderror" style="width:65% !important;" type="text" id="purchase_id" name="purchase_id" value="{{ substr($podata->purchase_id,4) }}" placeholder="Enter Purchase ID"  data-parsley-required data-parsley-required-message="Purchase ID is required." readonly>

                  @error('purchase_id')

                    <div class="text-danger">{{ $message }}</div>

                  @enderror
                </div>                          
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="seller">Seller:<span>*</span></label>
                <select class="form-control" type="text" name="seller" id="seller" data-parsley-required data-parsley-required-message="Seller is required." autofocus>
                  <option value="">Select Seller </option>
                  <option value="early_basket" {{ 'early_basket' == $podata->seller ? 'selected' : '' }}>Early Basket</option>
                  <option value="shri_vinayak_associates_india_pvt_ltd" {{ 'shri_vinayak_associates_india_pvt_ltd' == $podata->seller ? 'selected' : '' }}>Shri Vinayak associates india Pvt.Ltd.</option>                    
                </select>                  
              </div>              
            </div>
            <div class="col-md-3 payment_type">
              <div class="form-group">
                <label for="payment_type">Advance Payment Type:<span>*</span></label>
                <select class="form-control" type="text" name="advance_payment_type" id="payment_type" data-parsley-required data-parsley-required-message="Payment Type is required." autofocus>
                  <option value="">Select Payment Type </option>
                  <option value="credit" {{ 'credit' == $podata->advance_payment_type ? 'selected' : '' }}>credit</option>
                  <option value="partial" {{ 'partial' == $podata->advance_payment_type ? 'selected' : '' }}>Partial</option>
                  <option value="full" {{ 'full' == $podata->advance_payment_type ? 'selected' : '' }}>Full</option>                    
                </select>                  
              </div>              
            </div>
            <div class="col-md-2 payment_option">
               <div class="form-group ">
                  <label for="payment_partial">Advance Payment option:</label>
                  <div class="d-flex">
                    <div class="mr-4 ml-2">
                      <label class="mb-0" for="p-percent">Percent</label>
                      <input type="radio" class="payment_option_input" name="payment_option" value="percent" id="p-percent" {{ 'percent' == $podata->payment_rupee_percent ? 'checked' : '' }}>
                    </div>
                    <div>
                      <label class="mb-0" for="p-amount">Rupees</label>
                      <input type="radio" name="payment_option" 
                      class="payment_option_input" value="rupee" id="p-amount" {{ 'rupee' == $podata->payment_rupee_percent ? 'checked' : '' }}>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-2 payment_amount">
                <div class="form-group ">
                  <label for="payment_rupees">Advance Payment Amount:</label>
                  <input type="text" name="payment_amount" id="payment_amount" placeholder="Enter Rupees">              
                  <input type="text" name="payment_amount" id="payment_percent" placeholder="Enter Percent(%)" max="100" hidden disabled>
                </div>
            </div>
            
            <div class="col-md-2">
              <div class="form-group">
                  <label for="po_delivery_date">PO Delivery Date:</label>
                  <input type="date" name="po_delivery_date" value="{{ $podata->po_delivery_date }}" id="po_delivery_date" class="form-control" placeholder="yyyy-mm-dd">
                                  
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="shipping_address">Shipping Address:<span>*</span></label>
                <select class="form-control" type="text" name="shipping_address" id="shipping_address" data-parsley-required data-parsley-required-message="Shipping Address is required." autofocus>
                  <option value="">Select Shipping Address </option>
                  <option value="Shop No-18,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001" {{ 'Shop No-18,Suncity Avenue,Sector-102,Gurgaon,Haryana,122001' == $podata->ship_address ? 'selected' : '' }} >Shop No-18,Suncity Avenue,Sector-102,Gurgaon</option>                    
                </select>                  
              </div>              
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="ship_to">Ship To:<span>*</span></label>
                  <input type="text" name="ship_to" id="ship_to" value="{{ $podata->ship_to }}" class="form-control" placeholder="Enter Name of Person to Which goods hand over"  data-parsley-required data-parsley-required-message="Ship to is required.">
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="product">Product:<span>*</span></label>
                  <input list="items" class="form-control auto" placeholder="Search Item" id="search">

                  <datalist id="items" style="width: 100%">
                    
                  </datalist>
                
              </div>
            </div>
            <div class="col-md-12 table-responsive" >
              <table class="table" id="multiple_select" style="width: 130%">
                <thead class="table-primary">
                  <tr>
                    <td width="170px" class="barcode_display">SKU Code</td>
                    <td width="250px">Product Name</td>
                    <td width="140px">MRP Price (<small><i class="fa fa-rupee"></i></small>) </td>
                    <td width="120px">Basic Price (<small><i class="fa fa-rupee"></i></small>)</td>
                    <td width="80px">Qty.</td>
                    <td width="120">Weight</td>
                    <td width="80px">SGST(%)</td>
                    <td width="80px">CGST(%)</td>
                    <td width="80px">IGST(%)</td>
                    <td width="80px">UTGST(%)</td>
                    <td width="80px">CESS(%)</td>
                    <td width="80px">APMC(%)</td>
                    <td width="130px">Tax(<small><i class="fa fa-rupee"></i></small>)</td>
                    <td width="130px">Amount (<small><i class="fa fa-rupee"></i></small>) </td>
                    <td width="70px">Action</td>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot class="t-footer">
                    <tr>
                      <td class="text-right" colspan="12"><strong>Sub Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control sub_total" id="sub_total" name="sub_total" type="text" data-parsley-required data-parsley-required-message="Sub Total is required." readonly ></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="12"><strong>Total Tax(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control total_tax" id="total_tax" name="total_tax" type="text" data-parsley-required data-parsley-required-message="Total Tax is required." readonly></td>
                    </tr>         
                    <tr>
                      <td class="text-right" colspan="12"><strong>Grand Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control grand_total" id="grand_total" name="grand_total" type="text" readonly data-parsley-required data-parsley-required-message="Grand Total is required."></td>
                    </tr>
                </tfoot>
              </table>
          </div>
          <div class="col-md-12 text-right mt-3">
            <a href="{{ route('admin.purchase') }}" type="button" class="btn btn-success mr-3">Cancel</a>
            <button type="button" name="purchase_submit" id="purchase_submit" class="btn btn-primary">Update Purchase Order</button>
          </div>                    
        </div>

      </form>  
      <!-- /.row-->
    </div>
  
  </div>

@endsection

@section('modal')

  
@endsection

@section('script')
  
  <script type="text/javascript">

    var taxdata = <?php echo json_encode($taxdata) ?>; 
    var foo = <?php echo json_encode($podata) ?>;
  
    purchaseedit(foo);

    var editcount=0;
    function purchaseedit(podatacall){

        editcount = $.parseJSON(podatacall.sku_code).length;

        for(var i=0;i<editcount;i++) {

          var html='';
          var mrp='';
          var price='';
          var sgst = '';
          var cgst = '';
          var igst = '';
          var ugst = '';
          var cess = '';
          var apmc = '';
          var gstoption ='';

          var product_id = $.parseJSON(podatacall.sku_code)[i];
          var basic_price = $.parseJSON(podatacall.basic_price)[i];
          var product_name =  $.parseJSON(podatacall.product_name)[i];
          var quantity = $.parseJSON(podatacall.quantity)[i];
          var sgst_tax = $.parseJSON(podatacall.sgst_tax)[i];
          var weight = $.parseJSON(podatacall.weight)[i];
          if (sgst_tax==null) {

              sgst_tax=0;
          }

          var cgst_tax = $.parseJSON(podatacall.cgst_tax)[i];
          if (cgst_tax==null) {

              cgst_tax=0;
          }
          var igst_tax = $.parseJSON(podatacall.igst_tax)[i];
          if (igst_tax==null) {

              igst_tax=0;
          }
          var ugst_tax = $.parseJSON(podatacall.ugst_tax)[i];
          if (ugst_tax==null) {

              ugst_tax=0;
          }
          var cess_tax = $.parseJSON(podatacall.cess_tax)[i];
          if (cess_tax==null) {

              cess_tax=0;
          }
          var apmc_tax = $.parseJSON(podatacall.apmc_tax)[i];
          if (apmc_tax==null) {

              apmc_tax=0;
          }
          var mrp_id = $.parseJSON(podatacall.mrp_price)[i];
          var tax_price = $.parseJSON(podatacall.tax_price)[i];
          var product_amount = $.parseJSON(podatacall.amount)[i];

          $.ajax({

              url:"{{ route('admin.get_product_mrp_price') }}",
              method:"get",
              async:false,
              data:{

                product_id:product_id
              },
              success:function(data){

                 productmrparr = data.productmrp;

                 mrp += '<td><select class="form-control mrp_price" id="mrp_price_id_'+i+'" name="mrp_price[]" data-parsley-required data-parsley-required-message="MRP Price is required."><option value="">Select MRP Price</option>';

                 var mrp_select;

                for(var key in productmrparr){

                  if (productmrparr[key].id==mrp_id) {

                      mrp_select='selected="selected"';
                  }
                  else{

                      mrp_select=null;
                  }

                  mrp += '<option value="'+productmrparr[key].id+'"'+mrp_select+'>'+(productmrparr[key].mrp_price).toFixed(2)+'</option>';

                }

                  mrp += '</select></td>'; 
              }

          });

          

          price='<td><input type="text" class="form-control" name="basic_price[]" value="'+basic_price+'" id="basic_price_id_'+i+'" readonly></td>';


          sgst += '<td><input type="text" class="form-control custom_tax" id="sgst_tax_id_'+i+'" name="sgst_tax[]" value="'+sgst_tax+'" readonly></td>';

          cgst += '<td><input type="text" class="form-control custom_tax" id="cgst_tax_id_'+i+'" name="cgst_tax[]" value="'+cgst_tax+'" readonly></td>';

          igst += '<td><input type="text" class="form-control custom_tax" id="igst_tax_id_'+i+'" name="igst_tax[]" value="'+igst_tax+'" readonly></td>';

          ugst += '<td><input type="text" class="form-control custom_tax" id="ugst_tax_id_'+i+'" name="ugst_tax[]" value="'+ugst_tax+'" readonly></td>';

          cess += '<td><input type="text" class="form-control custom_tax" id="cess_tax_id_'+i+'" name="cess_tax[]" value="'+cess_tax+'" readonly></td>';

          apmc += '<td><input type="text" class="form-control custom_tax" id="apmc_tax_id_'+i+'" name="apmc_tax[]" value="'+apmc_tax+'" readonly></td>';

          html += '<tr><td><input type="text" class="form-control duplicate_sku_code" name="sku_code[]" value="'+product_id+'" id="sku_code_id_'+i+'" readonly></td><td><input type="text" class="form-control" name="product_name[]" value="'+product_name+'" id="product_name_id_'+i+'" readonly></td>'+mrp+price+'<td><input type="text" class="form-control product_qty" name="quantity[]" value="'+quantity+'" id="quantity_id_'+i+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td><input type="text" class="form-control" name="weight[]" value="'+weight+'" id="weight_id_'+i+'" data-parsley-required data-parsley-required-message="Weight is required." readonly></td>'+sgst+cgst+igst+ugst+cess+apmc+'<td><input type="text" class="form-control section_tax" name="tax[]" data-gst=""  value="'+tax_price+'" id="tax_id_'+i+'" ></td><td><input type="text" class="form-control section_amount" id="amount_id_'+i+'" name="product_amount[]" value="'+product_amount+'" readonly ></td><td><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';


            $('#multiple_select tbody').append(html); 

            $('#sub_total').val(podatacall.sub_total);
            $('#total_tax').val(podatacall.total_tax);
            $('#grand_total').val(podatacall.grand_total);

        }

    }

    
    $(document).ready(function(){

        @if ($podata->advance_payment_type=='partial') 

            $('.payment_option').css('display','block');
            $('.payment_amount').css('display','block');

            @if ($podata->payment_rupee_percent=='rupee')

                $('#payment_amount').removeAttr('disabled','disabled');
                $('#payment_amount').removeAttr('hidden','hidden');

                $('#payment_percent').attr('disabled','disabled');
                $('#payment_percent').attr('hidden','hidden');

                $('#payment_amount').val( {{ $podata->advance_payment_amount }});

            @else

                $('#payment_amount').attr('disabled','disabled');
                $('#payment_amount').attr('hidden','hidden');

                $('#payment_percent').removeAttr('disabled','disabled');
                $('#payment_percent').removeAttr('hidden','hidden');

                $('#payment_percent').val( {{ $podata->advance_payment_amount }});

            @endif


        
        @endif

        $('#payment_type').change(function(){

            if ($(this).val()=='partial') {

              $('.payment_amount').show();
              $('.payment_option').show();
              $('#payment_amount').removeAttr('disabled','disabled');
              $('#payment_amount').removeAttr('hidden','hidden');

              $('#payment_amount').attr('data-parsley-required','');
              $('#payment_amount').attr('data-parsley-required-message','Payment Amount is required');


            }
            else{

              $('.payment_amount').hide();
              $('.payment_option').hide();
              $('#payment_amount').attr('disabled','disabled');
              $('#payment_amount').attr('hidden','hidden');

              $('#payment_amount').removeAttr('data-parsley-required','');
              $('#payment_amount').removeAttr('data-parsley-required-message','Payment Amount is required');

              $('#payment_percent').removeAttr('data-parsley-required','');
              $('#payment_percent').removeAttr('data-parsley-required-message','Payment Percent is required');
            }

        });

        $('.payment_option_input').click(function(){

            if ($(this).val()=='percent') {

              $('#payment_amount').attr('disabled','disabled');
              $('#payment_amount').attr('hidden','hidden');
              $('#payment_percent').removeAttr('disabled','disabled');
              $('#payment_percent').removeAttr('hidden','hidden');
              $('#payment_percent').removeAttr('data-parsley-required','');
              $('#payment_percent').removeAttr('data-parsley-required-message','Payment Percent is required');
              $('#payment_amount').removeAttr('data-parsley-required','');
              $('#payment_amount').removeAttr('data-parsley-required-message','Payment Amount is required');

              $('#payment_percent').attr('data-parsley-required','');
              $('#payment_percent').attr('data-parsley-required-message','Payment Percent is required');


            }
            else{

              $('#payment_amount').removeAttr('disabled','disabled');
              $('#payment_amount').removeAttr('hidden','hidden');
              $('#payment_amount').removeAttr('data-parsley-required','');
              $('#payment_amount').removeAttr('data-parsley-required-message','Payment Amount is required');
              $('#payment_percent').removeAttr('data-parsley-required','');
              $('#payment_percent').removeAttr('data-parsley-required-message','Payment Percent is required');

              $('#payment_amount').attr('data-parsley-required','');
              $('#payment_amount').attr('data-parsley-required-message','Payment Amount is required');
              $('#payment_percent').attr('disabled','disabled');
              $('#payment_percent').attr('hidden','hidden');
             
              

            }
        });

        $('#purchase_submit').click(function(){

            if ($('#multiple_select tbody').find('tr').length>0) {


              if ($('#purchase_form').parsley().isValid()) {

                 swal({

                    title: "Are you sure?",
                    text: "You want to Update purchase order",
                    icon: "info",
                    buttons: [
                      'No, cancel it!',
                      'Yes, I am sure!'
                    ],
                    closeOnClickOutside: false,
                    dangerMode: false,
                }).then(function(isConfirm){

                    if (isConfirm) {

                      $('#purchase_form').submit();
                    }
                });           
                  
              }
              else{

                  $('#purchase_form').submit();
              }

            }
            else{

              toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }

              toastr.error('Take atleast one item.');

            }

        });

        $(".select2").chosen({});
   
    var stack = [];
    var storeproductdata='';
    var token = $('meta[name="csrf-token"]').attr('content');
    $("#search").keyup(function(){

            var check = false;
            var valueq = $('#search').val();
            $('#items option').each(function(){

                if ($(this).val()==$('#search').val()) {

                    var target = valueq.split('-');
                    $('#items option').remove();
                    check = true;

                    addpurchase(target[1]);

                }

            });

            if (check==false) {

              $('#items option').remove();
              if ($('#search').val().length>1) {

                 var html='';

                $.ajax({

                  url: "{{ route('admin.item-search') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                      _token:token,
                      search: $(this).val()
                  },
                  success: function(data){
                    //Start
                    if(data.status == 1){

                      storeproductdata='';
                      storeproductdata = data;

                      var productdata = data.productdata;

            

                      for(key in productdata){

                        html += '<option value="'+productdata[key].title+'-'+productdata[key].product_code+'"/>';
                      }
                                                
                    }
                    else{
                      
                      $('#items option').remove();
                      html = "<option value='No Record Found'/>";

                    }

                    $('#items').html(html);
                    

                   }
                })
              }
            }
        });

        $('#items option').click(function(){

            $('#items option').remove();

        });

    });

    var count = editcount+1;

    function addpurchase(productcode){

      var token = $('meta[name="csrf-token"]').attr('content');

       $.ajax({

          url:"{{ route('admin.get_purchase_product') }}",
          method:'POST',
          data:{

              _token:token,
              product_code:productcode,
                            
          },
          async:false,
          success:function(data){

            if (data.status==1) {

              data = data.productdata;
              
              var pricearray = data.product_attribute;
              if ($('#mrp_price_id_'+count).val()==''){

                  toastr.options =
                  {
                    "closeButton" : true,
                    "progressBar" : true
                  }
                  toastr.error("Select Previous Product MRP Price.");

              }
              else{

                  var duplicate_barcode = false;

                  $('.duplicate_sku_code').each(function(){

                      if ($(this).val() == data.product_code) {

                        duplicate_barcode=true;
                        var targetproductcodeid = $(this).attr('id');
                        var target2 = targetproductcodeid.split('sku_code_id_');
                        var targetqty_id = '#quantity_id_'+target2[1];

                        var targetprice_netid = '#basic_price_id_'+target2[1];
                        var targetamt_netid = '#amount_id_'+target2[1];
                       
                        var targetprice_val = $(targetprice_netid).val();
                        var target_qty_val = $('#quantity_id_'+target2[1]).val();
                        var target_new_qty = parseInt(target_qty_val)+1;


                        var targetnewamt_val = parseFloat(targetprice_val)*target_new_qty;

                        $(targetqty_id).val(target_new_qty);

                        $(targetamt_netid).val(targetnewamt_val.toFixed(2));

                        //tax calculation
                        var basic_price = $('#basic_price_id_'+target2[1]).val();
                        

                        var total_tax=0;

                        if ($('#sgst_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#sgst_tax_id_'+target2[1]).val());

                        }

                        if ($('#cgst_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#cgst_tax_id_'+target2[1]).val());

                        }

                        if ($('#igst_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#igst_tax_id_'+target2[1]).val());

                        }

                        if ($('#ugst_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#ugst_tax_id_'+target2[1]).val());

                        }

                        if ($('#cess_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#cess_tax_id_'+target2[1]).val());

                        }

                        if ($('#apmc_tax_id_'+target2[1]).val()!='') {

                            total_tax += parseFloat($('#apmc_tax_id_'+target2[1]).val());

                        }

                        var total_tax_rupees = parseFloat(basic_price)*total_tax/100*target_new_qty;

                        $('#tax_id_'+target2[1]).val(total_tax_rupees.toFixed(2));

                        totalCost();
                       
                      }

                  });

                  if (duplicate_barcode==false){

                    var html='';
                    var mrp='';
                    var price='';
                    var sgst = '';
                    var cgst = '';
                    var igst = '';
                    var ugst = '';
                    var cess = '';
                    var apmc = '';
                    var gstoption ='';
                    count++;

                    mrp += '<td><select class="form-control mrp_price" id="mrp_price_id_'+count+'" name="mrp_price[]" data-parsley-required data-parsley-required-message="MRP Price is required."><option value="">Select MRP Price</option>';

                      for(var key in pricearray){

                        mrp += '<option value="'+pricearray[key].id+'">'+(pricearray[key].mrp_price).toFixed(2)+'</option>';

                      }

                        mrp += '</select></td>';

                    price='<td><input type="text" class="form-control" name="basic_price[]" value="" id="basic_price_id_'+count+'" readonly></td>';

                    var sgst_tax = data.sgst_tax;
                    if (sgst_tax==null) {

                        sgst_tax=0;
                    }
                    else{

                       sgst_tax= data.sgst_name.gst_rate;
                    }

                    var cgst_tax = data.cgst_tax;
                    if (cgst_tax==null) {

                        cgst_tax=0;
                    }
                    else{

                       cgst_tax= data.cgst_name.gst_rate;
                    }

                    var igst_tax = data.igst_tax;
                    if (igst_tax==null) {

                        igst_tax=0;
                    }
                    else{

                       igst_tax= data.igst_name.gst_rate;
                    }

                    var ugst_tax = data.ugst_tax;
                    if (ugst_tax==null) {

                        ugst_tax=0;
                    }
                    else{

                       ugst_tax= data.ugst_name.gst_rate;
                    }

                    var cess_tax = data.cess_tax;
                    if (cess_tax==null) {

                        cess_tax=0;
                    }
                    else{

                       cess_tax= data.cess_name.gst_rate;
                    }

                    var apmc_tax = data.apmc_tax
                    if (apmc_tax==null) {

                        apmc_tax=0;
                    }
                    else{

                       apmc_tax= data.apmc_name.gst_rate;
                    }

                    sgst += '<td><input type="text" class="form-control custom_tax" id="sgst_tax_id_'+count+'" name="sgst_tax[]" value="'+sgst_tax+'" readonly></td>';

                    cgst += '<td><input type="text" class="form-control custom_tax" id="cgst_tax_id_'+count+'" name="cgst_tax[]" value="'+cgst_tax+'" readonly></td>';

                    igst += '<td><input type="text" class="form-control custom_tax" id="igst_tax_id_'+count+'" name="igst_tax[]" value="'+igst_tax+'" readonly></td>';

                    ugst += '<td><input type="text" class="form-control custom_tax" id="ugst_tax_id_'+count+'" name="ugst_tax[]" value="'+ugst_tax+'" readonly></td>';

                    cess += '<td><input type="text" class="form-control custom_tax" id="cess_tax_id_'+count+'" name="cess_tax[]" value="'+cess_tax+'" readonly></td>';

                    apmc += '<td><input type="text" class="form-control custom_tax" id="apmc_tax_id_'+count+'" name="apmc_tax[]" value="'+apmc_tax+'" readonly></td>';

                    html += '<tr><td><input type="text" class="form-control duplicate_sku_code" name="sku_code[]" value="'+data.product_code+'" id="sku_code_id_'+count+'" readonly></td><td><input type="text" class="form-control" name="product_name[]" value="'+data.title+'" id="product_name_id_'+count+'" readonly></td>'+mrp+price+'<td><input type="text" class="form-control product_qty" name="quantity[]" value="1" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td><input type="text" class="form-control" name="weight[]" id="weight_id_'+i+'" data-parsley-required data-parsley-required-message="Weight is required." readonly></td>'+sgst+cgst+igst+ugst+cess+apmc+'<td><input type="text" class="form-control section_tax" name="tax[]" data-gst=""  value="" id="tax_id_'+count+'" ></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="product_amount[]" value="" readonly ></td><td><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';


                      $('#multiple_select tbody').append(html);
                  
                    
                  }

              }

            }


          }

      });


      $('.auto').val(''); 
      $('.auto').focus();

    };
      
    $(document).on('click','.remove',function(){

          $(this).closest('tr').remove();

          if ($('.section_amount').length==0) {

            $('.credit_note_display').css('display','none');

          }

          totalCost();

    });

    $(document).on('change','.mrp_price',function(){

          if ($(this).val!='') {

            var productmrp_val = $(this).val();
            var productmrp_id = $(this).attr('id');

            var target2 = productmrp_id.split('mrp_price_id_');
            var targetqty_netid = '#quantity_id_'+target2[1];
            var targetqty_val = $(targetqty_netid).val();

            var targetprice_netid = '#basic_price_id_'+target2[1];
            var targetamt_netid = '#amount_id_'+target2[1];
    
            $.ajax({

                url:"{{ route('admin.get_basic_price') }}",
                method:"GET",
                async:false,
                data:{
                    
                    id:productmrp_val,
                   
                },

                success:function(data){

                  if (data.status ==1) {

                      data = data.mrpdata;
                      $(targetprice_netid).val(data.basic_price.toFixed(2));                    
                      $(targetqty_netid).val(targetqty_val);                    
                      $(targetamt_netid).val((parseFloat(data.basic_price)*parseFloat(targetqty_val)).toFixed(2));

                      totaltax(target2[1]);

                  }
                  
                }

            })
          }

      });


      $(document).on('keyup','.product_qty',function(){

          var productqty_val = $(this).val();

          if (productqty_val !='') {

            var productqty_id = $(this).attr('id');

            var target2 = productqty_id.split('quantity_id_');
            var targetprice_netid = '#basic_price_id_'+target2[1];
            var targetamt_netid = '#amount_id_'+target2[1];
           
            var targetprice_val = $(targetprice_netid).val();

            var targetnewamt_val = parseFloat(targetprice_val)*parseFloat(productqty_val);

            $(targetamt_netid).val(targetnewamt_val.toFixed(2));


            //tax calculation

            totaltax(target2[1]);

          }


      });

      $(document).on('change','.custom_tax',function(){

          var targettaxid = $(this).attr('id');
          var target2 = targettaxid.split('_tax_id_');
          total_tax(target2[1]);

      });

      function totaltax(index){

        var basic_price = $('#basic_price_id_'+index).val();
        var productqty_val = $('#quantity_id_'+index).val();


        var total_tax=0;

          if ($('#sgst_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#sgst_tax_id_'+index).val());

          }

          if ($('#cgst_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#cgst_tax_id_'+index).val());

          }

          if ($('#igst_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#igst_tax_id_'+index).val());

          }

          if ($('#ugst_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#ugst_tax_id_'+index).val());

          }

          if ($('#cess_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#cess_tax_id_'+index).val());

          }

          if ($('#apmc_tax_id_'+index).val()!='') {

              total_tax += parseFloat($('#apmc_tax_id_'+index).val());

          }

          var total_tax_rupees = parseFloat(basic_price)*total_tax/100*parseFloat(productqty_val);

          $('#tax_id_'+index).val(total_tax_rupees.toFixed(2));

          totalCost();
      }



      function totalCost(){

        var total_amount=0;
        var total_tax =0;

        $('.section_amount').each(function(){

            var val = $(this).val();

            if (val=='') {

                val =0;
            }

            total_amount += parseFloat(val);

        });

        $('.section_tax').each(function(){

            var val = $(this).val();

            if (val=='') {

                val =0;
            }

            total_tax += parseFloat(val);

        });

        var grand_total = total_tax+total_amount;

        $('#sub_total').val(total_amount.toFixed(2));
        $('#total_tax').val(total_tax.toFixed(2));
        $('#grand_total').val((grand_total).toFixed(2));

      };

  </script>

@endsection
