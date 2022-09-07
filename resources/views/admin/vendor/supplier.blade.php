@extends('admin.includes.main')
@section('title')

<title>Supplier | Vendor Management</title>

@endsection

@section('style')

<style type="text/css">
  .chosen-container-single {
    width: 100% !important;
  }
</style>

@endsection

@section('btitle')
<li class="breadcrumb-item">Vendor Management</li>
@endsection

@section('btitle1')

<li class="breadcrumb-item">Supplier</li>

@endsection

@section('body')

<div class="container-fluid">
  <div class="fade-in">

    <div class="row ">
      <div class="col-xl-12 col-md-12 d-flex justify-content-between">
        <div>
          <input type="text" class="form-control" id="search" placeholder="Search Here">
        </div>

        <div>
          <button class="btn btn-sm btn-primary float-right" id="add-supplier"><i class="fa fa-plus"></i>&nbspAdd Supplier</button>
          <a href="{{ route('admin.import_supplier') }}" class="btn btn-sm btn-primary float-right mr-2"><i class="fa fa-cloud"></i>&nbspImport Supplier</a>
        </div>

      </div>
    </div>

    <div class="row bg-white mx-0 py-3 mt-2">
      <div class="col-md-12">
        <table class="table table-responsive-sm table-bordered">
          <thead>
            <tr class="table-primary">
              <th>Sr.No.</th>
              <th>Supplier ID</th>
              <th>Supplier Name</th>
              <th>Supplier Mobile</th>
              <th>Supplier Email</th>
              <th>Supplier Address</th>
              <th>Balance</th>
              <th>PO Expiry Duration<br><small>(Days)</small></th>
              @if(Auth::user()->role == 'admin')
              <th>Action</th>

              @endif
            </tr>
          </thead>
          <tbody>
            @include('admin.vendor.pagination_supplier')
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

