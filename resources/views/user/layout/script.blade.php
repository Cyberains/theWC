    <script src="{{ URL::asset('public/assets/plugins/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/slick-animation.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/lightGallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/sticky-sidebar/sticky-sidebar.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/main.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/backend.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/parsley.min.js') }}"></script>


    <script src="{{ URL::asset('public/assets/js/user/change-product-swatches.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/cookie-consent.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/owl.carousel.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/simple-slider.js') }}"></script>
   
    <script src="{{ URL::asset('public/assets/js/user/app.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/customer.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/user/avatar.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="{{ asset('public/assets/js/user/card.js') }}"></script>
    
    <script src="{{ asset('public/assets/js/user/payment.js') }}"></script>
    <script src="{{ asset('public/assets/js/user/checkout.js') }}"></script>
    <script src="{{ asset('public/assets/js/admin/parsley.min.js') }}"></script>

    <script type="text/javascript">
        
        @if(Session::has('message'))

          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
          toastr.success("{{ session('message') }}");

        @endif

        @if(Session::has('success'))

          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
          toastr.success("{{ session('success') }}");

        @endif

        @if(Session::has('error'))

              toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }
            toastr.error("{{ session('error') }}");
        @endif

      @if(Session::has('info'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.info("{{ session('info') }}");
      @endif

      @if(Session::has('warning'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.warning("{{ session('warning') }}");
      @endif

        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.options =
                  {
                    "closeButton" : true,
                    "progressBar":true,
                    "timeOut": 30000,
                  }
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    
        $('.sform').parsley();
    </script>