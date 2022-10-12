
<!DOCTYPE html>
<html>

<!-- HEADER START -->
<head>

  @include('auth.includes.header')
  <title>The Women's Company | Login</title>

</head>
<!-- HEADER END -->

<style type="text/css">
    .card {
        padding: 20px 25px 30px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #e6e6e6;
        box-shadow: #fff 0px 2px 4px 0px, rgb(14 30 37 / 32%) 0px 2px 16px 0px;
        background-image: linear-gradient(#ffb9fc,rgba(0,0,0,0.5)), url('public/assets/spa/images/login_img/dashboard.jpg');
        background-size: cover;
        background-position: 100% 100%;
        background-repeat: no-repeat;
        object-fit: contain;
        mix-blend-mode: overlay;
    }
    .profile-img-card {

        width: 250px;
        height: 100px;
        margin: 10px auto 30px ;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 0%;

    }

    .forgot-password {

        color: rgb(104, 145, 162);
        margin-top: 20px;
    }

    .forgot-password:hover,
    .forgot-password:active,
    .forgot-password:focus{
        color: rgb(12, 97, 33);
        text-decoration: none;
    }

    .form-control:focus{
      outline: none;
      box-shadow:none;
      border-color: 1px solid #58898C;
    }

    .nav-link{

      color: #000!important;
    }
#head_title{
  color:#904795;
}
.btn-link{
    font-weight: 400;
    color: #fff;
    text-decoration: none!important;
    font-weight: 700;
}
.btn-link:hover{
color:#96149f;
}
    #Btn_dash{
    background:#96149f;
    border-color:#96149f;
    font-weight: 600;
}
    
  </style>

<!-- BODY STARTS -->
<body style="background-image: url('public/assets/spa/images/login_img/dashboard.jpg');background-size: cover;background-position:top;object-fit: contain;background-repeat: no-repeat;margin: 2.5rem auto;opacity:0.9">
 <div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-md-5">
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
          <div class="card card-container">

                <h5 class="text-center my-4" id="head_title">The Woman Company</h5>

                <form class="sform form-signin" method="POST" action="{{ route('login') }}">

                  @csrf
                  <input type="text" name="auth" value="user" hidden="hidden">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="text" id="mobile" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Mobile No."        data-parsley-pattern="^[6-9]\d{9}$"
                              data-parsley-pattern-message="Enter valid mobile number."
                              data-parsley-maxlength="10"
                              data-parsley-maxlength-message="Enter valid mobile number."
                              data-parsley-minlength="10"
                              data-parsley-minlength-message="Enter valid mobile number."
                              data-parsley-required
                              data-parsley-required-message="Mobile Number is required."
                              >
                      @error('mobile')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 eye form-group">
                      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" data-parsley-required
                              data-parsley-required-message="Password is required." >

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror

                      <i class="eye-checkedpass fa fa-eye mr-auto"></i>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <button type="submit" class="btn btn-primary btn-block" id="Btn_dash">Login</button>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                      <div class="col-md-12 text-center">
                          <div>
                             <p style="color:#fff;"> Don't have account? <a class="btn btn-link pl-0" href="{{ route('professional.professional-register') }}">
                                  {{ __('Register Now') }}
                                 </a>
                             </p>
                          </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    </div>
          <!-- SCRIPT STARTS -->
          @include('auth.includes.script')
          <script type="text/javascript">

              $('.sform').parsley();

          </script>
        <!-- SCRIPT ENDS -->
      </body>
<!-- BODY ENDS -->
</html>





