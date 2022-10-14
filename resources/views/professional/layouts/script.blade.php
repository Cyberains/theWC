{{--<script src="{{ URL::asset('public/assets/js/admin/jquery-3.4.1.min.js') }}" type="text/javascript"></script>--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>

{{--<!-- <script src="{{URL::asset('public/assets/js/admin/modernizr-custom.js') }}"></script> -->--}}

<script src="{{ URL::asset('public/assets/js/admin/popper.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/admin/bootstrap.min.js') }}"></script>
   <!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>



<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/main1.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/jquery.magnific-popup.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/sweetalert.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/sweetalert2.all.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/jquery.email.multiple.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('public/plugins/datetime-picker/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

  <!-- Image Cropper -->
  <script src="{{ URL::asset('public/assets/cropper/cropper.js') }}"></script>
  <!-- <script src="{{ URL::asset('public/assets/cropper/cropper.js') }}"></script> -->
  <script src="{{ URL::asset('public/assets/plugins/knob/jquery.knob.js') }}"></script>
  <script src="{{ URL::asset('public/assets/plugins/select2/js/select2.min.js') }}"></script>


<!-- <script src="//js.pusher.com/3.1/pusher.min.js"></script> -->

<script src="{{ URL::asset('public/assets/js/admin/coreui.bundle.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
<!-- {{--<script src="{{ URL::asset('public/assets/js/admin/coreui-chartjs.bundle.js') }}"></script>--}} -->
<script src="{{ URL::asset('public/assets/js/admin/coreui-utils.js') }}"></script>
<!-- {{--<script src="{{ URL::asset('public/assets/js/admin/main.js') }}"></script>--}} -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>


<script src="{{ URL::asset('public/assets/js/main/main.js') }}"></script>
       <!-- fancybox -->
<script src="{{URL::asset('public/assets/plugins/fancybox/fancybox.js') }}"></script>

<script src="{{URL::asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{URL::asset('public/assets/plugins/ckeditor/sample.js') }}"></script>




<script type="text/javascript">



	document.getElementById("year").innerHTML = new Date().getFullYear();



	 	const ajax_errors = {
                http_not_connected: "{{ transLang('http_not_connected') }}",
                request_forbidden: "{{ transLang('request_forbidden') }}",
                not_found_request: "{{ transLang('not_found_request') }}",
                session_expire: "{{ transLang('session_expire') }}",
                service_unavailable: "{{ transLang('service_unavailable') }}",
                parser_error: "{{ transLang('parser_error') }}",
                request_timeout: "{{ transLang('request_timeout') }}",
                request_abort: "{{ transLang('request_abort') }}"
            };
	$(document).ready(function(){

        setTimeout(function(){
         	$("div.alert").remove();
     	}, 5000 );

     	$('#table-id').DataTable({

	    	"pageLength": 50,

	    });
     	$('.tables').DataTable({

	    	"pageLength": 5,
	    	'responsive':true
	    });
	    $('.table-data').DataTable({

	    	"pageLength": 50
	    });

       });

	@if(Session::has('message'))

		  toastr.options =
		  {
		  	"closeButton" : true,
		  	"progressBar" : true
		  }
		  toastr.success("{{ session('message') }}");

	@endif

	@if(Session::has('password'))

		  toastr.options =
		  {
		  	"closeButton" : true,
		  	"progressBar" : true
		  }
		  toastr.success("{{ session('password') }}");

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
	$.ajax({
		url:"{{ route('admin.check_expire_purchase') }}",
		data:{ },
		type:"get",
		success:function(data){
		}
	});
</script>


<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ URL::asset('public/assets/js/admin/playSound.js') }}"></script>

<script type="text/javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('fa7bc70a9618f0dee2b5', {
        cluster: 'ap2'
    });
    var channel = pusher.subscribe('new-cr-from-part');
    channel.bind( 'Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
        if(JSON.stringify(data['message'].user_id) == {{ auth()->user()->id }}){
            if (document.getElementsByClassName('w3-red').length==0) {
                document.getElementById("w3-badge").classList.add("w3-red");
            }
            var varcount = JSON.stringify(data.count);
            if (varcount.length<10) {
                varcount = '0'+varcount;
            }
            document.getElementById("w3-badge").innerHTML =varcount ;
            document.getElementById("badge").innerHTML = varcount+' '+'New';
            $.playSound('{{ asset('public/assets/audio/audio_reminder.mp3') }}');
            getmessage();
        }
    });


    function getmessage(){
        $.ajax({
            url:"{{ route('notifications') }}",
            data:{ },
            type:"get",
            success:function(data){
                $(".notification").html(' ');
                $('.notification').html(data);
            }
        });
    }
</script>



<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        } else {
            console.log('Geolocation is not supported by this browser.');
        }
        setTimeout(getLocation, 10000);
    }
    getLocation();

    function showPosition(position) {
        // x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
        sendGeoLocation(position.coords.latitude,position.coords.longitude)
    }

    function sendGeoLocation(lat = 21.2222,long = 12.2222){
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"http://localhost/project/the_womens_company/api/getProfLatLong",
            method:'POST',
            data:{
                _token:token,
                latitude : lat,
                longitude : long
            },
            success:function(data){
                console.log('done')
            }
        });
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
</script>






