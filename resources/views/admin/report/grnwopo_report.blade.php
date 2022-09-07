@extends('admin.includes.main')
@section('title')
    
    <title>GRN Without PO Report | Report Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Report Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">GRN Without PO Report</li>

@endsection

@section('style')
    
@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">                  
          <form class="sform" action ="{{ route('admin.grnwopo_report_generate') }}"  method="post" autocomplete="off">
            @csrf
            <div class="row bg-white mx-0 py-3 mt-2">
              <div class="col-md-4 pb-3">
                <label>GRNWOPO Report Type<span>*</span></label>
                <select class="form-control" name="grnwopo_report_type" id="grnwopo_report_type" data-parsley-required data-parsley-required-message="Select Report Type">
                  <option value="">Select Report Type</option>
                  <option value="description">GRN Product Wise</option>
                  <option value="summary">Summary Wise</option>
                </select>
              </div>  
              <div class="col-md-4 pb-3">
                <label>GRN Without PO from Date</label>
                <input class="form-control input-bottom" type="text" name="start_date" id="startdate" placeholder="Enter Start Date">

              </div>
              <div class="col-md-4 pb-3">
                <label>GRN Without PO to Date</label>
                <input class="form-control input-bottom" type="text" name="end_date" id="enddate" placeholder="Enter End Date">

              </div>         
              <div class="col-md-4 pb-3">
                <label>Supplier ID</label>
                <select class="form-control input-bottom select2" type="text" name="supplier_id" id="supplier_id">

                  <option value="">Enter Supplier ID</option>
                  @foreach ($supplierdata as $s)
                  
                    <option value="{{ $s->id }}">{{ $s->supplier_name }}( {{ $s->supplier_id }} )</option>

                  @endforeach

                </select>

              </div>
              <div class="col-md-4 pb-3">
                <label>GRN Without PO ID:</label>
                <input class="form-control" type="text" name="grn_wopo_id" id="grn_wopo_id" placeholder="Enter GRN Without PO ID">

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
