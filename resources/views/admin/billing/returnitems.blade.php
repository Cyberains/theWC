@extends('admin.includes.main')
@section('title')
    
    <title>Billing | Return Items</title>


@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Billing Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Return Item</li>

@endsection

@section('style')
  
  <style type="text/css">
    
    .barcode_div{

      display: none;
    }

    .payment_type{

      display: none;

    }

    .membership_div{

      display: none;
    }
    .membership_receipt_div{

      display: none;
    }

    .radio_div{

      width: auto !important;
    }

    .cn_id{

      display: none;
    }

    .cn_preview{

      display: none;
    }

    .credit_note_display{

      display: none;
    }

    .received_cash{

      display: none;
    }

    .chosen-container.chosen-container-single {

        width: 100% !important; /* or any value that fits your needs */
        
    }

    .return_cash{

        display: none;
    }

  </style>

@endsection

@section('body')
  
  @php

      $checkmembershipdata = App\Models\Membership::count();

  @endphp

  <div class="container-fluid">
    <div class="fade-in">
      <div class="row ">
          <div class="col-xl-12 col-md-12 d-flex justify-content-between">                   
              <div class="d-flex align-items-center" style="display: none !important;">
                <div>
                  <p class="mb-0" style="font-weight: 600">Credit Note:</p>
                </div>
                <div class="mr-3 ml-2">
                  <label class="mb-0" for="c-yes">Yes</label>
                  <input type="radio" name="cn_status" id="c-yes">
                </div>
                <div>
                  <label class="mb-0" for="c-no">No</label>
                  <input type="radio" name="cn_status" id="c-no" checked>
                </div>
                <div class="cn_id ml-3">
                  <form action="{{ route('admin.check_credit_notes') }}" method="POST" class="d-flex align-items-center sform" id="check_submit">
                    @csrf
                    <span style="width: 180px;">Credit Number:</span>
                    <input type="text" name="cn_id_number" id="cn_number" class="form-control">
                    <button type="submit" class="btn btn-sm ml-1 btn-primary" name="credit_submit">Check</button>
                  </form>                 
                </div>
                <div class="cn_preview ml-4">
                  <div class="cn_preview_div">
                    
                  </div>
                  <div>
                      <input type="text" name="credit_input_rupee" id="credit_input_rupee" hidden>
                      <button type="button" id="apply_preview_cn" class="btn btn-sm btn-primary ml-2">Apply</button>
                      <button type="button" id="cancel_preview_cn" class="btn btn-sm btn-primary ml-2">Cancel</button>  
                                                      
                  </div>                  
                </div>
              </div>              
              <div style="display:none;">
                <button class="btn btn-sm btn-primary" id="add-customer"><i class="fa fa-plus"></i>&nbspAdd Customer</button>
              </div>
              
          </div>                    
      </div>

      <form class="sform" id="billing_form" action="{{ route('admin.add_returnitems') }}" method="post">
      @csrf      
      <div class="row bg-white mx-0 py-3 mt-2" id="add_customer_info">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="receipt_id">Receipt Id:<span>*</span></label>
                  <input class="form-control" name="receipt_id" id="receipt_id" data-parsley-required data-parsley-required-message="Receipt Number is required." list="receipt_search" placeholder="Enter Receipt Number">
                   <datalist id="receipt_search">
                      
                    </datalist>
                
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
                      <td class="barcode_display" style="display: none;">BarCode</td>
                      <td style="width: 200px;">Product Name</td>
                      <td style="width: 120px;">MRP Price (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td id="customer_price">Price (<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Weight</td>
                      <td class="discount_display">Discount(%)</td>
                      <td>Expiry Date</td>
                      <td>Qty.</td>
                      <td>Garbage<br>(Qty)</td>
                      <td>Tax(<small><i class="fa fa-rupee"></i></small>)</td>
                      <td>Amount (<small><i class="fa fa-rupee"></i></small>) </td>
                      <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot class="t-footer">
                    <tr>
                      <td class="text-right" colspan="9"><strong>+ Sub Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control sub_total" style="width: 150px;" id="sub_total" name="sub_total" type="text" data-parsley-required data-parsley-required-message="Sub Total is required." readonly ></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="9" ><strong>+ Total Tax(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control total_tax" style="width: 150px;" id="total_tax" name="total_tax" type="text" data-parsley-required data-parsley-required-message="Total Tax is required." readonly></td>
                    </tr>
                    <tr class="credit_note_display">

                      <td class="text-right" colspan="9"><strong>- Credit Note(<small><i class="fa fa-rupee"></i></small>)</strong><br><br><small>Remains Credit:</small></td>
                      <td style="text-align: left;"><input type="text" name="genuine_cn_number" id="genuine_cn_number" class="form-control" hidden disabled ><input class="form-control credit_note_rupees" style="width: 150px;" id="credit_note_rupees" name="credit_note_rupees" value="0" type="text" disabled><small id="remains_credit"></small></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="9"><strong>Grand Total(<small><i class="fa fa-rupee"></i></small>)</strong></td>
                      <td><input class="form-control grand_total" style="width: 150px;" id="grand_total" name="grand_total" type="text" readonly data-parsley-required data-parsley-required-message="Grand Total is required.">

                      </td>
                    </tr>
                </tfoot>
              </table>
          </div>
          <div class="col-md-12 text-right">
            <button type="button" name="billing_submit" id="billing_submit" class="btn btn-primary">Submit</button>
          </div>                    
        </div>

      </form>  
      <!-- /.row-->
    </div>


  </div>

@endsection

@section('modal')

<div class="modal fade" id="mobile-otp-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-body my-3">
        <h4>Verify Your Mobile Number</h4>
        <p>OTP has been sent on: (+91) <strong id="mobile-sent"></strong></p>
         <p id="mobile-resend"></p>
          <form class="sform form-signin" id="otp-form" method="POST" action="{{ route('admin.verify_mobile') }}">
            @csrf
            <input type="text" name="mobile" id="mobile-modal" value="" hidden="hidden">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP"        
                          data-parsley-pattern="^[0-9]{1,6}$"
                          data-parsley-pattern-message="Enter valid OTP number."
                          data-parsley-maxlength="6"
                          data-parsley-maxlength-message="Enter valid OTP number." 
                          data-parsley-minlength="6"
                          data-parsley-minlength-message="Enter valid OTP number."
                          data-parsley-required 
                          data-parsley-required-message="This field is required."
                          >
                 
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-otp"></strong>
                      </span>
              
                </div>
              </div>                 
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Verify OTP">
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">

                <form class="form-signin" method="POST" id="resend_otp" action="{{ route('admin.sendOTP') }}">
                  @csrf
                  <input type="text" id="mobile-modal-resend" name="mobile_no" value="" hidden="hidden">

                  <div class="d-flex justify-content-between mt-4">
                      
                      <button type="submit" class="btn btn-success btn-sm text-right">RESEND OTP</button>
    
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Customer</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_customer') }}" >
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
                        <label for="mobile">Mobile<span>*</span></label>
                        <input class="form-control" type="text" name="mobile" id="mobile" 
                        value="{{ old('mobile') }}" placeholder="Enter Mobile Number"  data-parsley-required data-parsley-required-message="Mobile Number is required." data-parsley-pattern="^[6-9]\d{9}$"
                            data-parsley-pattern-message="Enter valid mobile number."
                            data-parsley-maxlength="10"
                            data-parsley-maxlength-message="Enter valid mobile number." 
                            data-parsley-minlength="10"
                            data-parsley-minlength-message="Enter valid mobile number.">                          
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" 
                        value="{{ old('email') }}" placeholder="Enter Email" >                          
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


  <div class="modal fade" id="add_membership_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Select Membership</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_customer_membership') }}" >
              @csrf
              <div class="row " style="padding: 30px;">                 
                <input type="number" name="user_id" value="" id="m_user_id" hidden>
                @foreach($membershipdata as $membership)    
                  <div class="col-md-12 mb-2">
                      <ul class="list-group">
                        <li for="membership_id" class="list-group-item membership_select d-flex justify-content-between align-items-center">
                          <div>
                            @if($membership->duration == 29)
                              Monthly ( <strong>{{ $membership->price }} Rs/month</strong> )
                            @elseif($membership->duration == 89)
                              Quaterly ( <strong>{{ $membership->price }} Rs/quater</strong> )
                            @else
                              Yearly ( <strong>{{ $membership->price }} Rs/year</strong> )
                            @endif
                          </div>
                            
                          <input class="d-inline radio_div" type="radio" id="membership_id" name="membership" value="{{ $membership->id }}" data-parsley-required data-parsley-required-message="Membership is required.">
                        </li>
                      </ul>
                  </div> 
                  @endforeach

                  <div class="col-md-12">
                    <div class="form-group payment_type">
                        <label for="payment_type">Payment Method:<span>*</span></label>
                        <select class="form-control" type="text" name="payment_type" id="payment_type" data-parsley-required 
                        data-parsley-required-message="Payment Type is required." autofocus>
                          <option value="">Select Payment Type </option>
                          <option value="Free">Free</option>
                          <option value="Cash">Cash</option>
                          <option value="Debit Card">Debit Card</option>
                          <option value="Credit Card">Credit Card</option>
                          <option value="Paytm Wallet">Paytm Wallet</option>
                          <option value="Phone Pay">Phone Pay</option>
                          <option value="Google Pay">Google Pay</option>
                          <option value="Amazon Pay">Amazon Pay</option>
                          <option value="Others">Others</option>
                        </select>                     
                    </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="m-check-submit" class="btn btn-primary" style="float: right;">Save</button>

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

    $('#sidebar').removeClass('c-sidebar-lg-show');

    document.onkeydown = function(e) {

      if(e.keyCode == 112) {

        $('#add-customer').trigger('click');
        return false;

      }

      if(e.keyCode == 113){

          $("#customer_info").focus();
          return false;

      }

      if(e.keyCode == 114){

          $("#customer_info").trigger('chosen:close');
          return false;

      }

      if(e.keyCode == 115){

          $("#barcode_id").focus();
          return false;

      }

      if(e.keyCode == 116){

          $("#payment_type").trigger('chosen:open');
          return false;


      }


      if(e.ctrlKey && e.keyCode == 83){

          $("#billing_submit").trigger('click');
          return false;


      }

      if(e.ctrlKey && e.keyCode == 71){

          $("#generate_bill").trigger('click');
          return false;


      }

      if(e.ctrlKey && e.keyCode == 77){

          $("#add_membership").trigger('click');
          return false;


      }


    }

    
    $(document).ready(function(){

      $(document).on('change','#received_cash',function(){

        var grand_total = $('#grand_total').val();
        var received_cash = $(this).val();
        $('.return_cash').show();
        $('.return_rupees').html('');
        $('.return_rupees').append((parseFloat(received_cash)-parseFloat(grand_total)).toFixed(2)+'/-');

    });

      @if(Session::has('returnbill_id'))

            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }

            var url = "{{ route('admin.generatereturnbill',['id'=>Session::get('returnbill_id')]) }}";

            let newTab = window.open();
            newTab.location.href = url;

            setInterval(function(){ 

              location.reload(true);

            }, 3000);

        @endif

        // $(document).on('click','#generate_bill' , function(e){ 

        //     e.preventDefault(); 
        //     var url = $(this).attr('href');
        //     window.open(url, '_blank');

        //     setInterval(function(){ 

        //       location.reload(true);

        //      }, 3000);

        // });

        $('#c-yes').click(function(){

          $('.cn_id').show();

        });

        $('#c-no').click(function(){
                          
          $('.cn_id').hide();

        });

        $('#billing_submit').click(function(){

            if ($('#multiple_select tbody').find('tr').length>0) {

              if ($('#billing_form').parsley().isValid()) {

                  var q = confirm('Are You Sure ? You want to return Items.'); 

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

        $('#payment_type').change(function(){

            if ($(this).val()=='COD'||$(this).val()=='Card'||$(this).val()=='Wallet'||$(this).val()=='Others') {

              $('.received_cash').show();
              $('#received_cash').attr('data-parsley-required',true)
              $('#received_cash').attr('data-parsley-required-message',"Received Cash is required.");

            }
            else{

              $('.received_cash').hide();
              $('.received_cash_input').val('');
              $('#received_cash').attr('data-parsley-required',false)
              $('#received_cash').removeAttr('data-parsley-required-message',"Received Cash is required.");
              $('.return_cash').hide();
              $('.return_rupees').html('');

            }

        })

        $('#check_submit').submit(function(e){

          e.preventDefault();
          var token = $('meta[name="csrf-token"]').attr('content');
          
          var cn_number = $('#cn_number').val();
          var url = $(this).attr('action');

          $.ajax({

              url:url,
              method:"POST",
              data:{

                _token:token,
                cn_number:cn_number

              },
              success:function(data){

                if (data.status==1) {

                  $('.cn_preview').css({'display':'flex','align-items':'center'});
                  $('.cn_preview_div').html('');
                  $('.cn_preview_div').html(parseFloat(data.cndata_rupees).toFixed(2)+' /-');
                  $('#credit_input_rupee').val(data.cndata_rupees);
                }
                else{

                  toastr.options =
                  {
                    "closeButton" : true,
                    "progressBar" : true
                  }
                  toastr.error(data.message);

                }
              }

          });

        });

        $('#cancel_preview_cn').click(function(){

            $('.cn_preview').hide();
            $('.credit_note_display').hide();
            $('#credit_note_rupees').attr('disabled',true);
            $('#credit_note_rupees').removeAttr('readonly');
            totalCost();

        })

        $('#apply_preview_cn').click(function(){

            var count = $('.section_amount').length;
            var subtotal = $('#sub_total').val();
            var creditrupees = $('#credit_input_rupee').val();

            $('#genuine_cn_number').val($('#cn_number').val());
            $('#genuine_cn_number').attr('disabled',false);

            if (count==0) {

              toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
              toastr.error("Please Add Atleast One Item");

            }
            else if (subtotal==''||subtotal==0) {

              toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
              toastr.error("Please Select Amount of Item");

            }
            else{

              $('.credit_note_display').css('display','table-row');
              $('#credit_note_rupees').attr('disabled',false);
              $('#credit_note_rupees').attr('readonly');
              totalCost();

            }
        })


        @if(Session::has('otp'))

          $('#mobile-sent').html({{ Session::get('otp') }});
          $('#mobile-modal').val({{ Session::get('otp') }});
          $('#mobile-modal-resend').val({{ Session::get('otp') }});

          $('#mobile-otp-modal').modal('show');

          {{ Session::forget('otp') }}

        @endif

        $('#add-customer').click(function(){

            $('#add-customer-modal').modal('toggle');

        });

        $('.membership_select').click(function(){

            $('.radio_div').attr("checked",false);
            $(this).children('.radio_div').attr("checked" , true);

        });


        $('#add_membership').click(function(){

            var checkmembership = {{ $checkmembershipdata }};

            if (checkmembership>0) {

              $('#add_membership_modal').modal('toggle');
            }else{

            toastr.options =
                    {
                      "closeButton" : true,
                      "progressBar" : true
                    }
                    toastr.error("Please Add Membership data in Membership Section.");
            }

        });

        $(".select2").chosen({});

        $('#otp-form').submit(function(e){

            e.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content');
            var mobile = $('#mobile-modal').val();
            var otp = $('#otp').val();
            var url = $(this).attr('action');

            $.ajax({

                url:url,
                method:"POST",
                data:{

                  _token:token,
                  mobile_no:mobile,
                  otp:otp

                },
                success:function(data){

                  if (data.status==1) {

                    $('#otp-modal').modal('hide');
                    $('#error-modal-val').html(data.message);
                    window.location.href = "{{ route('admin.billing') }}";
                  }
                  else{

                    $('#otp').addClass('is-invalid');
                    $('#error-otp').html('');
                    $('#error-otp').append(data.message);


                  }
                }

            });

        });


        $('#resend_otp').submit(function(e){

          e.preventDefault();

          var url = $(this).attr('action');

          var formdata = $(this).serialize();

          var mobile = formdata.mobile;

          $.ajax({

              url:url,
              method:'POST',
              data:formdata,
              success:function(data){

                if (data.status==1) {

                  $('#mobile-resend').append('');
                  $('#mobile-resend').append('<span class="alert alert-success">OTP resend successfully.</span>');

                  setTimeout(function(){
                      $("#mobile-resend span").remove();
                  }, 3000 );
                  
                }
                else{

                  $('#mobile-resend').append('');
                  $('#mobile-resend').append('<span class="alert alert-success">Message can not be sent.Please try again later.</span>');

                  setTimeout(function(){
                      $("#mobile-resend span").remove();
                  }, 3000 );

                }

              }


          });


        });

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
 
        $('#receipt_search option').each(function(){

            if ($(this).val()==$('#receipt_id').val()) {

                $('#receipt_search option').remove();
                check = true;

            }

        });

        if (check==false) {
           
          if ($(this).val()==$('#receipt_id').val()) {
              
              $('#items option').remove();
              var token = $('meta[name="csrf-token"]').attr('content');
                var html='';
                $.ajax({
 
                  url: "{{ route('admin.returngsearch') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                      _token:token,
                      search:valueq
                  },
                  success: function(data){
                 
                    if(data.status == 1){

                        var userdata = data.userdata;

                        for(key in userdata){

                        html += '<option data-value="'+userdata[key].id+'" value="'+userdata[key].receipt_id+' "></option>';

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
                      $('.barcode_div').css('display','none');

                    }

                    $('#receipt_search').html(html);
                    

                   }
                })
  
        }
      }
    }, 1000));



    $('#receipt_id').on('change',function(){

        var value = $('#receipt_id').val();
     
        if ($('#receipt_id').val()!='') {
            $('.barcode_div').css('display','block'); 
        }else{
            $('.barcode_div').css('display','none');
        }
    });

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
            var receipt_id = $('#receipt_id').val();
              $('#items option').remove();
              var token = $('meta[name="csrf-token"]').attr('content');
                var html='';
                $.ajax({

                  url: "{{ route('admin.billing_search') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                       _token:token,
                        bar_code:valueq,
                        id:receipt_id
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

      var receipt_id = $('#receipt_id').val();

      $.ajax({

          url:"{{ route('admin.billing_search') }}",
          method:'GET',
          data:{

              _token:token,
               id:receipt_id,
               barcode:bar_code
              
          },

          success:function(data){
            var html='';
            if(data.status == 1){
                var itemdataarrs = data.billingdata;
   
                 var itemdataarr=eval(itemdataarrs.barcode);
                 var product_name=eval(itemdataarrs.product_name);
                 var weight=eval(itemdataarrs.weight);
                 var mrp_price=eval(itemdataarrs.mrp_price);
                 var price=eval(itemdataarrs.price);
                 var discount=eval(itemdataarrs.discount);
                 var expiry_date=eval(itemdataarrs.expiry_date);
                 var quantity=eval(itemdataarrs.quantity);
                 var tax=eval(itemdataarrs.tax);
                 var amount=eval(itemdataarrs.amount);

                for(var key in itemdataarr){
                     if(itemdataarr[key]==bar_code){
                     
                    
                   html += '<tr><td class="barcode_display" style="display:none;"><input type="text" class="form-control duplicate_bar_code" name="barcode[]" value="'+itemdataarr[key]+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 400px;"><input type="text" class="form-control" name="product_name[]" value="'+product_name[key]+'" id="product_name_id_'+count+'" readonly></td><td class="mrp"><input class="form-control" id="mrp_id_'+count+'" value="'+mrp_price[key]+'" name="mrp_price[]" readonly></td><td class="mrp"><input class="form-control" id="price_id_'+count+'"  name="price[]" value="'+price[key]+'" readonly style="width:100px;"></td><td class="weight"><input class="form-control" id="weight_id_'+count+'" value="'+weight[key]+'" readonly></td><td class="discount_display"><input type="text" class="form-control" id="discount_id_'+count+'" name="discount[]" value = "'+discount[key]+'" readonly></td><td class="discount_display"><input type="text" class="form-control" id="expiry_date_'+count+'" name="expiry_date[]" value = "'+expiry_date[key]+'" readonly></td><td><input type="text" class="form-control product_qty" name="quantity[]" style="width:60px;" value="'+quantity[key]+'" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td><input type="text" class="form-control product_qty" name="garbage_qty[]" style="width:60px;"  id="garbage_qty'+count+'"></td><td><input type="text" class="form-control section_tax" name="tax[]" data-gst="'+tax[key]+'"  value="'+tax[key]+'" id="tax_id_'+count+'" readonly style=""></td><td><input type="text" class="form-control section_amount" id="amount_id_'+count+'" name="amount[]" value="'+amount[key]+'" readonly ></td><td style="width:8%"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';
                  }
             
              }

              $('#multiple_select tbody').append(html);

              totalCost();

              $('#barcode_id').val('');
                
            }
            else{
                
              toastr.options =
              {
                  "closeButton" : true,
                  "progressBar" : true
              }

              toastr.error("Barcode Id does not exists.");
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
        var remainscredit=0;
        var creditrupee=0;

        if ($('.credit_note_display').css('display') != 'none') {

            var originalcreditrupees = parseFloat($('#credit_input_rupee').val());

            if (originalcreditrupees>=grand_total) {

              remainscredit = originalcreditrupees-grand_total;
              creditrupee = grand_total;
              grand_total = 0;
              $('#remains_credit').html(remainscredit.toFixed(2)+'/-');

            }
            else {

              remainscredit = 0;
              creditrupee = originalcreditrupees;
              grand_total = grand_total-originalcreditrupees;
              $('#remains_credit').html(remainscredit.toFixed(2)+'/-');
              
            }

        }

        var received_cash = $('#received_cash').val();

        $('#sub_total').val(total_amount.toFixed(2));
        $('#total_tax').val(total_tax.toFixed(2));
        $('#grand_total').val((grand_total).toFixed(2));
        $('#credit_note_rupees').val(creditrupee.toFixed(2));
        $('.return_rupees').html('');
        $('.return_rupees').append((parseFloat(received_cash)-parseFloat(grand_total)).toFixed(2)+'/-');

      };


        
              
    


  </script>

@endsection
