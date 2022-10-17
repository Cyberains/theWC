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
    <section class="contact-page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="contact-form">
                        <div class="contact-left">
                                <div class="input-grids">
                                    <input type="hidden" name="sender_lat" id="txt_lat" style="width:480px;">
                                    <input type="hidden" name="sender_lng" id="txt_lng" style="width:480px;">

                                    <input type="text" name="sender_name" id="sender_name" placeholder="Sender's Name*" class="contact-input">
                                    <input type="text" name="sender_number" id="sender_number" placeholder="Sender's Number*" class="contact-input" required="" maxlength="10">
                                    <input type="text" name="sender_location" id="searchInput1" placeholder="Pickup Location*" class="contact-input">
                                    <input type="text" name="sender_address" id="sender_address" placeholder="Complete Address*" class="contact-input">
                                    <input type="text" name="sender_landmark" id="sender_landmark" placeholder="LandMark*" class="contact-input">
                                    <input type="text" name="product_name" id="product_name" placeholder="Article Name *" class="contact-input">
                                    <div style="display:flex;">
                                        <input type="text" name="product_weight" id="product_weight" placeholder="Article Weight*" class="contact-input" style="width:50%!important">
                                        <select name='kg' style="width:50%!important; margin-left:20px;height:50px !important;" class="form-control">
                                            <option>Kgs</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="google-map" style="height:400px">
                        <div id="map" ></div>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 mm">
                <input type="submit" name="submit" value="Next" style="width: 80%; font-family: 'montserratsemi_bold'; padding-left: 0px;color: #fff; background: #f9bf3b; font-size: 16px; font-weight: bold;" class="btn ">
            </div>
        </div>
    </section>
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
