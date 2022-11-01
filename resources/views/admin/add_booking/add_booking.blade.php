@extends('admin.includes.main')
@section('title')
    <title>User | Booking Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Service Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Service</li>
@endsection

@section('style')
<link href="https://thewomenscompany.in/public/assets/plugins/select2/css/select2.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
<link href="https://thewomenscompany.in/public/dist/css/adminlte.min.css"/>
    <style type="text/css">
        .table .active-color {
            color: darkgreen;
            font-weight: 600;
        }
        .table .inactive-color {
            color: maroon;
            font-weight: 600;
        }
        #multi_tittle{
        	font-weight: 700;
    		color: #904795;
		}
		.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    	color: #fff;
		}
		.select2-container--default .select2-selection--multiple .select2-selection__choice {
    	background-color: #e9579b;
    	border: 1px solid #e9579b;
   	 	color: #fff;
		}
        /*TIME SLOT*/
       .time_slot{
       	margin: 0.5rem auto;
       }
       .select_time{
       	background-color: #e9579b;
    	padding: 0 0.5rem;
    	align-items: center;
    	color: #fff;
    	transition-duration: 0.3s;
    	transition-property: transform;border-radius: 1.5rem;
    	box-shadow: 0 0 1px transparent;
       }
       .select_time:hover {
    	transform: translateY(-5px);
	   }
	   .select_time input[type=radio] {
	   	display: none!important;
	   }
	   .button {
	   	background-color: #904795;
	   	border: none;
	   	color: white;
	   	padding: 0.5rem 1.5rem;
	   	text-align: center;
	   	text-decoration: none;
	   	display: inline-block;
	   	font-size: 16px;
	   	margin: 4px 2px;
	   	cursor: pointer;
	   	border-radius: 1.5rem;
	   	transition-duration: 0.3s;
	   	transition-property: transform;
	   	border: none;
	   }
	  /*new add*/
	/* .actives{
	 	background-color: #904795;
	 }*/
 	</style>
@endsection

