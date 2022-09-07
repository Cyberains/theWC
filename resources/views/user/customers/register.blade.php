@extends('user.layout.master')
@section('title')
    <title>Register</title>
@endsection
@section('content')
<div class="ps-breadcrumb">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{ route('user.home') }}">Home</a></li>
            <li>Register</li>
        </ul>

    </div>
</div>
<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" id="register-form" method="POST" action="{{ route('user.register.post') }}">
            @csrf
            <div class="ps-form__content">
                <h4>{{ __('Register An Account') }}</h4>
                <div class="form-group">
                    <input class="form-control" name="name" id="txt-name" type="text" value="{{ old('name') }}" placeholder="{{ __('Your Name*') }}" data-parsley-required data-parsley-required-message="Name is required.">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" id="txt-email" type="email" value="{{ old('email') }}" placeholder="{{ __('Your Email(optional)') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control" name="mobile" id="txt-mobile" type="number" value="{{ old('mobile') }}" placeholder="{{ __('Your Mobile No.*') }}" data-parsley-required data-parsley-required-message="Mobile is required." data-parsley-pattern="^[6-9]\d{9}$"
                            data-parsley-pattern-message="Enter valid mobile number."
                            data-parsley-maxlength="10"
                            data-parsley-maxlength-message="Enter valid mobile number." 
                            data-parsley-minlength="10"
                            data-parsley-minlength-message="Enter valid mobile number.">
                    @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" id="txt-password" placeholder="{{ __('Password*') }}" data-parsley-required 
                          data-parsley-required-message="Password is required.">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" id="txt-password-confirmation" placeholder="{{ __('Confirm Password*') }}" data-parsley-required 
                  data-parsley-required-message="Confirm Password is required."
                  data-parsley-equalto="#txt-password"  data-parsley-equalto-message="password does not match.">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="ps-checkbox">
                        <input class="form-check-input" type="checkbox" name="agree_terms_policy" id="terms-policy" value="1" data-parsley-required  data-parsley-required-message="This field is required.">
                        <label class="form-check-label" for="terms-policy"><span>{{ __('I agree to terms & Policy.') }}</span></label>
                    </div>
                </div>
               
                <div class="form-group submit">
                    <button class="ps-btn ps-btn--fullwidth" type="submit">{{ __('Sign up') }}</button>
                </div>
                <div class="form-group">
                    <p class="text-center">{{ __('Already have an account?') }}<a href="{{ route('user.login') }}">{{ __('Log in') }}</a></p>
                </div>
            </div>
            
        </form>
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
            <form class="form-signin" id="otp-form" method="POST" action="{{ route('user.verify_mobile') }}">
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
                  <button type="submit" class="ps-btn ps-btn--fullwidth">Verify OTP</button>
                </div>
              </div>
            </form>
            <div class="row">
                <div class="col-md-12">

                    <form class="form-signin" method="POST" id="resend_otp" action="{{ route('user.sendOTP') }}">
                        @csrf
                        <input type="text" id="mobile-modal-resend" name="mobile_no" value="" hidden="hidden">

                        <div class="d-flex justify-content-between">
                          
                          <button type="submit" class="btn btn-lg text-primary">RESEND OTP</button>
        
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
        
        <script type="text/javascript">

            $('#register-form').parsley();

            @if(Session::has('otp'))

              $('#mobile-sent').html({{ Session::get('otp') }});
              $('#mobile-modal').val({{ Session::get('otp') }});
              $('#mobile-modal-resend').val({{ Session::get('otp') }});

              $('#mobile-otp-modal').modal('show');

              {{ Session::forget('otp') }}

            @endif

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
                  mobile:mobile,
                  otp:otp

                },
                success:function(data){

                  if (data.status==1) {

                    $('#otp-modal').modal('hide');
                    $('#error-modal-val').html(data.message);
                    window.location.href = "{{ route('user.home') }}";
                  }
                  else{

                    $('#otp').addClass('is-invalid');
                    $('#error-otp').html('');
                    $('#error-otp').append(data.message);


                  }
                }

            });

        });


        </script>

@endsection

