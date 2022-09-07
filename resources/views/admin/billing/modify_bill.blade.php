@extends('admin.includes.main')
@section('title')
    
    <title>Billing | Billing Management</title>


@endsection

@section('style')
  
  <style type="text/css">
    
    .bill_amount{

      display: none;
    }

    .barcode_display{

      display: none;
    }

    .barcode_div{

      display: none;
    }

    .discount_display{

      display: none;
    }

    .previous_bill_div{

      display: none;
    }

    .return_rupees_div{
      display: none;
    }
  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-md-12 text-right">
          @if(Session::has('receiptid'))
          <a type="button" class="btn btn-sm btn-primary" href="{{ route('admin.billing.sale') }}">Back</a>
          @endif
        </div>
      </div>
      <form class="sform" id="billing_form" action="{{ route('admin.billing.update_bill') }}" method="post">
      @csrf      
      <div class="row bg-white mx-0 py-3 mt-2" id="add_customer_info">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="receipt_id">Receipt ID:<span>*</span></label>
                  <input class="form-control" name="receipt_id" id="receipt_id" data-parsley-required data-parsley-required-message="Receipt ID is required." placeholder="Enter Receipt ID" onchange="editbill(this.value)" list="receiptidlist">

                  <datalist id="receiptidlist" style="width: 100%">
                    
                  </datalist>
              </div>
            </div>
            
            <div class="col-md-3 previous_bill_div">
              <div class="form-group previous_bill">
                  <label for="previous_bill">Previous Bill Value:</label>
                  <input class="form-control" type="text" name="previous_bill"  id="previous_bill" autofocus>
              </div>
            </div>
            <div class="col-md-3 return_rupees_div">
              <div class="form-group return_rupees">
                  <label for="return_rupees">Return Rupees:</label>
                  <input class="form-control" type="text" name="return_rupees"  id="return_rupees" autofocus>
              </div>
              
            </div>
            <div class="col-md-3">
              <div class="form-group barcode_div">
                  <label for="barcode">Barcode ID:</label>
                  <input class="form-control" type="text" list="items" name="barcode_id" onchange="additem(this.value)" id="barcode_id" placeholder="Enter Barcode ID" autofocus>

                  <datalist id="items" style="width: 100%">
                    
                  </datalist>
                
              </div>
            </div>
            
            <div class="col-md-12">
              <table class="table" id="multiple_select">
                <thead class="table-primary">
                    <tr>
                      <td class="barcode_display">BarCode</td>
                      <td style="width: 200px;">Product Name</td>
                      <td style="width: 120px;">MRP Price (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td style="width: 120px;" id="customer_price">Selling Price (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td style="width: 100px;">Weight</td>
                      <td style="width: 60px" class="discount_display">Discount(%)</td>
                      <td style="width: 150px">Expiry Date</td>
                      <td style="width: 80px">Qty.</td>
                      <td style="width: 100px">Tax(<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Amount (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot class="t-footer">
                    <tr>
                      <td class="text-right" colspan="7"><strong>+ Sub Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control sub_total" style="width: 150px;" id="sub_total" name="sub_total" type="text" data-parsley-required data-parsley-required-message="Sub Total is required." readonly ></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="7" ><strong>+ Total Tax(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control total_tax" style="width: 150px;" id="total_tax" name="total_tax" type="text" data-parsley-required data-parsley-required-message="Total Tax is required." readonly></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="7"><strong>Grand Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control grand_total" style="width: 150px;" id="grand_total" name="grand_total" type="text" readonly data-parsley-required data-parsley-required-message="Grand Total is required."></td>
                    </tr>
                </tfoot>
              </table>
          </div>
          <div class="col-md-12 text-right">
            <button type="button" name="billing_submit" id="billing_submit" class="btn btn-primary">Submit Bill</button>
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

    @if(Session::has('receiptid'))

          $('#receipt_id').val("{{ Session::get('receiptid') }}");

          editbill("{{ Session::get('receiptid') }}");       

    @endif

    $('#sidebar').removeClass('c-sidebar-lg-show');

    $('#billing_submit').click(function(){

        if ($('#multiple_select tbody').find('tr').length>0) {

          if ($('#billing_form').parsley().isValid()) {

              var q = confirm('Are You Sure ? You want to Submit Bill.'); 

              if (q) {

                $('#billing_form').submit();

              }           
              
          }
          else{

            $('#billing_form').submit();
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

      

    function delay(callback, ms) {

      var timer = 0;
      return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
    }


    $("#receipt_id").keyup(delay(function (e) {

        var check = false;
        var valueq = $(this).val();

        $('#receiptidlist option').each(function(){

            if ($(this).val()==$('#receipt_id').val()) {

                $('#receiptidlist option').remove();
                check = true;

            }

        });

        if (check==false) {

          if (!$.isNumeric(valueq) && valueq !='') {
              
              $('#receiptidlist option').remove();
              var token = $('meta[name="csrf-token"]').attr('content');
                var html='';
                $.ajax({

                  url: "{{ route('admin.receipt_id_search') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                      _token:token,
                      search:valueq
                  },
                  success: function(data){
                    
                    if(data.status == 1){

                      var billingdata = data.billingdata;

            

                      for(key in billingdata){

                        html += '<option value="'+billingdata[key]+'"/>';
                      }
                                                
                    }
                    else{
                      
                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("No Record Found.");
                      html = '<option value="No Record Found" />';

                    }

                    $('#receiptidlist').html(html);
                    

                   }
                })
    
        }
      }
    }, 2000));

    function editbill(receipt_id){

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url:"{{ route('admin.get_offline_billing') }}",
            method:'POST',
            data:{

              _token:token,
              receipt_id:receipt_id,
            },
            success:function(data){

              var html='';
              if (data.status ==1) {

                billingdata = data.billingdata[0];

                var barcode_id = JSON.parse(billingdata.barcode);

                for(var key in barcode_id){

                  var unitbarcode = JSON.parse(billingdata.barcode)[key];
                  var unitproduct = JSON.parse(billingdata.product_name)[key];
                  var unitmrp = JSON.parse(billingdata.mrp_price)[key];
                  var unitprice = JSON.parse(billingdata.price)[key];
                  var unitdiscount = JSON.parse(billingdata.discount)[key];
                  var unitqty = JSON.parse(billingdata.quantity)[key];
                  var unittax = JSON.parse(billingdata.unit_tax)[key];
                  var tax = JSON.parse(billingdata.tax)[key];
                  var unitamount = JSON.parse(billingdata.amount)[key];
                  var weight = JSON.parse(billingdata.weight)[key];
                  var expiry_date = JSON.parse(billingdata.expiry_date)[key];

                  html += '<tr><td class="barcode_display"><input type="text" class="form-control duplicate_bar_code" name="bar_code[]" value="'+unitbarcode+'" id="bar_code_id_'+key+'" readonly></td><td style="width: 400px;"><input type="text" class="form-control" name="product_name[]" value="'+unitproduct+'" id="product_name_id_'+key+'" readonly></td><td><input class="form-control" id= "mrp_price_id_'+key+'" name="mrp_price[]" value="'+unitmrp+'" data-parsley-required data-parsley-required-message="MRP Price is required." readonly></td><td><input type="text" class="form-control" name="price[]" value="'+unitprice+'" id="price_id_'+key+'" readonly></td><td class="weight"><input class="form-control" id="weight_id_'+key+'" value="'+weight+'" readonly></td><td class="discount_display"><input type="text" class="form-control" id="discount_id_'+key+'" name="discount[]" value="'+unitdiscount+'" readonly></td><td><input type="text" class="form-control" id= "expiry_date_id_'+count+'" value="'+expiry_date+'" name="expiry_date[]" readonly></td><td><input type="text" class="form-control product_qty" name="quantity[]" id="quantity_id_'+key+'" value="'+unitqty+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td ><input style="width: 100px" type="text" class="form-control section_tax" name="tax[]" data-gst="'+unittax+'" value="'+tax+'" id="tax_id_'+key+'" readonly></td><td><input type="text" class="form-control section_amount" id="amount_id_'+key+'" name="product_amount[]" value="'+unitamount+'" readonly ></td><td style="width:8%"><button type="button" class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

                }

                $('#sub_total').val(billingdata.subtotal);
                $('#total_tax').val(billingdata.total_tax);
                $('#grand_total').val(billingdata.grand_total);
                $('#previous_bill').val(billingdata.grand_total);

                $('#multiple_select tbody td').remove();
                $('#multiple_select tbody').append(html);


                $('.previous_bill_div').show();
                $('.return_rupees_div').show();
                $('#return_rupees').val(0.00);
                


              }else{

                toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : true
                }
                toastr.error("Receipt ID does not Exists.");
              }

            }

        });

    }


    $("#barcode_id").keyup(delay(function (e) {

        var check = false;
        var valueq = $(this).val();

        $('#items option').each(function(){

            if ($(this).val()==$('#barcode_id').val()) {

                $('#items option').remove();
                check = true;

            }

        });

        if (check==false) {

          if (!$.isNumeric(valueq) && valueq !='') {
              
              $('#items option').remove();
              var token = $('meta[name="csrf-token"]').attr('content');
                var html='';
                $.ajax({

                  url: "{{ route('admin.item-search') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                      _token:token,
                      search:valueq
                  },
                  success: function(data){
                    console.log('manoj');
                    //Start
                    if(data.status == 1){

                      storeproductdata='';
                      storeproductdata = data;

                      var productdata = data.productdata;

            

                      for(key in productdata){

                        html += '<option value="'+productdata[key].title+'"/>';
                      }
                                                
                    }
                    else{
                      
                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("No Record Found.");
                      html = '<option value="No Record Found" />';

                    }

                    $('#items').html(html);
                    

                   }
                })
    

        }
      }
    }, 2000));

    var count = 0;
    function additem(bar_code){

      var token = $('meta[name="csrf-token"]').attr('content');

      var user_id = $('#customer_info').val();
     
      $.ajax({

          url:"{{ route('admin.get_billing_product') }}",
          method:'POST',
          data:{

              _token:token,
              bar_code:bar_code,
              user_id:user_id
              
          },

          success:function(data){

              if (data) {

                  var itemdataarr = data.productdata;
                  var gstdata = data.gstdata;
                  var m_status = data.membership_status;

                  if ($('#mrp_price_id_'+count).val()=='') {

                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("Select Previous Product MRP Price.");

                  }
                  else if ($('#expiry_date_id_'+count).val()=='') {

                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("Select Previous Product Expiry Date.");

                  }
                  else if (itemdataarr.length ==0) {

                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }

                      toastr.error("Item does not exists.");

                  }
                  else{

                      var productdata = itemdataarr[0].product_name;
                      var duplicate_barcode = false;

                      $('.duplicate_bar_code').each(function(){

                          if ($(this).val() == itemdataarr[0].barcode_id) {

                            duplicate_barcode=true;
                            var targetproductcodeid = $(this).attr('id');
                            var target2 = targetproductcodeid.split('bar_code_id_');
                            var targetmrpid = '#mrp_price_id_'+target2[1];
                            var targetpriceid = '#price_id_'+target2[1];
                            var basic_price = parseFloat($(targetpriceid).val());
                            var targetqty_id = '#quantity_id_'+target2[1];
                            var targettax_id = '#tax_id_'+target2[1];
                            var targetamt_id = '#amount_id_'+target2[1];            

                            var basictaxprice = parseFloat($(targettax_id).attr('data-gst'));

                            var targetqty_val = parseFloat($(targetqty_id).val());
                            // var targetmrp_val = $(targetmrpid).val();

                            var totalamount = basic_price*100*(targetqty_val+1)/(100+basictaxprice);
                            var totalgst =  basic_price*(targetqty_val+1)-totalamount;

                            $(targetqty_id).val(targetqty_val+1);
                            $(targettax_id).val(totalgst.toFixed(2));
                            $(targetamt_id).val(totalamount.toFixed(2));

                            totalCost();

                          }

                      });

                      if (duplicate_barcode==false){

                        var html='';
                        var mrp ='';
                        var price ='';
                        var amount ='';
                        var discount='';
                        var gst='';
                        var expiry='';

                        count++;

                        if (itemdataarr.length>1) {

                          mrp += '<td><select class="form-control mrp_price" id= "mrp_price_id_'+count+'" name="mrp_price[]" data-parsley-required data-parsley-required-message="MRP Price is required."><option value="">Select MRP Price</option>';

                            for(var key in itemdataarr){

                              mrp += '<option value="'+itemdataarr[key].id+'">'+(itemdataarr[key].mrp_price).toFixed(2)+'</option>';

                            }

                          mrp += '</select></td>';

                          price += '<td><input type="text" class="form-control" name="price[]" value="" id="price_id_'+count+'" readonly></td>';                 

                          html += '<tr><td class="barcode_display"><input type="text" class="form-control duplicate_bar_code" name="bar_code[]" value="'+itemdataarr[0].barcode_id+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 400px;"><input type="text" class="form-control" name="product_name[]" value="'+productdata.title+'" id="product_name_id_'+count+'" readonly></td>'+mrp+price+'<td class="weight"><input class="form-control" id="weight_id_'+count+'" value="'+itemdataarr[0].unit+'" readonly></td><td class="discount_display"><input type="text" class="form-control" id="discount_id_'+count+'" name="discount[]" readonly></td><td id="expiry_cell_id_'+count+'"></td><td><input type="text" class="form-control product_qty" name="quantity[]" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td><input type="text" class="form-control section_tax" name="tax[]" data-gst="'+gstdata+'"  value="'+gst+'" id="tax_id_'+count+'" readonly></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="product_amount[]" readonly ></td><td style="width:8%"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

                        }
                        else{

                          var product_expiry = itemdataarr[0].product_expiry;

                          mrp += '<td><select class="form-control" id= "mrp_price_id_'+count+'" name="mrp_price[]" data-parsley-required data-parsley-required-message="MRP Price is required." readonly><option value="'+itemdataarr[0].id+'">'+itemdataarr[0].mrp_price+'</option></select></td>';

                          if (product_expiry.length>1) {

                              expiry += '<td><select class="form-control" id= "expiry_date_id_'+count+'" name="expiry_date[]"><option value="">Select Expiry Date</option>';

                              for(var key in product_expiry){

                                expiry += '<option value="'+product_expiry[key].expiry_date+'">'+product_expiry[key].expiry_date+'</option>';

                              }

                              expiry += '</select></td>';

                          }else{

                             expiry += '<td><input type="text" class="form-control" id= "expiry_date_id_'+count+'" value="'+product_expiry[0].expiry_date+'" name="expiry_date[]" readonly></td>';
                          }

                          if (m_status==1) {

                              price += '<td><input type="text" class="form-control" name="price[]" value="'+itemdataarr[0].membership_price+'" id="price_id_'+count+'" readonly></td>';

                               amount = (itemdataarr[0].membership_price*100/(100+gstdata)).toFixed(2);

                               gst = (itemdataarr[0].membership_price-amount).toFixed(2);

                               discount = (itemdataarr[0].mrp_price-itemdataarr[0].membership_price)*100/itemdataarr[0].mrp_price;


                          }
                          else{

                              price += '<td><input type="text" class="form-control" name="price[]" value="'+itemdataarr[0].selling_price+'" id="price_id_'+count+'" readonly></td>';

                              amount = (itemdataarr[0].selling_price*100/(100+gstdata)).toFixed(2);

                               gst = (itemdataarr[0].selling_price-amount).toFixed(2);

                              discount = (itemdataarr[0].mrp_price-itemdataarr[0].selling_price)*100/itemdataarr[0].mrp_price;

                          }
                          
                          var discountround = Number((discount).toFixed(3));


                          html += '<tr><td class="barcode_display"><input type="text" class="form-control duplicate_bar_code" name="bar_code[]" value="'+itemdataarr[0].barcode_id+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 400px;"><input type="text" class="form-control" name="product_name[]" value="'+productdata.title+'" id="product_name_id_'+count+'" readonly></td>'+mrp+price+'<td class="weight"><input class="form-control" id="weight_id_'+count+'" value="'+itemdataarr[0].unit+'" readonly></td><td class="discount_display"><input type="text" class="form-control" id="discount_id_'+count+'" name="discount[]" value = "'+discountround+'" readonly></td>'+expiry+'<td><input type="text" class="form-control product_qty" name="quantity[]" value="1" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td><input type="text" class="form-control section_tax" name="tax[]" data-gst="'+gstdata+'"  value="'+gst+'" id="tax_id_'+count+'" readonly></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="product_amount[]" value="'+amount+'" readonly ></td><td style="width:8%"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

                        }

                        $('#multiple_select tbody').append(html);
                        $('.discount_display').hide();
                        $('.barcode_display').hide();
                        totalCost();  
                        
                      }


                  }

                  $('#barcode_id').val('');
                  $('#barcode_id').focus();
                  $('#items option').remove();

              }
          }

      });

    }


    $(document).on('click','.remove',function(){

          $(this).closest('tr').remove();

          if ($('.section_amount').length==0) {

            $('.credit_note_display').css('display','none');

          }
          totalCost();

    });


    $(document).on('change','.mrp_price',function(){

          var user_id = $('#customer_info').val();
          var productmrp_val = $(this).val();

          var productmrp_id = $(this).attr('id');

          var target2 = productmrp_id.split('mrp_price_id_');

          var targetqty_netid = '#quantity_id_'+target2[1];
          var targetprice_netid = '#price_id_'+target2[1];
          var targetgst_netid = '#tax_id_'+target2[1];
          var targetexpiry_netid = '#expiry_cell_id_'+target2[1];

          var targetqty_val = $(targetqty_netid).val();
          var targetdisc_netid = '#discount_id_'+target2[1];
          var targetamt_netid = '#amount_id_'+target2[1];

          $.ajax({

              url:"{{ route('admin.get_billing_productattr') }}",
              method:"GET",
              async:false,
              data:{
                  
                  id:productmrp_val,
                  qty:targetqty_val,
                  user_id:user_id,

              },

              success:function(data){

              var mrpexpiry='';
              var expirydata = data.productexpirydata;
              $(targetgst_netid).val(data.totalgst);
              $(targetamt_netid).val(data.amount);
              $(targetdisc_netid).val(data.discount);
              $(targetqty_netid).val(data.quantity);
              $(targetprice_netid).val(data.price);
              $(productmrp_id).attr('data-mrp',data.mrp_price);

              if(expirydata.length>1){

                  mrpexpiry += '<select class="form-control" id= "expiry_date_id_'+target2[1]+'" name="expiry_date[]"><option value="">Select Expiry Date</option>';

                  for(var key in expirydata){

                    mrpexpiry += '<option value="'+expirydata[key].id+'">'+expirydata[key].expiry_date+'</option>';

                  }

                  mrpexpiry += '</select>';

              }else if(expirydata.length==1){

                 mrpexpiry += '<input type="text" class="form-control" id= "expiry_date_id_'+target2[1]+'" value="'+expirydata[0].expiry_date+'" name="expiry_date[]" readonly>';
              }
              else{

                mrpexpiry += '<select class="form-control" id= "expiry_date_id_'+target2[1]+'" name="expiry_date[]"><option value="">Select Expiry Date</option></select>';
              }

              $(targetexpiry_netid).html('');
              $(targetexpiry_netid).append(mrpexpiry);

               
              $('#barcode_id').focus();
              totalCost();

                
              }

          })

      });


      $(document).on('change','.product_qty',function(){


          var productqty_val = $(this).val();

          if (productqty_val !='') {

            var productqty_id = $(this).attr('id');

            var target2 = productqty_id.split('quantity_id_');
            var targetprice_netid = '#price_id_'+target2[1];
            var targetamt_netid = '#amount_id_'+target2[1];
            var targettax_netid = '#tax_id_'+target2[1];
            var targetmrp_netid = '#mrp_price_id_'+target2[1];

            var basegstpercent = parseFloat($(targettax_netid).attr('data-gst'));
            // var targetmrp_val = $(targetmrp_netid).val();
            var targetprice_val = $(targetprice_netid).val();

            var targetnewamt_val = targetprice_val*100*productqty_val/(100+basegstpercent);

            var gstrupees = targetprice_val*productqty_val-targetnewamt_val;

            $(targetamt_netid).val(targetnewamt_val.toFixed(2));
            $(targettax_netid).val(gstrupees.toFixed(2));

            totalCost();
            $('#barcode_id').focus();

          }


      });


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

        var previous_bill = $('#previous_bill').val();
      
        $('#return_rupees').val((parseFloat(previous_bill)-parseFloat(grand_total)).toFixed(2));

      };

      @if(Session::has('billingid'))

        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }

        var url = "{{ route('admin.generate_offbill',['id'=>Session::get('billingid')]) }}";

        let newTab = window.open();
        newTab.location.href = url;

        setInterval(function(){ 

          location.reload(true);

        }, 3000);

    @endif

        
              
    


  </script>

@endsection
