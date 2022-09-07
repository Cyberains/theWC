@extends('admin.includes.main')
@section('title')
    
    <title>Edit GRN Without PO | Vendor Management</title>


@endsection

@section('style')
  
  <style type="text/css">
    .e-date{

      width: 130px !important;
    }
    .m-date{

      width: 130px !important;
    }

    .section_amount{

      width: 100px !important;
    }

    .chosen-container.chosen-container-single {

        width: 100% !important; /* or any value that fits your needs */
        
    }

    .weight,.unit_check{

      display: none;
    }

  </style>

@endsection

@section('body')
  
  <div class="container-fluid">
    <div class="fade-in">
      <div class="row align-items-center">
        <div class="col-md-9">
          
        </div>
      
        <div class="col-xl-3 col-md-3">              
          <div class="text-right">
            <a href="{{ route('admin.grn_without_po') }}" class="btn btn-sm btn-primary mr-2 "></i>&nbspBack
            </a>
            <a href="{{ route('admin.product') }}" class="btn btn-sm btn-primary " id="add-product"><i class="fa fa-plus"></i>&nbspAdd Product
            </a>
          </div>            
        </div>              
      </div>

      <form class="sform" id="grn_without_form" action="{{ route('admin.update_grn_without_po') }}" method="post">
      @csrf      
          <div class="row bg-white mx-0 py-3 mt-2" id="add_grn_info">
            <div class="col-xl-3 col-md-3">
          <div class="form-group">
            <label>GRN Without PO ID:</label>
            <input type="text" name="grnwopo_id" id="grnwopo" class="form-control" placeholder="Enter GRN ID" readonly>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
              <label for="supplier_info">Supplier ID:<span>*</span></label>
              <select class="form-control select2" name="supplier_info" id="supplier_info" data-parsley-required data-parsley-required-message="Supplier is required.">
                <option value=""> select one </option>
                @foreach($supplierdata as $data)
                  <option value="{{ $data->id }}">{{ $data->supplier_id }} ( {{ $data->supplier_name }} )</option>
                @endforeach
              </select>
            
          </div>
        </div>
        <div class="col-sm-3">
           <div class="form-group">
              <label for="invoic_enumber">Invoice Number <span>*</span></label>
              <input type="number" class="form-control" id="invoice_number" name="invoice_number" placeholder="Enter invoice Number" value="{{old('  invoice_number')}}" min="0" data-parsley-required data-parsley-required-message="invoice Number is required.">
            </div>
         </div>
          <div class="col-sm-3">
           <div class="form-group">
              <label for="invoice_value">Invoice Value <span>*</span></label>
              <input type="number" class="form-control" id="invoice_value" aria-describedby="invoice value" step="0.01" name="invoice_value" value="{{old('invoice_value')}}" placeholder="Enter Invoice Amount" min="0" data-parsley-required data-parsley-required-message="Invoice Value is required.">
            </div>
         </div>
         <div class="col-md-3">
          <div class="form-group">
            <label for="invoice_date">Invoice Date<span>*</span></label>
            <input type="date" class="form-control" id="invoice_date" aria-describedby="Invoice Date" name="invoice_date" value="{{old('invoice_date')}}" data-parsley-required data-parsley-required-message="Invoice Date is required.">
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="carrier">Carrier Name </label>
            <input type="text" class="form-control" id="carrier" name="carrier_name" placeholder="Enter Carrier Name" value="{{old('carriername')}}" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="delivery_date">Delivery Date<span>*</span></label>
            <input type="date" class="form-control" id="delivery_date" aria-describedby="Delivery Date" name="delivery_date" value="{{old('delivery_date')}}" data-parsley-required data-parsley-required-message="Delivery Date is required.">
            </div>
        </div>
        <div class="col-xl-3 col-md-3">
          <div class="form-group barcode_div">
            <label>Barcode ID:</label>
            <input class="form-control" type="text" list="items" name="barcode_id" onchange="additem(this.value)" id="barcode_id" placeholder="Enter Barcode ID" autofocus>

            <datalist id="items" style="width: 100%">
              
            </datalist>
            
          </div>
        </div>  
            <div class="col-md-12 table-responsive">
              <table class="table" id="multiple_select" style="width: 2350px">
                <thead class="table-primary">
                    <tr>
                      <td style="width: 180px;" class="barcode_display">BarCode</td>
                      <td style="width: 150px;">Product Name</td>
                      <td style="width: 140px;">HSN</td>
                      <td style="width: 100px;">MRP (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td style="width: 100px;">Basic(<small><i class="fa fa-rupee"></i></small>)</td>
                      <td style="width: 100px;">S.V.S.P (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td style="width: 100px;">E.B.S.P (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>SGST(%)</td>
                      <td>CGST(%)</td>
                      <td>IGST(%)</td>
                      <td>UGST(%)</td>
                      <td>CESS(%)</td>
                      <td>APMC(%)</td>
                       <td style="width: 70px;">Qty.</td>
                  
                       <td>Mfg. Date</td>
                      <td>Expiry Date</td>
                      <td>Tax(<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Amount (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot class="t-footer">
                    <tr>
                      <td class="text-right" colspan="17"><strong>+ Sub Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control sub_total" style="width: 120px;" id="sub_total" name="sub_total" type="text" data-parsley-required data-parsley-required-message="Sub Total is required." readonly ></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="17" ><strong>+ Total Tax(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control total_tax" style="width: 120px;" id="total_tax" name="total_tax" type="text" data-parsley-required data-parsley-required-message="Total Tax is required." readonly></td>
                    </tr>

                    <tr>
                      <td class="text-right" colspan="17"><strong>Grand Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control grand_total" style="width: 120px;" id="grand_total" name="grand_total" type="text" readonly data-parsley-required data-parsley-required-message="Grand Total is required."></td>
                    </tr>
                </tfoot>
              </table>
          </div>
          <div class="col-md-12 text-right mt-2">
            <button type="button" name="grn_without_submit" id="grn_without_submit" class="btn btn-primary">Update GRN</button>
          </div>                    
        </div>

      </form>  
      <!-- /.row-->
    </div>


  </div>

@endsection

@section('modal')

  <div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Product</h3>
          <form class="sform form" method="post" action="#" >
              @csrf
              <div class="row " style="padding: 30px;">                      
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name<span>*</span></label>
                        <input class="form-control" type="text" name="name" id="name" 
                        value="{{ old('name') }}" placeholder="Enter Customer Name"  data-parsley-required 
                            data-parsley-required-message="Customer Name is required.">                          
                    </div>
                </div> 
               
  
                <div class="col-md-12">
                   <div class="form-group">

                        <button  type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>

                        <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                   </div>
                </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>

@endsection

@section('script')
  
  <script type="text/javascript">

      var url1 = "{{ route('admin.edit_grn_without_po',['id'=>$data->id]) }}";
      var url2 = window.location.href;

      if (url1==url2) {

          $('a[href="'+'{{ route('admin.grn_without_po') }}' + '"]').addClass('c-active');

          $('a[href="' + '{{ route('admin.grn_without_po') }}' + '"]').parent().parent().parent().addClass('c-show');

      };

    @if(Session::has('grnwithoutpo'))

        $('#grnwopo_id').val("{{ Session::get('grnwithoutpo') }}");
        editgrnwopo("{{ Session::get('grnwithoutpo') }}");

    @endif

    $(document).on('focus',".e-date", function(){

        $(this).datepicker({

          format:'dd-mm-yyyy'
        });

    });

    $(document).on('focus',".m-date", function(){

        $(this).datepicker({

          format:'dd-mm-yyyy'
        });

    });

    $('#supplier_info').chosen();

    function editgrnwopo(grnwopoid){

      var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url:"{{ route('admin.get_grn_without_po') }}",
            method:'POST',
            data:{

              _token:token,
              grnwopo_id:grnwopoid,
            },
            success:function(data){

              var html='';
                            
              if (data.status ==1) {

                grnwopodata = data.grnwopodata;

                var barcode_id = JSON.parse(grnwopodata.barcode);

                for(var key in barcode_id){

                  var mrp ='';
                  var b_price ='';
                  var amount = '';
                  var discount = '';
                  var gst='';
                  var expiry='';
                  var mfg = '';

                  var svsellprice='';
                  var ebsellprice ='';

                  var sgst='';
                  var cgst='';
                  var igst='';
                  var ugst='';
                  var cess ='';
                  var apmc='';
                  var hsn ='';

                  count++;
                  var unitbarcode = JSON.parse(grnwopodata.barcode)[key];
                  var unitproduct = JSON.parse(grnwopodata.product_name)[key];
                  var unitqty = JSON.parse(grnwopodata.quantity)[key];
                  var unitmrp = JSON.parse(grnwopodata.mrp_price)[key];
                  var unitbasicprice = JSON.parse(grnwopodata.unit_price)[key];
                  var unitcostprice = JSON.parse(grnwopodata.cost_price)[key];
                  var unitsvsellprice = JSON.parse(grnwopodata.sv_sell_price)[key];
                  var unitebsellprice = JSON.parse(grnwopodata.eb_sell_price)[key];

                  var weight = JSON.parse(grnwopodata.weight)[key];
                  var unit = JSON.parse(grnwopodata.unit)[key];
                  var gstdata = JSON.parse(grnwopodata.unit_tax)[key];
                  var sgsttax = JSON.parse(grnwopodata.sgst)[key];
                  var cgsttax = JSON.parse(grnwopodata.cgst)[key];
                  var igsttax = JSON.parse(grnwopodata.igst)[key];
                  var ugsttax = JSON.parse(grnwopodata.ugst)[key];
                  var cesstax = JSON.parse(grnwopodata.cess)[key];
                  var apmctax = JSON.parse(grnwopodata.apmc)[key];
                  var hsn = JSON.parse(grnwopodata.hsn_sac)[key];
                  
                  var tax = JSON.parse(grnwopodata.tax)[key];
                  var unitamount = JSON.parse(grnwopodata.amount)[key];
            
                  var mfg_date = JSON.parse(grnwopodata.mfg_date)[key];
                  var expiry_date = JSON.parse(grnwopodata.exp_date)[key];
                  

                  mrp = '<td><input class="form-control mrp_price" id= "mrp_price_id_'+count+'" name="mrp_price[]" value="'+unitmrp+'" data-parsley-required data-parsley-required-message="MRP Price is required."></td>';

                  b_price +='<td><input type="text" class="form-control basic_price" name="basic_price[]" value="'+unitbasicprice+'" id="cost_price_id_'+count+'"></td>';


                  expiry = '<td><input type="text" class="form-control e-date" id= "expiry_date_id_'+count+'" value="'+expiry_date+'" placeholder="dd-mm-yyyy" name="expiry_date[]" ></td>';

                  mfg = '<td><input type="text" class="form-control m-date" id= "mfg_date_id_'+count+'" placeholder="dd-mm-yyyy" name="mfg_date[]" value="'+mfg_date+'" ></td>';

                  svsellprice += '<td><input type="text" class="form-control svsell_price" name="svsell_price[]" value="'+unitsvsellprice+'" id="svsell_price_id_'+count+'"></td>';

                  ebsellprice += '<td><input type="text" class="form-control" name="ebsell_price[]" value="'+unitebsellprice+'" id="ebsell_price_id_'+count+'"></td>';

                  sgst = '<td><input type="text" class="form-control" name="sgst[]" value="'+sgsttax+'" id="sgst_id_'+count+'" readonly></td>';

                  cgst = '<td><input type="text" class="form-control" name="cgst[]" value="'+cgsttax+'" id="cgst_id_'+count+'" readonly></td>';

                  igst = '<td><input type="text" class="form-control" name="igst[]" value="'+igsttax+'" id="igst_id_'+count+'" readonly></td>';

                  ugst = '<td><input type="text" class="form-control" name="ugst[]" value="'+ugsttax+'" id="ugst_id_'+count+'" readonly></td>';

                  cess = '<td><input type="text" class="form-control" name="cess[]" value="'+cesstax+'" id="cess_id_'+count+'" readonly></td>';

                  apmc = '<td><input type="text" class="form-control" name="apmc[]" value="'+apmctax+'" id="apmc_id_'+count+'" readonly></td>';

                  hsn = '<td><input type="text" class="form-control" name="hsn[]" value="'+hsn+'" id="hsn_id_'+count+'"></td>';
                               
                  html += '<tr><td class="barcode_display"><input type="text" class="form-control duplicate_bar_code" name="bar_code[]" value="'+unitbarcode+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 300px;"><input type="text" class="form-control" name="product_name[]" value="'+unitproduct+'" id="product_name_id_'+count+'" readonly></td>'+hsn+mrp+b_price+svsellprice+ebsellprice+'<td class="weight"><input class="form-control" id="weight_id_'+count+'" name="weight[]" value="'+weight+'" readonly></td><td class="unit_check"><input class="form-control" id="unit_id_'+count+'" name="unit[]" value="'+unit+'" readonly></td>'+sgst+cgst+igst+ugst+cess+apmc+'<td style="width:100px"><input type="text" class="form-control product_qty" name="quantity[]" id="quantity_id_'+count+'" value="'+unitqty+'" data-parsley-required data-parsley-required-message="Quantity is required."></td>'+mfg+expiry+'<td style="width:120px"><input type="text" class="form-control section_tax" name="tax[]" value="'+tax+'" data-gst="'+gstdata+'" id="tax_id_'+count+'" readonly></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="product_amount[]" value="'+unitamount+'" readonly ></td><td style="width:100px"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

                }

                $('#sub_total').val(grnwopodata.sub_total);
                $('#total_tax').val(grnwopodata.total_tax);
                $('#grand_total').val(grnwopodata.grand_total);

                $('#grnwopo').val(grnwopodata.lr_number);
                $('#supplier_info').val(grnwopodata.supplier_id).trigger('chosen:updated');
                $('#invoice_number').val(grnwopodata.invoice_number);
                $('#invoice_value').val(grnwopodata.invoice_value);
                $('#invoice_date').val(grnwopodata.invoice_date);
                $('#carrier').val(grnwopodata.carrier_name);
                $('#delivery_date').val(grnwopodata.delivery_date);

                $('#multiple_select tbody td').remove();
                $('#multiple_select tbody').append(html);


              }else{

                toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : true
                }
                toastr.error("GRN PO ID does not Exists.");
              }

            }

        });

    }

  
    $('#sidebar').removeClass('c-sidebar-lg-show');

    $('#grn_without_submit').click(function(){

        if ($('#multiple_select tbody').find('tr').length>0) {

          if ($('#grn_without_form').parsley().isValid()) {

              if (parseFloat($('#invoice_value').val())!=parseFloat($('#grand_total').val())) {

                  toastr.options =
                  {
                    "closeButton" : true,
                    "progressBar" : true
                  }

                  toastr.error('Grand Total should be equal to Invoice value.');

              }
              else{

                  var q = confirm('Are You Sure ? You want to Save GRN.'); 

                  if (q) {

                    $('#grn_without_form').submit();

                  }
              }                   
              
          }
          else{

            $('#grn_without_form').submit();
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

          url:"{{ route('admin.get_grn_product') }}",
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
                  var productgenuinedata = data.productgenuine;

                  if ($('#mrp_price_id_'+count).val()=='') {

                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("Select Previous Product MRP Price.");

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
                            var targetpriceid = '#svsell_price_id_'+target2[1];

                            var svsell_price = parseFloat($(targetpriceid).val());
                            var targetqty_id = '#quantity_id_'+target2[1];
                            var targettax_id = '#tax_id_'+target2[1];
                            var targetamt_id = '#amount_id_'+target2[1];            

                            var basictaxprice = parseFloat($(targettax_id).attr('data-gst'));

                            var targetqty_val = parseFloat($(targetqty_id).val());
                            

                            var total_amount = (parseFloat(svsell_price)*(parseFloat(targetqty_val)+1)).toFixed(2);

                            var basic_price = (parseFloat(svsell_price)*100)/(basictaxprice+100);

                            var total_tax = ((parseFloat(svsell_price)-basic_price)*(parseFloat(targetqty_val)+1)).toFixed(2);


                            var total_unit_amount = (basic_price*(parseFloat(targetqty_val)+1)).toFixed(2);

                            $(targetqty_id).val(parseFloat(targetqty_val)+1);
                            $(targettax_id).val(total_tax);
                            $(targetamt_id).val(total_unit_amount);

                            totalCost();

                          }

                      });

                      if (duplicate_barcode==false){

                        var html='';
                        var mrp ='';
                        var b_price ='';
                        var amount ='';
                        var discount='';
                        var gst='';
                        var expiry='';
                        var mfg = '';

                        var svsellprice='';
                        var ebsellprice ='';

                        var sgst='';
                        var cgst='';
                        var igst='';
                        var ugst='';
                        var cess ='';
                        var apmc='';
                        var hsn ='';



                        count++;

                        var product_expiry = itemdataarr[0].product_expiry;

                        if (productgenuinedata.sgst_name !=null) {

                            var sgsttax = productgenuinedata.sgst_name.gst_rate;
                        }else{

                            sgsttax = 0;
                        }

                        if (productgenuinedata.cgst_name !=null) {

                            var cgsttax = productgenuinedata.cgst_name.gst_rate;
                        }else{

                            cgsttax = 0;
                        }

                        if (productgenuinedata.igst_name !=null) {

                            var igsttax = productgenuinedata.igst_name.gst_rate;
                        }else{

                            igsttax = 0;
                        }

                        if (productgenuinedata.ugst_name !=null) {

                            var ugsttax = productgenuinedata.ugst_name.gst_rate;
                        }else{

                            ugsttax = 0;
                        }

                        if (productgenuinedata.ugst_name !=null) {

                            var ugsttax = productgenuinedata.ugst_name.gst_rate;
                        }else{

                            ugsttax = 0;
                        }

                        if(productgenuinedata.cess_name !=null) {

                            var cesstax = productgenuinedata.cess_name.gst_rate;
                        }else{

                            cesstax = 0;
                        }

                        if (productgenuinedata.apmc_name !=null) {

                            var apmctax = productgenuinedata.apmc_name.gst_rate;
                        }else{

                            apmctax = 0;
                        }

                          mrp += '<td><input class="form-control mrp_price" id= "mrp_price_id_'+count+'" name="mrp_price[]" data-parsley-required data-parsley-required-message="MRP Price is required."></td>';

                          expiry += '<td><input type="text" class="form-control e-date" id= "expiry_date_id_'+count+'"  placeholder="dd-mm-yyyy" name="expiry_date[]" ></td>';


                           mfg = '<td><input type="text" class="form-control m-date" id= "mfg_date_id_'+count+'" placeholder="dd-mm-yyyy" name="mfg_date[]" ></td>';

                          //expiry += '<td><input type="date" class="form-control e-date" id= "expiry_date_id_'+count+'" placeholder="dd-mm-yyyy" name="expiry_date[]" ></td>';

                          //mfg += '<td><input type="date" class="form-control m-date" id= "mfg_date_id_'+count+'" placeholder="dd-mm-yyyy" name="mfg_date[]" ></td>';
                         

                          b_price +='<td><input type="text" class="form-control basic_price" name="basic_price[]" id="basic_price_id_'+count+'"></td>';

                          svsellprice += '<td><input type="text" class="form-control svsell_price" name="svsell_price[]" id="svsell_price_id_'+count+'"></td>';

                          ebsellprice += '<td><input type="text" class="form-control" name="ebsell_price[]" id="ebsell_price_id_'+count+'"></td>';

                          sgst += '<td><input type="text" class="form-control" name="sgst[]" value="'+sgsttax+'" id="sgst_id_'+count+'" readonly></td>';

                          cgst += '<td><input type="text" class="form-control" name="cgst[]" value="'+cgsttax+'" id="cgst_id_'+count+'" readonly></td>';

                          igst += '<td><input type="text" class="form-control" name="igst[]" value="'+igsttax+'" id="igst_id_'+count+'" readonly></td>';

                          ugst += '<td><input type="text" class="form-control" name="ugst[]" value="'+ugsttax+'" id="ugst_id_'+count+'" readonly></td>';

                          cess += '<td><input type="text" class="form-control" name="cess[]" value="'+cesstax+'" id="cess_id_'+count+'" readonly></td>';

                          apmc += '<td><input type="text" class="form-control" name="apmc[]" value="'+apmctax+'" id="apmc_id_'+count+'" readonly></td>';

                          hsn += '<td><input type="text" class="form-control" name="hsn[]" value="'+productgenuinedata.hsn_code+'" id="hsn_id_'+count+'"></td>';
                              
                          html += '<tr><td class="barcode_display"><input type="text" class="form-control duplicate_bar_code" name="bar_code[]" value="'+itemdataarr[0].barcode_id+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 300px;"><input type="text" class="form-control" name="product_name[]" value="'+productdata.title+'" id="product_name_id_'+count+'" readonly></td>'+hsn+mrp+b_price+svsellprice+ebsellprice+'<td class="weight"><input class="form-control" id="weight_id_'+count+'" name="weight[]" value="'+itemdataarr[0].unit+'" readonly></td><td class="unit_check"><input class="form-control" id="unit_id_'+count+'" name="unit[]" value="'+itemdataarr[0].unit_check+'" readonly></td>'+sgst+cgst+igst+ugst+cess+apmc+'<td style="width:100px"><input type="text" class="form-control product_qty" name="quantity[]" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td>'+mfg+expiry+'<td style="width:120px"><input type="text" class="form-control section_tax" name="tax[]" data-gst="'+gstdata+'" id="tax_id_'+count+'" readonly></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="product_amount[]" readonly ></td><td style="width:100px"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

            

                        $('#multiple_select tbody').append(html);
                        $('.discount_display').hide();
            
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

          var productmrp_val = $(this).val();

          var productmrp_id = $(this).attr('id');

          var target2 = productmrp_id.split('mrp_price_id_');

          var targetqty_netid = '#quantity_id_'+target2[1];
          var targetsvsellprice_netid = '#svsell_price_id_'+target2[1];
          var targetgst_netid = '#tax_id_'+target2[1];

          var targetsvsellprice_val = $(targetsvsellprice_netid).val();
          var targetqty_val = $(targetqty_netid).val();
          
          var targetamt_netid = '#amount_id_'+target2[1];
          var total_unit_tax = parseFloat($(targetgst_netid).data('gst'));

          if (targetqty_val!= '' && productmrp_val!='' && targetsvsellprice_val!='') {

              total_amount = (parseFloat(targetsvsellprice_val)*parseFloat(targetqty_val)).toFixed(2);

              basic_price = (parseFloat(targetsvsellprice_val)*100)/(total_unit_tax+100);

              total_tax = ((parseFloat(targetsvsellprice_val)-basic_price)*parseFloat(targetqty_val)).toFixed(2);

               total_unit_amount = (parseFloat(basic_price)*parseFloat(targetqty_val)).toFixed(2);

          }else{

              total_unit_amount ='';
              total_tax='';

          }

          $(targetamt_netid).val(total_unit_amount);
          $(targetgst_netid).val(total_tax);
          
          totalCost();

      });


    $(document).on('change','.svsell_price',function(){

          var targetsvsellprice_val = $(this).val();

          var targetsvsell_id = $(this).attr('id');

          var target2 = targetsvsell_id.split('svsell_price_id_');

          var targetqty_netid = '#quantity_id_'+target2[1];
          var targetmrpprice_netid = '#mrp_price_id_'+target2[1];
          var targetgst_netid = '#tax_id_'+target2[1];

          var targetmrpprice_val = $(targetmrpprice_netid).val();
          var targetqty_val = $(targetqty_netid).val();
          
          var targetamt_netid = '#amount_id_'+target2[1];
          var total_unit_tax = parseFloat($(targetgst_netid).data('gst'));

          if (targetqty_val!= '' && targetmrpprice_val!='' && targetsvsellprice_val!='') {

              total_amount = (parseFloat(targetsvsellprice_val)*parseFloat(targetqty_val)).toFixed(2);

              basic_price = (parseFloat(targetsvsellprice_val)*100)/(total_unit_tax+100);

              total_tax = ((parseFloat(targetsvsellprice_val)-basic_price)*parseFloat(targetqty_val)).toFixed(2);

               total_unit_amount = (parseFloat(basic_price)*parseFloat(targetqty_val)).toFixed(2);

          }else{

              total_unit_amount ='';
              total_tax='';
          }

          $(targetamt_netid).val(total_unit_amount);
          $(targetgst_netid).val(total_tax);
          
          totalCost();

      });


        $(document).on('change','.product_qty',function(){

          var productqty_val = $(this).val();

          if (productqty_val !='') {

            var productqty_id = $(this).attr('id');

            var target2 = productqty_id.split('quantity_id_');
            var targetsvsellprice_netid = '#svsell_price_id_'+target2[1];
            var targetamt_netid = '#amount_id_'+target2[1];
            var targettax_netid = '#tax_id_'+target2[1];
            var targetmrp_netid = '#mrp_price_id_'+target2[1];

            var total_unit_tax = parseFloat($(targettax_netid).attr('data-gst'));
            
            var targetmrp_val = $(targetmrp_netid).val();
            var targetsvsellprice_val = $(targetsvsellprice_netid).val();

            if (productqty_val!='' && targetmrp_val!='' && targetsvsellprice_val!='') {

               total_amount = (parseFloat(targetsvsellprice_val)*parseFloat(productqty_val)).toFixed(2);

              basic_price = (parseFloat(targetsvsellprice_val)*100)/(total_unit_tax+100);

              total_tax = ((parseFloat(targetsvsellprice_val)-basic_price)*parseFloat(productqty_val)).toFixed(2);

               total_unit_amount = (parseFloat(basic_price)*parseFloat(productqty_val)).toFixed(2);

            }
            else{

              var total_unit_amount='';
              var total_tax='';

            }

            $(targetamt_netid).val(total_unit_amount);
            $(targettax_netid).val(total_tax);

            totalCost();
            
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

      };

        
      $(document).on('#add-product','click',function(e){

        e.preventDefault();
        {{ Session::put('addproduct','addproduct') }};
        window.location.href = "{{ route('admin.product') }}";

      });        
    


  </script>

@endsection
