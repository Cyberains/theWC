@extends('user.customers.master')
@section('title')
    <title>Edit Account</title>
@endsection
@section('customer')
    <form action="{{ route('user.confirm-email') }}" method="POST" id="email-form">
        <div class="ps-form__header">
            <h3>Update Email</h3>
        </div>
        <div class="ps-form__content">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email">{{ __('Email') }}:</label>
                <input id="email" type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" data-parsley-required 
                          data-parsley-required-message="Email is required." data-parsley-type="email" data-parsley-type-message="Enter Valid Email">
            </div>
            @error('email')
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
        
<div class="modal fade" id="email-otp-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-body my-3">
        <h4>Verify Your Email</h4>
        <p>OTP has been sent on:<strong id="email-sent"></strong></p>
         <p id="email-resend"></p>
            <form class="form-signin" id="otp-form" method="POST" action="{{ route('user.verify_email') }}">
                @csrf
                <input type="text" name="user_id" id="user_id" value="" hidden="hidden">
                <input type="text" name="email" id="email-modal" value="" hidden="hidden">
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

                    <form class="form-signin" method="POST" id="resend_otp" action="{{ route('user.emailsendOTP') }}">
                        @csrf
                        <input type="text" id="email-modal-resend" name="email" value="" hidden="hidden">

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

            $('#email-form').parsley();
            $('#otp-form').parsley();

            @if(Session::has('email'))

              $('#email-sent').html("{{ Session::get('email') }}");
              $('#user_id').val({{ Session::get('user_id') }});
              $('#email-modal').val("{{ Session::get('email') }}");
              $('#email-modal-resend').val("{{ Session::get('email') }}");

              $('#email-otp-modal').modal('show');

              {{ Session::forget('email') }}

            @endif

        $('#resend_otp').submit(function(e){

          e.preventDefault();

          var url = $(this).attr('action');

          var formdata = $(this).serialize();

          var email = formdata.email;

          $.ajax({

              url:url,
              method:'POST',
              data:formdata,
              success:function(data){

                if (data.status==1) {

                  $('#email-resend').append('');
                  $('#email-resend').append('<span class="alert alert-success">OTP resend successfully.</span>');

                  setTimeout(function(){
                      $("#email-resend span").remove();
                  }, 3000 );
                  
                }
                else{

                  $('#email-resend').append('');
                  $('#email-resend').append('<span class="alert alert-success">Message can not be sent.Please try again later.</span>');

                  setTimeout(function(){
                      $("#email-resend span").remove();
                  }, 3000 );

                }

              }


          });


        });


        $('#otp-form').submit(function(e){

            e.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content');
            var userid = $('#user_id').val();
            var email = $('#email-modal').val();
            var otp = $('#otp').val();
            var url = $(this).attr('action');

            $.ajax({

                url:url,
                method:"POST",
                data:{

                  _token:token,
                  userid:userid,
                  email:email,
                  otp:otp

                },
                success:function(data){

                  if (data.status==1) {

                    $('#otp-modal').modal('hide');
                    $('#error-modal-val').html(data.message);
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
