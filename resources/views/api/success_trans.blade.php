@extends('api.includes.main')

@section('title')
    <title>Success</title>
@endsection

@section('style')

<style type="text/css">

	.card .fa-check-circle{

		font-size: 80px;
		color: green;
	}
	.card .heading{

		font-weight: 500;
		font-size: 25px;

	}

	.card{

		padding-top: 40px;
		padding-bottom: 40px;
		border-radius: 10px;
		padding-right: 20px;
		padding-left: 20px;
        
        background: #e6e6e6;
         box-shadow: 6px 6px 14px 0 rgba(0, 0, 0, 0.2),
    -8px -8px 18px 0 rgba(255, 255, 255, 0.55);

	}
</style>

@endsection


@section('body')

<div class="container">

	<div class="row d-flex justify-content-center align-items-center" style="height: 100vh">

		<div class="col-md-6 col-xs-12 col-sm-12">
			<div class="card text-center">
				<h6><i class="fa fa-check-circle"></i></h6>
				<div>
					<h5>Payment Completed Successfully.</h5>
				</div>
				<div class="paragraph">
					
					<p>Thank you,your payment has been successful with <strong>transaction ID {{$form_data->transaction_id}}</strong>.</p>

				</div>
				<div>
					
				</div>
			</div>
		</div>
		
	</div>
	
</div>

@endsection