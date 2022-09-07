@extends('admin.includes.main')
@section('title')

<title>SMS | Marketing Management</title>

@endsection

@section('btitle')

<li class="breadcrumb-item">Marketing Management</li>

@endsection

@section('btitle1')

<li class="breadcrumb-item">SMS Marketing</li>

@endsection


@section('style')

<style type="text/css">
  .bulk_show {

    display: none;
  }
</style>

@endsection

@section('body')

<div class="container-fluid">
  <div class="fade-in">

    <div class="row">
      <div class="col-md-12 text-right">
        <button class="btn btn-sm btn-primary" id="add-sms"><i class="fa fa-plus"></i>&nbspAdd SMS</button>
      </div>
    </div>
    <div class="row bg-white mx-0 py-3 mt-2">
      <div class="col-md-12">
        <table class="table table-responsive-sm table-bordered">
          <thead>
            <tr class="table-primary">
              <th>Sr.No.</th>
              <th>Mobile Numbers</th>
              <th>Message</th>
              <th>Failed</th>
              @if(Auth::user()->role == 'admin')
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody id="sms_pagination">

          </tbody>
        </table>
        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
      </div>

    </div>

    <!-- /.row-->
  </div>
</div>

@endsection

@section('modal')


<div class="modal fade" id="add-sms-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header py-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Add SMS</h3>
        <form class="sform form" method="post" action="{{ route('admin.send_sms') }}" enctype="multipart/form-data">
          @csrf
          <div class="row " style="padding: 30px;">
            <div class="col-md-12 mb-3">
              <div class="d-flex">
                <div class="form-check">
                  <label class="mb-0 form-check-label" for="sms-individual">
                    <input type="radio" class="form-check-input" name="sms_type" value="sms-individual" id="sms-individual" style="margin-top:4px;width:auto;" checked>
                    Individual
                  </label>
                </div>
                <div class="form-check ml-4">
                  <label class="mb-0 form-check-label" for="sms-bulk">
                    <input type="radio" class="form-check-input" name="sms_type" value="sms-bulk" id="sms-bulk" style="margin-top:4px;width:auto;">
                    Bulk</label>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group individual_show">
                <label for="mobile">Mobile<span>*</span></label>
                <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Numbers with Comma Seperated(,)" data-parsley-required data-parsley-required-message="Enter multiple 10 digits numbers with comma seperated." data-parsley-pattern="/^(\d{10}(,\d{10})*)?$/" data-parsley-pattern-message="Enter multiple 10 digits numbers with comma seperated">

              </div>
              <div class="form-group bulk_show">
                <label for="excel">Upload Excel<span>*</span>(.xlsx)</label>
                <div class="input-group mb-3">
                  <input type="file" class="form-control input-file-field" id="excel" name="import_file">
                  <div class="input-group-append">
                    <span style="cursor:pointer;" class="input-group-text" id="upload_sample">Download Sample</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message">Message<span>*</span></label>
                <textarea class="form-control" type="text" name="message" id="message" data-parsley-required data-parsley-required-message="Enter Message" placeholder="Enter Message..."></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="sms-submit" class="btn btn-primary" id="sms-submit" style="float: right;">Send SMS</button>

                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
  $('#add-sms').click(function() {

    $('#add-sms-modal').modal('show');

  });

  $('#sms-bulk').click(function() {

    $('.bulk_show').show();
    $('.individual_show').hide();
    $('#mobile').attr('data-parsley-required', false)
    $('#mobile').removeAttr('data-parsley-required-message', "Payment Type is required.");

  });

  $('#sms-individual').click(function() {

    $('.bulk_show').hide();
    $('.individual_show').show();

    $('#mobile').attr('data-parsley-required', true)
    $('#mobile').attr('data-parsley-required-message', "Payment Type is required.");

  });


  $('#upload_sample').click(function() {

    downloadFile("{{ route('admin.sms_export') }}");

  });

  function downloadFile(urlToSend) {

    var req = new XMLHttpRequest();
    req.open("GET", urlToSend, true);
    req.responseType = "blob";
    req.onload = function(event) {
      var blob = req.response;
      var link = document.createElement('a');
      link.href = window.URL.createObjectURL(blob);
      link.download = 'smsMobile';
      link.click();
    };

    req.send();

  }
</script>

@endsection