@section('body')
<section class="content-header mb-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h3>Add Booking</h3>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Add Booking</li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<form class="container-fluid" action="{{ route('admin.bookingFromAdmin') }}" method="POST">
		@csrf
		<div class="card card-default" data-select2-id="57">
			<div class="card-body" data-select2-id="56">
				<div class="row" data-select2-id="55">
					<div class="col-md-6" data-select2-id="44">
						<div class="form-group" data-select2-id="43">
							<label id="user_id">User</label>
							<select class="form-control select2 select2-hidden-accessible" id="user_id" name="user_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
								<option value=''>Select User</option>	
								@foreach($users as $user)
								 	<option value={{ $user->id }}>{{ $user->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label id="category_id">Category Select</label>
							<select class="select2 select2-hidden-accessible" multiple="" id="category_id" name="category_id" style="width: 100%;" data-select2-id="" tabindex="-1" aria-hidden="true" required>
							<option value=''>Select Category</option>	
								@foreach($categories as $categorie)
								 	<option value={{ $categorie->id }}>{{ $categorie->title }}</option>
								@endforeach
							</select> 
						</div>
					</div>

					<div class="col-md-6" data-select2-id="30">
						<div class="form-group" data-select2-id="29">
							<label>Address</label>
							<select class="form-control" id="address" name="address_id" style="width: 100%;" required>
								<option value=''>Select Address</option>
							</select> 
						</div>

						<div class="form-group" data-select2-id="111">
							<label>Sub Category Select</label>
							<select class="select2 select2-hidden-accessible" id="sub_category_id" name="sub_category" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" required>
								<option value="">Select Sub-Category</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row" data-select2-id="85">
					<div class="col-12 col-sm-6" data-select2-id="71">
						<div class="form-group" data-select2-id="70">
							<label>Service</label>
							<div class="select2-purple" data-select2-id="69">
								<select class="select2" id="service_id" multiple="multiple" data-placeholder="Select Service" data-dropdown-css-class="select2-purple" name="service_id[]" style="width: 100%;" required>
								<option value="">Select Service</option>
								</select>
							</div>
						</div>
					</div>	
					 <div class="col-12 col-sm-6" data-select2-id="84">
						<div class="form-group" data-select2-id="83">
							<label id="date_slot">Select Date</label>
       						<input type="date" class="form-control" id="date_slot" name="date_slot" required>
						</div>
					</div>
				</div>	
				<!-- Tmie slot start -->
				<div class="row" id="slots">
					@foreach($time_slot_list as $time_slot=>$value)
					<div class="col-lg-2 col-md-3 col-sm-6 py-1">
						<div class="text-center select_time" id="Btn_color1">
							<input type="radio" name="time_slot" value="{{ $value }}" id="radio{{$time_slot}}" required>
							<label class="time_slot" for="radio{{$time_slot}}">{{ $value }}</label>
						</div>
					</div>
					@endforeach
				</div>
				<!-- time slot end -->
				<div class="text-left"><h4 id="multi_tittle">Payable Amount: ₹ null</h4>
						<span style="margin-top: -0.6rem;display: block;">(inclusive all taxes)</span>
					</div>	
				<div>
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="py-2">
								<input type="radio" id="cod" name="paymet_option" value="cod">
								<label for="cod" style="font-weight:bold;">C.O.D (Pay 100 to book)</label>
							</div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="py-2">
								<input type="radio" id="pay" name="paymet_option" value="pay">
								<label for="pay" style="font-weight:bold;">Pay full Amount</label>
							</div>
						</div>
						
					</div>
					<div class="col-4 col-sm-6 mr-auto">
						<button class="button">Payment mode</button>
					</div>	
				</div>		
			</div>
		</div>
	</form>
</section>
@endsection

@section('script')
 
<script src="https://thewomenscompany.in/public/assets/plugins/select2/js/select2.min.js"></script>
<script>
    $(function () {
        $('.select2').select2()
    })

	$(document).ready(function(){
		$("#slots input:radio").click(function(){
			$(".select_time").removeAttr("style");
			$(".select_time").removeClass("actives"); 
			if ($(this).is(":checked")) {
				$(this).parent().css("background", "#904795");
			} 
		});
	});

	// Get: User Address list by User_id
	$(document).on('change','#user_id' ,function(){
		var user_id = $(this).val();
		$.ajax({
            url: "{{ route('admin.getAddress') }}",
            method: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": user_id,
            },
            success: function(data) {
				if(JSON.parse(data).length > 0){
					$('#address option').remove();
					$('#address').append(`<option value="">Select Address</option>`);
					$.each(JSON.parse(data), function( index, value ) {
						$('#address').append(`<option value="${value.id}">${value.area}</option>`);
					});
				}else{
					$('#address option').remove();
					$('#address').append(`<option value="">Select Address</option>`);
				}
            }
        });
	});

	// Get: Sub-Category list by category_id
	$(document).on('change','#category_id' ,function(){
		var category_id = $(this).val();
		$.ajax({
            url: "{{ route('admin.getSubCategory') }}",
            method: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                "category_id": category_id,
            },
            success: function(data) {
				if(JSON.parse(data).length > 0){
					$('#sub_category_id option').remove();
					$('#sub_category_id').append(`<option value="">Select Sub-Category</option>`);
					$.each(JSON.parse(data), function( index, value ) {
						$('#sub_category_id').append(`<option value="${value.id}">${value.title}</option>`);
					});
				}else{
					$('#sub_category_id option').remove();
					$('#sub_category_id').append(`<option value="">Select Sub-Category</option>`);
				}
            }
        });
	});

	// Get: Services list by sub_category_id
	$(document).on('change','#sub_category_id' ,function(){
		var sub_category_id = $(this).val();
		$.ajax({
            url: "{{ route('admin.getServices') }}",
            method: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                "sub_category_id": sub_category_id,
            },
            success: function(data) {
                console.log('data');
				console.log(data);
				if(JSON.parse(data).length > 0){
					$('#service_id option').remove();
					$('#service_id').append(`<option value="">Select Service</option>`);
					$.each(JSON.parse(data), function( index, value ) {
						$('#service_id').append(`<option value="${value.id}">${value.title}</option>`);
					});
				}else{
					$('#service_id option').remove();
					$('#service_id').append(`<option value="">Select Service</option>`);
				}
            }
        });
	});
</script>
@endsection 
