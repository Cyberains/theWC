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
        
 	</style>
@endsection

@section('body')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Add Booking</h1>
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
	<div class="container-fluid">

		<div class="card card-default" data-select2-id="57">


			<div class="card-body" data-select2-id="56">
				<div class="row" data-select2-id="55">
					<div class="col-md-6" data-select2-id="44">
						<div class="form-group" data-select2-id="43">
							<label id="multi_tittle">User</label>
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
								<option selected="selected" data-select2-id="3">Alabama</option>
								<option data-select2-id="45">Alaska</option>
								<option data-select2-id="46">California</option>
								<option data-select2-id="47">Delaware</option>
								<option data-select2-id="48">Tennessee</option>
								<option data-select2-id="49">Texas</option>
								<option data-select2-id="50">Washington</option>
							</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-juui-container"><span class="select2-selection__rendered" id="select2-juui-container" role="textbox" aria-readonly="true" title="Alaska">Alaska</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>

						<div class="form-group">
							<label id="multi_tittle">Address</label>
							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
								<option selected="selected" data-select2-id="6">Alabama</option>
								<option>Alaska</option>
								<option>California</option>
								<option>Delaware</option>
								<option>Tennessee</option>
								<option>Texas</option>
								<option>Washington</option>
							</select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-6xqw-container"><span class="select2-selection__rendered" id="select2-6xqw-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>

					</div>

					<div class="col-md-6" data-select2-id="30">
						<div class="form-group" data-select2-id="29">
							<label id="multi_tittle">Category Select</label>
							<select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
								<option data-select2-id="35">Alabama</option>
								<option data-select2-id="36">Alaska</option>
								<option data-select2-id="37">California</option>
								<option data-select2-id="38">Delaware</option>
								<option data-select2-id="39">Tennessee</option>
								<option data-select2-id="40">Texas</option>
								<option data-select2-id="41">Washington</option>
							</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="California" data-select2-id="66"><span class="select2-selection__choice__remove" role="presentation">×</span>California</li><li class="select2-selection__choice" title="Tennessee" data-select2-id="67"><span class="select2-selection__choice__remove" role="presentation">×</span>Tennessee</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>

						<div class="form-group" data-select2-id="111">
							<label id="multi_tittle">Address1</label>
							<select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
							<option data-select2-id="112">Alabama</option>
							<option data-select2-id="113">Alaska</option>
							<option data-select2-id="114">California</option>
							<option data-select2-id="115">Delaware</option>
							<option data-select2-id="116">Tennessee</option>
							<option data-select2-id="117">Texas</option>
							<option data-select2-id="118">Washington</option>
							</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-28d3-container"><span class="select2-selection__rendered" id="select2-28d3-container" role="textbox" aria-readonly="true" title="Tennessee">Tennessee</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>


					</div>

				</div>

				<h5>Custom Color Variants</h5>
				<div class="row" data-select2-id="85">
					<div class="col-12 col-sm-6" data-select2-id="84">
						<div class="form-group" data-select2-id="83">
							<label id="multi_tittle">Minimal (.select2-danger)</label>
							<select class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
								<option selected="selected" data-select2-id="14">Alabama</option>
								<option data-select2-id="86">Alaska</option>
								<option data-select2-id="87">California</option>
								<option data-select2-id="88">Delaware</option>
								<option data-select2-id="89">Tennessee</option>
								<option data-select2-id="90">Texas</option>
								<option data-select2-id="91">Washington</option>
							</select><span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" data-select2-id="13" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-8xn8-container"><span class="select2-selection__rendered" id="select2-8xn8-container" role="textbox" aria-readonly="true" title="Tennessee">Tennessee</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						</div>

					</div>

					<div class="col-12 col-sm-6" data-select2-id="71">
						<div class="form-group" data-select2-id="70">
							<label id="multi_tittle">Service</label>
							<div class="select2-purple" data-select2-id="69">
								<select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
									<option data-select2-id="72">Alabama</option>
									<option data-select2-id="73">Alaska</option>
									<option data-select2-id="74">California</option>
									<option data-select2-id="75">Delaware</option>
									<option data-select2-id="76">Tennessee</option>
									<option data-select2-id="77">Texas</option>
									<option data-select2-id="78">Washington</option>
								</select>
								<span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" data-select2-id="16" style="width: 100%;">
									<span class="selection">
										<span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
											<ul class="select2-selection__rendered">
												<li class="select2-selection__choice" title="California" data-select2-id="98">
													<span class="select2-selection__choice__remove" role="presentation">×</span>California
												</li>
												<li class="select2-selection__choice" title="Delaware" data-select2-id="99"><span class="select2-selection__choice__remove" role="presentation">×</span>Delaware</li>
												<li class="select2-selection__choice" title="Texas" data-select2-id="100">
													<span class="select2-selection__choice__remove" role="presentation">×</span>Texas</li>
													<li class="select2-search select2-search--inline">
														<input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;">
													</li>
												</ul>
											</span>
										</span>
										<span class="dropdown-wrapper" aria-hidden="true"></span>
									</span>
							</div>
						</div>
					</div>

					

				</div>
				

			</div>


		</div>

	</section>
@endsection

@section('script')
 
  <script src="https://thewomenscompany.in/public/assets/plugins/select2/js/select2.min.js"></script>
  <script>
    $(function () {
        $('.select2').select2()
    })
</script>

@endsection 
