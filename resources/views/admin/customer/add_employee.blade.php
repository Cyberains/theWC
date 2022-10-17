@extends('admin.includes.main')
@section('title')
    <title>Bookings | Bookings Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Bookings Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Bookings</li>
@endsection
@section('script')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script>
        /* script */
        function initialize() {
            var latlng = new google.maps.LatLng(25.5788,91.8933);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 15
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: true,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var input = document.getElementById('searchInput1');

            var geocoder = new google.maps.Geocoder();
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);

            });
            // this function will work on marker move event into map
            google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
        }
        function bindDataToForm(address,lat,lng){
            document.getElementById('searchInput1').value = address;
            document.getElementById('txt_lat').value = lat;
            document.getElementById('txt_lng').value = lng;
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotIb1Vhm9kEiDWaQn5IaIg1bpy6wJTRU&callback=initMap&libraries=places&v=weekly" async ></script>
@endsection
@section('body')
        <div class="container-fluid">
                <form class="sform form" method="post" action="{{ route('admin.add_customer_genuine') }}">
          @csrf
          <div class="row " style="padding: 30px;">
          <div class="col-sm-4">
              <div class="form-group">
                <label for="role">Role<span>*</span></label>
                <select class="form-control" type="text" name="role" id="role" value="{{ old('role') }}" data-parsley-required data-parsley-required-message="Role is required.">
                  <option value="">Enter Role</option>
                  <option value="user">User</option>
                  <option value="Professional">Professional</option>
                </select>
              </div>
            
              <div class="form-group">
                <label for="name">Name<span>*</span></label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name" data-parsley-required data-parsley-required-message="Name is required.">
              </div>
               <div class="form-group">
                <label for="name">Address<span>*</span></label>
                <input class="form-control" type="text" name="address" id="searchInput1" value="{{ old('name') }}" placeholder="Enter Name" data-parsley-required data-parsley-required-message="Name is required.">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile<span>*</span></label>
                <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" data-parsley-required data-parsley-required-message="Mobile Number is required." data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">

                @error('mobile')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
             <input type="hidden" name="sender_lat" id="txt_lat" style="width:480px;">
            <input type="hidden" name="sender_lng" id="txt_lng" style="width:480px;">
                                    
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
              </div>
             <div class="form-group">
              <label>Password<span>*</span></label>
              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" data-parsley-required data-parsley-required-message="Password is required.">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
             <label for="password-confirm">Confirm Password*</label>
              <input type="password" class="form-control" name="password_confirmation" id="password-confirm" autocomplete="new-password" placeholder="Confirm Password" data-parsley-required data-parsley-required-message="This field is required." data-parsley-equalto="#password" data-parsley-equalto-message="password does not match.">
            </div>
             </div>
           
             <div class="col-md-8 col-sm-8">
                    <div class="google-map" style="height:500px">
                        <div id="map" style="height:100%"></div>
                    </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">

                <button type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>

                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
        </div>
 
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!--    bootstrap.min.js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--    jquery.sticky.js-->
    <script src="{{url('front/js/jquery.sticky.js')}}"></script>
    <!--  owl.carousel.min.js  -->
    <script src="{{url('front/js/owl.carousel.min.js')}}"></script>
    <!--  jquery.mb.YTPlayer.min.js   -->
    <script src="{{url('front/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <!--    slick.min.js-->
    <script src="{{url('front/js/jquery.meanmenu.js')}}"></script>
    <script src="{{url('front/js/slick.min.js')}}"></script>
    <!--    jquery.nav.js-->
    <script src="{{url('front/js/jquery.nav.js')}}"></script>
    <!--jquery waypoints js-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!--    jquery counterup js-->
    <script src="{{url('front/js/jquery.counterup.min.js')}}"></script>
    <!--    main.js-->
    <script src="{{url('front/js/main.js')}}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60116542c31c9117cb730585/1et1v741b';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
@endsection
