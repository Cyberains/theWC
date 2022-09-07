@extends('admin.includes.main')
@section('title')
    
    <title>Return Item Report | Report Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Report Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Return Item Report</li>

@endsection

@section('style')
    
@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">                  
          <form class="sform" action ="{{ route('admin.return_item_report_generate') }}"  method="post" autocomplete="off">
            @csrf
            <div class="row bg-white mx-0 py-3 mt-2">
              <div class="col-md-4 pb-3">
                <label>Return Item Report Type<span>*</span></label>
                <select class="form-control" name="billing_report_type" id="billing_report_type" data-parsley-required data-parsley-required-message="Select Report Type">
                  <option value="">Select Report Type</option>
                  <option value="description">Product Wise</option>
                  <option value="summary">Summary Wise</option>
                </select>
              </div> 
              <div class="col-md-4 pb-3">
                <label>Return Item from Date:</label>
                <input class="form-control input-bottom" type="text" name="start_date" id="startdate" placeholder="Enter Start Date">

              </div>
              <div class="col-md-4 pb-3">
                <label>Return Item to Date:</label>
                <input class="form-control input-bottom" type="text" name="end_date" id="enddate" placeholder="Enter End Date">

              </div>         
              <div class="col-md-4 pb-3">
                <label>Biller:</label>
                <select class="form-control input-bottom select2" type="text" name="biller_id" id="biller_id">

                  <option value="">Select Biller</option>
                  @foreach ($billerdata as $b)
                  
                    <option value="{{ $b->id }}">{{ $b->name }}</option>

                  @endforeach

                </select>

              </div>
              <div class="col-md-4 pb-3">
                <label>Return Receipt ID:</label>
                <input class="form-control" type="text" name="receipt_id" id="receipt_id" placeholder="Enter Receipt ID">

              </div>            
              
            </div>
            <div class="row bg-white mx-0">
                <div class="col-md-12 pb-3 text-right">
          
                <button type="submit" name="search" class="btn btn-primary">Generate</button>
              </div>
            </div>
        </form>

         
     
      <!-- /.row-->
    </div>
  </div>

@endsection

@section('modal')




@endsection

@section('script')
  
  <script type="text/javascript">

    $('.sform').parsley();

    $('.select2').chosen({});
    
    $('#startdate').datetimepicker({

      format : 'YYYY-MM-DD'
    });
    
    $('#enddate').datetimepicker({

      format : 'YYYY-MM-DD'
    });

    
       $("#startdate").on("dp.change", function (e) {
           $('#enddate').data("DateTimePicker").minDate(e.date);
       });
       $("#enddate").on("dp.change", function (e) {
           $('#startdate').data("DateTimePicker").maxDate(e.date);
       });


  </script>

@endsection
