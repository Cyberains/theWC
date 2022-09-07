@extends('user.customers.master')
@section('title')
    <title>Edit Account</title>
@endsection
@section('customer')
    <form action="{{ route('user.confirm-mobile') }}" method="POST" id="mobile-form">
        <div class="ps-form__header">
            <h3>Update Mobile</h3>
        </div>
        <div class="ps-form__content">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group @if ($errors->has('mobile')) has-error @endif">
                <label for="mobile">{{ __('Mobile') }}:</label>
                <input id="mobile" type="text" class="form-control" value="{{ Auth::user()->mobile }}" name="mobile" data-parsley-required 
                          data-parsley-required-message="Mobile is required." 
                            data-parsley-pattern="^[6-9]\d{9}$"
                            data-parsley-pattern-message="Enter valid mobile number."
                            data-parsley-maxlength="10"
                            data-parsley-maxlength-message="Enter valid mobile number." 
                            data-parsley-minlength="10"
                            data-parsley-minlength-message="Enter valid mobile number.">
            </div>
            @error('mobile')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="form-group text-center">
                <div class="form-group submit">
                    <button class="ps-btn">{{ __('Update') }}</button>
                </div>
            </div>
        </div>
    </
@endsection

@section('modal')
        
<div class="modal fade" id="mobile-otp-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-body my-3">
        <h4>Verify Your Mobile</h4>
        <p>OTP has been sent on:<strong id="mobile-sent"></strong></p>
         <p id="mobile-resend"></p>
            <form class="form-signin" id="otp-form" method="POST" action="{{ route('user.verify_update_mobile') }}">
                @csrf
                <input type="text" name="user_id" id="user_id" value="" hidden="hidden">
                <input type="text" name="mobile" id="mobile-modal" value="" hidden="hidden">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP"  data-parsley-required 
                          data-parsley-required-message="Email OTP is required."
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

                    <form class="form-signin" method="POST" id="resend_otp" action="{{ route('user.mobilesendOTP') }}">
                        @csrf
                        <input type="text" id="mobile-modal-resend" name="mobile" value="" hidden="hidden">

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

            $('#mobile-form').parsley();
            $('#otp-form').parsley();

            @if(Session::has('mobile'))

              $('#mobile-sent').html("{{ Session::get('mobile') }}");
              $('#user_id').val({{ Session::get('user_id') }});
              $('#mobile-modal').val("{{ Session::get('mobile') }}");
              $('#mobile-modal-resend').val("{{ Session::get('mobile') }}");

              $('#mobile-otp-modal').modal('show');

              {{ Session::forget('mobile') }}

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
            var userid = $('#user_id').val();
            var mobile = $('#mobile-modal').val();
            var otp = $('#otp').val();
            var url = $(this).attr('action');

            $.ajax({

                url:url,
                method:"POST",
                data:{

                  _token:token,
                  userid:userid,
                  mobile:mobile,
                  otp:otp

                },
                success:function(data){

                  if (data.status==1) {

                    $('#otp-modal').modal('hide');
                    $('#error-modal-val').html(data.message);
                    window.location.href = "{{ route('user.overview') }}";
                    window.location.href = "{{ route('user.overview') }}";
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
