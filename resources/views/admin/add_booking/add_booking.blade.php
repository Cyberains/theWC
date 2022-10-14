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
	/* margin-top: 1em ; */
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
    width: 50%;
  }
}
::placeholder{
    color:#904795!important;
}
.user_details{
    background: #fff;
    border-radius: 50%;
    padding: 0.2rem;
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
}

    </style>
@endsection

@section('body')

<section class="form-container">
		<form class="">
        <div class="text-center">
        <img class="img-responsive user_details" src="{{ url('public/assets/spa/images/img/favicon_twc.png') }}" alt="img">
        </div>
			<!-- <h1 class="form-header">User Details</h1> -->
			<div class="form">
            <div class="form-item form-item3">
					<label for="time frame">Services</label>
					<select name="time frame">
						<option value="week-1">1 week</option>
						<option value="week-2">2 weeks</option>
						<option value="week-3">3 weeks</option>
						<option value="month-1">1 month</option>
						<option value="month-3">3 months</option>
					</select>
				</div>

				<div class="form-item form-item1">
					<label for="user"> User Details</label>
					<input id="firstname" type="text" name="user" required>
				</div>
				
                <div class="form-item form-item2">
					<label for="date">Date</label>
					<input id="text" type="date" name="date" required>
				</div>

				<div class="form-item form-item1">
					<label for="amount">Amount</label>
					<input  id="amt" type="text" name="amount" required>
				</div>
				
                <div class="textarea-div form-item4">
					<label for="message">User Address</label>
					<textarea id="message" type="text" name="message" placeholder="Message?" required></textarea>
				</div>

				<div class="form-item form-item2">
					<label for="time">Time Slot</label>
					<input id="phonenumber" type="time"  id="appt" name="appt"
       min="09:00" max="18:00" required>
				</div>

				<!-- <div class="form-item form-item2">
					<label for="date">Date of Birth</label>
					<input id="text" type="date" name="date" required>
				</div> -->

				

				<!-- <div class="form-item form-item3">
					<label for="has website">Currently have a website?</label>
					<select name="has website">
						<option value="form-no">No</option>
						<option value="form-yes">Yes</option>
					</select>
				</div> -->
				
				
				<div class="btn-container">
					<input id="submit" class="btn btn-glow form-btn" type="submit" name="submit" value="Submit">
				</div>
			</div>
		</form>
	</section>
    
@endsection

@section('script')
 
@endsection
