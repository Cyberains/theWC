<!DOCTYPE html>
<html>

<!-- HEADER START -->
<head>

  @include('auth.includes.header')
 <title>Online Exam | Register</title>
      
</head>
<!-- HEADER END -->

<style type="text/css">
        
    .card {
        background-color: #ffffff;

        /* just in case there no content*/
        padding: 20px 25px 30px;
        /* shadows and rounded borders */
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .sform input{

      background-color: white;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
      color: black;
      font-weight: 400;
    }

    .fa-check{

      color: white;
      padding: 5px;
      margin-left: 10px;
      background-color:darkgreen;
      border-radius: 20px; 
    }

    
    .pass{

      display: none;
    }

  </style>

<!-- BODY STARTS -->
<body>

    <div class="container">
      <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-6">
          <img src="{{ asset('public/assets/img/online_exam.png') }}" width="90%">
        </div>
        <div class="col-md-5 card">
          <h4 class="text-center mb-4 mt-2">ET-Talent Registration</h4>
                @if(Session::has('message'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center" role="alert">
                                 {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                 @endif
                 @if(Session::has('successpass'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center" role="alert">
                                 {{ Session::get('successpass') }}
                            </div>
                        </div>
                    </div>
                 @endif 
          <div class="row">
              <div class="col-lg-12 px-5 pb-5 pt-0 ">
                <form action="{{ route('register') }}" id="register-form" class="sform" method="POST">

                  @csrf
      
                  <input type="text" name="mobile" id="mobile-check" value="un-verified" hidden="hidden">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name*" data-parsley-required data-parsley-required-message="Name is required.">

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-md-12 form-group">
                      <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Id" data-parsley-type="email" data-parsley-type-message="Enter Valid Email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}"  placeholder="Enter Your Mobile Number*" data-parsley-required 
                              data-parsley-required-message="Mobile Number is required."
                              data-parsley-pattern="^[6-9]\d{9}$"
                              data-parsley-pattern-message="Enter 10 digits mobile number."
                              data-parsley-maxlength="10"
                              data-parsley-maxlength-message="Enter valid mobile number." 
                              data-parsley-minlength="10"
                              data-parsley-minlength-message="Enter valid mobile number."

                              data-parsley-trigger="keyup" >
                      

                              @error('mobile')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                    </div>

                    
                
                    <div class="col-md-12 form-group pass">
                      <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password*" 
                      data-parsley-required-message="Password is required.">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

                    <div class="col-md-12 form-group pass">
                      <input type="password" class="form-control" name="confirm_password" id="password-confirm" placeholder="Enter Confirm Password*"
                      data-parsley-equalto="#password" data-parsley-equalto-message="Confirm Password does not Match" 
                      data-parsley-required-message="Confirm Password is required." >
                    </div>

                    <div class="col-md-12 form-group">
                      <input type="submit" id="register-now" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px;" value="Register Now">
                    </div>
                    <div class="col-md-12 form-group text-center">
                      <p>Already have an account? <a  href="{{ route('login') }}" style="margin-top: 20px;">Log in</a></p>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>    
        </div>
      </div>
    
       <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
              <div class="modal-body mt-5">
                <h5 id="error-modal-val"></h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="otp-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
              <div class="modal-body mt-3">
                <h4>Verify Your Mobile Number</h4>
                <p>OTP has been sent on: (+91) <strong id="mobile-sent"></strong></p>
                 <p id="mobile-resend"></p>
                  <form class="sform form-signin" id="otp-form" method="POST" action="{{ route('api.verifymobile') }}">
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

                        <form class="form-signin" method="POST" id="resend_otp" action="{{ route('api.sendOTP') }}">

                          <input type="text" id="mobile-modal-resend" name="mobile_no" value="" hidden="hidden">

                          <div class="d-flex justify-content-between mt-4">
                              
                              <button type="submit" class="btn btn-success btn-sm text-right">RESEND OTP</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- SCRIPT STARTS -->
          @include('auth.includes.script')

          <script type="text/javascript">

            $('.sform').parsley();

            $('#mobile').on('keyup',function(){

              var mobile = $('#mobile').val();

              if (mobile.length==10){

                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url:"{{ route('api.sendOTP') }}",
                    method:'POST',
                    data:{

                      _token:token,
                      mobile_no:parseInt(mobile)

                    },
                    success:function(data){

                      if (data.status==1) {

                        $('#mobile-modal').val(parseInt(mobile));
                        $('#mobile-modal-resend').val(parseInt(mobile));
                        $('#mobile-sent').html(mobile);
                        $('#otp-modal').modal('show');

                      }
                      else{

                        $('#error-modal-val').html(data.message);
                        $('#error-modal').modal('show');

                      }

                    }

                })

              }

            });


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
                        $('#error-modal').modal('show');
                        $('#mobile').addClass('is-valid');
                        $('.pass').css('display','block');
                        $('#mobile-check').val('verified');
                        $('#password').attr('data-parsley-required',true);
                        $('#password-confirm').attr('data-parsley-required',true);
                         
                      }
                      else{

                        $('#otp').addClass('is-invalid');
                        $('#error-otp').html('');
                        $('#error-otp').append(data.message);


                      }
                    }

                });

            });


            $('#register-form').submit(function(e){

              if ($('#mobile-check').val()=='un-verified') {

                e.preventDefault();
                $('#mobile').trigger('keyup');

              }

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


          </script>

    
        
        <!-- SCRIPT ENDS -->
      </body>
<!-- BODY ENDS -->
</html>		
	
	
	

	
  