<div class="modal fade" id="add-supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 1300px;">
    <div class="modal-content">
      <div class="modal-header py-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Add Supplier</h3>
        <form class="sform form" method="post" action="{{ route('admin.add_supplier') }}">
          @csrf
          <div class="row " style="padding: 30px;">
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_id">Supplier ID<span>*</span></label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">EB</span>
                  </div>
                  <input class="form-control @error('supplier_id') is-invalid @enderror" style="width: 82% !important;" type="text" id="supplier_id" name="supplier_id" value="{{ $new_supplieridg }}" placeholder="Enter Supplier ID" data-parsley-required data-parsley-required-message="Supplier ID is required." readonly>

                  @error('supplier_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_name">Supplier Name<span>*</span></label>
                <input class="form-control" type="text" id="supplier_name" name="supplier_name" value="{{ old('supplier_name') }}" placeholder="Enter Supplier Name" data-parsley-required data-parsley-required-message="Supplier Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_name">Supplier Email<span>*</span></label>
                <input class="form-control" type="email" id="supplier_email" name="supplier_email" value="{{ old('supplier_email') }}" placeholder="Enter Supplier Email" data-parsley-required data-parsley-required-message="Supplier Email is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_mobile">Supplier Mobile<span>*</span></label>
                <input class="form-control" type="text" id="supplier_mobile" name="supplier_mobile" value="{{ old('supplier_mobile') }}" placeholder="Enter Supplier Mobile" data-parsley-required data-parsley-required-message="Supplier Mobile is required." data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_address">Supplier Address<span>*</span></label>
                <input class="form-control" type="text" id="supplier_address" name="supplier_address" value="{{ old('supplier_address') }}" placeholder="Enter Supplier Address" data-parsley-required data-parsley-required-message="Supplier Address is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="country">Country<span>*</span></label>
                <select class="form-control select2" name="country" id="country" data-parsley-required data-parsley-required-message="country is required.">
                  <option value=""> select country </option>
                  @foreach($countrydata as $country)
                  <option value="{{ $country->code }}">{{ $country->name }} </option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="state">State<span>*</span></label>
                <input class="form-control" type="text" id="state" name="state" value="{{ old('state') }}" placeholder="Enter State" data-parsley-required data-parsley-required-message="State is required.">

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="city">City<span>*</span></label>
                <input class="form-control" type="text" id="city" name="city" value="{{ old('city') }}" placeholder="Enter City" data-parsley-required data-parsley-required-message="City is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="pincode">Pincode<span>*</span></label>
                <input class="form-control" type="text" id="pincode" name="pincode" value="{{ old('pincode') }}" placeholder="Enter Pincode" data-parsley-required data-parsley-required-message="Pincode is required." data-parsley-pattern="^[1-9]{1}[0-9]{2}[0-9]{3}$" data-parsley-pattern-message="Enter valid Pincode number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="gst_in">GST IN<span>*</span></label>
                <input class="form-control" type="text" id="gst_in" name="gst_in" value="{{ old('gst_in') }}" placeholder="Enter GSTIN" data-parsley-required data-parsley-required-message="GSTIN is required." data-parsley-pattern="^\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}$" data-parsley-pattern-message="Enter valid GST number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="pan_no">Pan No.<span>*</span></label>
                <input class="form-control" type="text" id="pan_no" name="pan_no" value="{{ old('pan_no') }}" placeholder="Enter PAN Number" data-parsley-required data-parsley-required-message="PAN Number is required." data-parsley-pattern="^[A-Z]{5}[0-9]{4}[A-Z]{1}$" data-parsley-pattern-message="Enter valid PAN number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tax_type">Tax Type</label>
                <select class="form-control" name="tax_type" id="tax_type">
                  <option value="none">None</option>
                  <option value="intra_state">Intra State</option>
                  <option value="inter_state">Inter State</option>

                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="po_expiry_duration">PO Expiry Duration<span>*</span>(In Days)</label>
                <input class="form-control" type="number" id="po_expiry_duration" name="po_expiry_duration" value="{{ old('po_expiry_duration') }}" placeholder="Enter PO Expiry Duration" data-parsley-required data-parsley-required-message="PO Expiry Duration is required.">


              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_name">Owner Name</label>
                <input class="form-control" type="text" id="owner_name" name="owner_name" value="{{ old('owner_name') }}" placeholder="Enter Owner Name">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_email">Owner Email</label>
                <input class="form-control" type="email" id="owner_email" name="owner_email" value="{{ old('owner_email') }}" placeholder="Enter Owner Email">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_mobile">Owner Mobile</label>
                <input class="form-control" type="text" id="owner_mobile" name="owner_mobile" value="{{ old('owner_mobile') }}" placeholder="Enter Owner Mobile" data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_name">SPOC Name</label>
                <input class="form-control" type="text" id="spoc_name" name="spoc_name" value="{{ old('spoc_name') }}" placeholder="Enter SPOC Name">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_email">SPOC Email</label>
                <input class="form-control" type="email" id="spoc_email" name="spoc_email" value="{{ old('spoc_email') }}" placeholder="Enter SPOC Email">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_mobile">SPOC Mobile</label>
                <input class="form-control" type="text" id="spoc_mobile" name="spoc_mobile" value="{{ old('spoc_mobile') }}" placeholder="Enter SPOC Mobile" data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="lead_time">Lead Time<span>*</span>(In Days)</label>
                <input class="form-control" type="number" min="1" id="lead_time" name="lead_time" value="{{ old('lead_time') }}" placeholder="Enter Lead Time" data-parsley-required data-parsley-required-message="Lead Time is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="credit_period">Credit Period<span>*</span>(In Days)</label>
                <input class="form-control" type="number" min="1" id="credit_period" name="credit_period" value="{{ old('credit_period') }}" placeholder="Enter Credit Period" data-parsley-required data-parsley-required-message="Credit Period is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="bank_name">Bank Name<span>*</span></label>
                <input class="form-control" type="text" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" placeholder="Enter Bank Name" data-parsley-required data-parsley-required-message="Bank Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="ifsc_code">IFSC Code<span>*</span></label>
                <input class="form-control" type="text" id="ifsc_code" name="ifsc_code" value="{{ old('ifsc_code') }}" placeholder="Enter IFSC Code" data-parsley-required data-parsley-required-message="IFSC Code is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="branch_name">Branch Name<span>*</span></label>
                <input class="form-control" type="text" id="branch_name" name="branch_name" value="{{ old('branch_name') }}" placeholder="Enter Branch Name" data-parsley-required data-parsley-required-message="Branch Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="account_number">Account Number<span>*</span></label>
                <input class="form-control" type="text" id="account_number" name="account_number" value="{{ old('account_number') }}" placeholder="Enter Account Number" data-parsley-required data-parsley-required-message="Account Number is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="account_holder_name">Account Holder Name<span>*</span></label>
                <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" value="{{ old('account_holder_name') }}" placeholder="Enter Account Holder Name" data-parsley-required data-parsley-required-message="Account Holder Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="secondary_email">Secondary Email<span>*</span>Sperate By semicolumn(;)</label>
                <input class="form-control" type="text" id="secondary_email" name="secondary_email" value="{{ old('secondary_email') }}" placeholder="Enter Secondary Email" data-parsley-pattern="(([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)(\s*;\s*|\s*$))*" data-parsley-pattern-message="Enter Valid Email" data-parsley-required data-parsley-required-message="Secondary Email is required.">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="supplier-submit" class="btn btn-primary" style="float: right;">Save</button>

                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 1300px;">
    <div class="modal-content">
      <div class="modal-header py-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Edit Supplier</h3>
        <form class="sform form" method="post" action="{{ route('admin.update_supplier') }}">
          @csrf
          <div class="row " style="padding: 30px;">
            <input type="text" name="id" value="" id="edit_supplier_id1" hidden="hidden">
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_id">Supplier ID<span>*</span></label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">EB</span>
                  </div>
                  <input class="form-control @error('supplier_id') is-invalid @enderror" style="width: 82% !important;" type="text" id="edit_supplier_id" name="supplier_id" value="{{ old('supplier_id') }}" placeholder="Enter Supplier ID" data-parsley-required data-parsley-required-message="Supplier ID is required.">

                  @error('supplier_id')

                  <div class="text-danger">{{ $message }}</div>

                  @enderror
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_name">Supplier Name<span>*</span></label>
                <input class="form-control" type="text" id="edit_supplier_name" name="supplier_name" value="{{ old('supplier_name') }}" placeholder="Enter Supplier Name" data-parsley-required data-parsley-required-message="Supplier Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_name">Supplier Email<span>*</span></label>
                <input class="form-control" type="email" id="edit_supplier_email" name="supplier_email" value="{{ old('supplier_email') }}" placeholder="Enter Supplier Email" data-parsley-required data-parsley-required-message="Supplier Email is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_mobile">Supplier Mobile<span>*</span></label>
                <input class="form-control" type="text" id="edit_supplier_mobile" name="supplier_mobile" value="{{ old('supplier_mobile') }}" placeholder="Enter Supplier Mobile" data-parsley-required data-parsley-required-message="Supplier Mobile is required." data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="supplier_address">Supplier Address<span>*</span></label>
                <input class="form-control" type="text" id="edit_supplier_address" name="supplier_address" value="{{ old('supplier_address') }}" placeholder="Enter Supplier Address" data-parsley-required data-parsley-required-message="Supplier Address is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="country">Country<span>*</span></label>
                <select class="form-control select2" name="country" id="edit_country" data-parsley-required data-parsley-required-message="country is required.">
                  <option value=""> select country </option>
                  @foreach($countrydata as $country)
                  <option value="{{ $country->code }}">{{ $country->name }} </option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="state">State<span>*</span></label>
                <input class="form-control" type="text" id="edit_state" name="state" value="{{ old('state') }}" placeholder="Enter State" data-parsley-required data-parsley-required-message="State is required.">

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="city">City<span>*</span></label>
                <input class="form-control" type="text" id="edit_city" name="city" value="{{ old('city') }}" placeholder="Enter City" data-parsley-required data-parsley-required-message="City is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="pincode">Pincode<span>*</span></label>
                <input class="form-control" type="text" id="edit_pincode" name="pincode" value="{{ old('pincode') }}" placeholder="Enter Pincode" data-parsley-required data-parsley-required-message="Pincode is required." data-parsley-pattern="^[1-9]{1}[0-9]{2}[0-9]{3}$" data-parsley-pattern-message="Enter valid Pincode number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="gst_in">GST IN<span>*</span></label>
                <input class="form-control" type="text" id="edit_gst_in" name="gst_in" value="{{ old('gst_in') }}" placeholder="Enter GSTIN" data-parsley-required data-parsley-required-message="GSTIN is required." data-parsley-pattern="^\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}$" data-parsley-pattern-message="Enter valid GST number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="pan_no">Pan No.<span>*</span></label>
                <input class="form-control" type="text" id="edit_pan_no" name="pan_no" value="{{ old('pan_no') }}" placeholder="Enter PAN Number" data-parsley-required data-parsley-required-message="PAN Number is required." data-parsley-pattern="^[A-Z]{5}[0-9]{4}[A-Z]{1}$" data-parsley-pattern-message="Enter valid PAN number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tax_type">Tax Type</label>
                <select class="form-control" name="tax_type" id="edit_tax_type">
                  <option value="none">None</option>
                  <option value="intra_state">Intra State</option>
                  <option value="inter_state">Inter State</option>

                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="po_expiry_duration">PO Expiry Duration<span>*</span>(In Days)</label>
                <input class="form-control" type="number" id="edit_po_expiry_duration" name="po_expiry_duration" value="{{ old('po_expiry_duration') }}" placeholder="Enter PO Expiry Duration" data-parsley-required data-parsley-required-message="PO Expiry Duration is required.">


              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_name">Owner Name</label>
                <input class="form-control" type="text" id="edit_owner_name" name="owner_name" value="{{ old('owner_name') }}" placeholder="Enter Owner Name">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_email">Owner Email</label>
                <input class="form-control" type="email" id="edit_owner_email" name="owner_email" value="{{ old('owner_email') }}" placeholder="Enter Owner Email">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="owner_mobile">Owner Mobile</label>
                <input class="form-control" type="text" id="edit_owner_mobile" name="owner_mobile" value="{{ old('owner_mobile') }}" placeholder="Enter Owner Mobile" data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_name">SPOC Name</label>
                <input class="form-control" type="text" id="edit_spoc_name" name="spoc_name" value="{{ old('spoc_name') }}" placeholder="Enter SPOC Name">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_email">SPOC Email</label>
                <input class="form-control" type="email" id="edit_spoc_email" name="spoc_email" value="{{ old('spoc_email') }}" placeholder="Enter SPOC Email">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spoc_mobile">SPOC Mobile</label>
                <input class="form-control" type="text" id="edit_spoc_mobile" name="spoc_mobile" value="{{ old('spoc_mobile') }}" placeholder="Enter SPOC Mobile" data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="lead_time">Lead Time<span>*</span>(In Days)</label>
                <input class="form-control" type="number" min="1" id="edit_lead_time" name="lead_time" value="{{ old('lead_time') }}" placeholder="Enter Lead Time" data-parsley-required data-parsley-required-message="Lead Time is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="credit_period">Credit Period<span>*</span>(In Days)</label>
                <input class="form-control" type="number" min="1" id="edit_credit_period" name="credit_period" value="{{ old('credit_period') }}" placeholder="Enter Credit Period" data-parsley-required data-parsley-required-message="Credit Period is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="bank_name">Bank Name<span>*</span></label>
                <input class="form-control" type="text" id="edit_bank_name" name="bank_name" value="{{ old('bank_name') }}" placeholder="Enter Bank Name" data-parsley-required data-parsley-required-message="Bank Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="ifsc_code">IFSC Code<span>*</span></label>
                <input class="form-control" type="text" id="edit_ifsc_code" name="ifsc_code" value="{{ old('ifsc_code') }}" placeholder="Enter IFSC Code" data-parsley-required data-parsley-required-message="IFSC Code is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="branch_name">Branch Name<span>*</span></label>
                <input class="form-control" type="text" id="edit_branch_name" name="branch_name" value="{{ old('branch_name') }}" placeholder="Enter Branch Name" data-parsley-required data-parsley-required-message="Branch Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="account_number">Account Number<span>*</span></label>
                <input class="form-control" type="text" id="edit_account_number" name="account_number" value="{{ old('account_number') }}" placeholder="Enter Account Number" data-parsley-required data-parsley-required-message="Account Number is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="account_holder_name">Account Holder Name<span>*</span></label>
                <input class="form-control" type="text" id="edit_account_holder_name" name="account_holder_name" value="{{ old('account_holder_name') }}" placeholder="Enter Account Holder Name" data-parsley-required data-parsley-required-message="Account Holder Name is required.">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="secondary_email">Secondary Email<span>*</span>Sperate By semicolumn(;)</label>
                <input class="form-control" type="text" id="edit_secondary_email" name="secondary_email" value="{{ old('secondary_email') }}" placeholder="Enter Secondary Email" data-parsley-pattern="(([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)(\s*;\s*|\s*$))*" data-parsley-pattern-message="Enter Valid Email" data-parsley-required data-parsley-required-message="Secondary Email is required.">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="supplier-submit" class="btn btn-primary" style="float: right;">Update</button>

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
  $(document).ready(function() {

    $('#add-supplier').click(function() {

      $('#add-supplier-modal').modal('show');

    });

    @error('supplier_id')

    $('#add-supplier-modal').modal('show');

    @enderror

    $('.select2').chosen({});

    // let dataemail = [


    // ]

    // let dataemail1=[

    // ]

    // $("#secondary_email").email_multiple({

    //     data: dataemail

    // });

    // $("#edit_secondary_email").email_multiple({

    //     data: dataemail1

    // });



  });


  $(document).on('click', '.supplier-delete', function() {

    var url = $(this).data('url');
    swal({
      title: "Are you sure?",
      text: "You want to delete this Supplier.",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {

      if (isConfirm) {

        window.location.href = url;
      }
    });
  });



  function supplieredit(id) {

    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({

      url: "{{ route('admin.edit_supplier') }}",
      method: 'POST',
      data: {

        _token: token,
        id: id

      },

      success: function(data) {

        if (data) {

          var data = $.parseJSON(data);

          var target = (data.supplier_id).split('EB');


          $('#edit_supplier_id1').val(data.id);
          $('#edit_supplier_id').val(target[1]);
          $('#edit_supplier_name').val(data.supplier_name);
          $('#edit_supplier_email').val(data.supplier_email);
          $('#edit_supplier_mobile').val(data.supplier_mobile);
          $('#edit_supplier_address').val(data.supplier_address);
          $('#edit_country').val(data.country).trigger("chosen:updated");
          $('#edit_state').val(data.state);
          $('#edit_city').val(data.city);
          $('#edit_pincode').val(data.pincode);
          $('#edit_gst_in').val(data.gst_in);
          $('#edit_pan_no').val(data.pan_no);
          $('#edit_tax_type option').each(function() {

            if ($(this).val() == data.tax_type) {

              $(this).attr('selected', 'selected');
            }

          });

          $('#edit_po_expiry_duration').val(data.po_expiry_duration);
          $('#edit_owner_name').val(data.owner_name);
          $('#edit_owner_email').val(data.owner_email);
          $('#edit_owner_mobile').val(data.owner_number);
          $('#edit_spoc_name').val(data.spoc_name);
          $('#edit_spoc_email').val(data.spoc_email);
          $('#edit_spoc_mobile').val(data.spoc_number);
          $('#edit_lead_time').val(data.lead_time);
          $('#edit_credit_period').val(data.credit_period);
          $('#edit_bank_name').val(data.bank_name);
          $('#edit_ifsc_code').val(data.ifsc_code);
          $('#edit_branch_name').val(data.branch_name);
          $('#edit_account_number').val(data.account_number);
          $('#edit_account_holder_name').val(data.account_holder_name);

          $('#edit_secondary_email').val(data.secondary_email);

          $('#edit-supplier-modal').modal('show');

        }
      }

    });
  }

  $(document).ready(function() {

    $("#search").on('keyup', function() {

      var query = $('#search').val();
      var page = $('#hidden_page').val(1);
      fetch_data(page, query);

    });

    $(document).on('click', '.pagination a', function(event) {

      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      $('#hidden_page').val(page);
      var query = $('#search').val();
      $('li').removeClass('active');
      $(this).parent().addClass('active');
      fetch_data(page, query);

    });
  });

  function fetch_data(page, query) {
    //console.log(query);
    $.ajax({
      url: "supplier/search?page=" + page + "&query=" + query,
      success: function(data) {
        // console.log()
        $('tbody').html(data);
      }
    })
  }
</script>

@endsection