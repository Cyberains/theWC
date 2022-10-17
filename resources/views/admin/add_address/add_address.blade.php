@extends('admin.includes.main')
@section('title')
    <title>User | user Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Service Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Service</li>
@endsection

@section('style')
<style type="text/css">
	.table .active-color {
		color: darkgreen;
		font-weight: 600;
	}
	.table .inactive-color {
		color: maroon;
		font-weight: 600;
	}
	/* form details */
	@keyframes slide-up2 {
		0% {
			transform: translateY(.5em);
			opacity: 0;
		}
		100%{
			transform: translateY(0);
			opacity: 1;
		}
	}
	@keyframes glow-load {
		0% {
			box-shadow: none;
		}
		100%{
			box-shadow:
			0px 0px 50px #f0860c;
		}
	}
	@keyframes continuous-glow {
		0% {
			box-shadow: 0 0 5px rgba(255, 157, 9, 0.39), inset 0 0 5px rgba(255, 153, 0, 0.356), 0 2px 0 #000;
		}	
		100% {
			box-shadow: 0 0 20px rgba(255, 153, 0, 0.6), inset 0 0 10px rgba(255, 145, 0, 0.4), 0 2px 0 #000;
		}
	}
	@keyframes blur-load {
		0% {
			opacity: 0;
			filter:blur(0.2em);
		}
		100%{
			opacity: 1;
			filter:blur(0);
		}
	}
	.form-container {
		margin: auto;
		width: 90%;
	}
	.form-item,
	.textarea-div {
		opacity: 0;
	}
	.form-item1 {
		animation: .2s cubic-bezier(0.47, 0, 0.745, 0.715) .3s 1 slide-up2 ;
		animation-fill-mode: forwards;
	}
	.form-item2 {
		animation: .2s cubic-bezier(0.47, 0, 0.745, 0.715) .4s 1 slide-up2 ;
		animation-fill-mode: forwards;
	}
	.form-item3 {
		animation: .2s cubic-bezier(0.47, 0, 0.745, 0.715) .5s 1 slide-up2 ;
		animation-fill-mode: forwards;
	}
	.form-item4 {
		animation: .2s cubic-bezier(0.47, 0, 0.745, 0.715) .6s 1 slide-up2 ;
		animation-fill-mode: forwards;
	}
	form {
		background-color: #efe9e9;
		border-radius: 1.25em;
		padding: 1.5em;
		animation: 1s cubic-bezier(0.47, 0, 0.745, 0.715) .7s 1 glow-load;
		animation-fill-mode: forwards;
	}
	form label {
		color: #540559;
	}
	option, select, input, .textarea-div textarea {
		background: #fff;
		color: #6a096b;
	}
	.form-header {
		text-align: center;
		font-size: 28px;
		padding: 0;
		margin-bottom: 1.25em;
		color: #aa08b5;
	}
	label {
		display: block;
		margin-bottom: 0.35em;
		margin-top: 0.35em;
	}
	input:not(.btn), select {
		padding: 0.625em 1em;
		width: 100%;
		outline: 0;
		margin-bottom: 0.25em;
		border-radius: 1.25em;
		border: 0;
		padding-left: 2.2rem;
	}
	.textarea-div {
		width: 100%;
	}
	textarea {
		padding: 10px;
		width: 100%;
		outline: 0;
		margin-bottom: 20px;
		border-radius: 20px;
		border: 0;
		font-size: 14px;
		height: 50px;
	}
	.btn-container {
		margin: auto;
		padding-bottom: 1em;
	}
	.form-btn { 
		background: #e9579b;
		border: none ;
		margin-top: 1em ; 
		font-size: 20px;
		padding: 0.3em 1.5rem;
	}
	.form-btn:hover{
		color:#fff;
	}
	.btn-glow {
		animation: .5s ease-out 0s 1 blur-load;
		border-radius: 2em ;
		color: white ;
		transition:.4s ;
	}
	.btn-glow:hover {
		box-shadow: 0px 0px 10px #f0860c;
	}
	.form-btn:hover { 
		background: #f0860c ;
	}
	.form-container input:focus,
	.form-container select:focus,
	.form-container textarea:focus  {
		animation: continuous-glow 800ms ease-out infinite alternate;
		box-shadow: 0 0 5px #e9579b , inset 0 0 5px #e9579b , 0 2px 0 #fff!important;
		color: #904795;
	}
	@media only screen and (min-width: 35.8em) {
		.form {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}
		.form-item {
			width: 45%;
		}
		.form-container {
			padding: 5em 0;
			width: 80%;
		}
	}
	@media only screen and (min-width: 60.625em) {
		.form-container {
			padding: 8em 0;
			width: 64%;
		}
	}
	::placeholder{
		color:#e9579b!important;
	}
	.user_details{
		background: #fff;
		border-radius: 50%;
		padding: 0.2rem;
		box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
	}
	.form .icon {
		position: relative;
		float: left;
		margin-left: 8px;
		margin-top: -30px;
		z-index: 2;
		color: #904795;
	}

</style>
@endsection

@section('body')

 <section class="form-container">
		<form class="">
        <div class="text-center">
        <img class="img-responsive user_details" src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="img">
        </div>
			<h1 class="form-header">Add Address</h1>
			<div class="form">
                <div class="form-item form-item2">
					<label for="phonenumber"></label>
					<input id="phonenumber" type="tel" name="phonenumber"  pattern="[0-9]{2}[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Mobile Number" required>
					<span class="icon fa fa-phone-square fa-lg"></span>
				</div>
				<div class="form-item form-item1">
					<label for="pincode"> </label>
					<input type="text" name="pin_code" id="pin" minlength="4" maxlength="6" size="10" placeholder="Pin Code" required>
					<span class="icon fa fa-lock fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="house"> </label>
					<input id="house" type="text" name="house" placeholder="Flat, House No, Building, Appartment" required>
					<span class="icon fa fa-home fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="area"> </label>
					<input id="area" type="text" name="area" placeholder="Area, Street, Sector, Village" required>
					<span class="icon fa fa-street-view fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="landmark"> </label>
					<input id="landmark" type="text" name="landmark" placeholder="Landmark" required>
					<span class="icon fa fa-map-signs fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="city"> </label>
					<input id="city" type="text" name="city" placeholder="Town/City" required>
					<span class="icon fa fa-building fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="state"> </label>
					<input id="state" type="text" name="state" placeholder="State" required>
					<span class="icon fa fa-map-o fa-lg"></span>
				</div>
                <div class="form-item form-item1">
					<label for="address">  </label>
					<input id="address" type="text" name="address" placeholder="Address Type(Home/Office)" required>
					<span class="icon fa fa-database fa-lg"></span>
				</div>
				<div class="btn-container">
					<input id="submit" class="btn btn-glow form-btn" type="submit" name="submit" value="Submit">
				</div>
			</div>
		</form>
	</section> 

@endsection

@section('script')
 
@endsection
