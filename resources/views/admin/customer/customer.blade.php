@extends('admin.includes.main')
@section('title')

<title>Customer Management</title>

@endsection

@section('btitle')
<li class="breadcrumb-item">Employees Management</li>
@endsection

@section('btitle1')

<li class="breadcrumb-item">Employees</li>

@endsection

@section('style')

<style type="text/css">
  .table-status {

    width: 150px;
  }

  .table .active-color {

    color: darkgreen;
    font-weight: 600;
  }

  .table .inactive-color {
    color: maroon;
    font-weight: 600;
  }

  .table .fa-toggle-on {

    color: darkgreen;
  }
</style>
@endsection

@section('body')

<div class="container-fluid">
  <div class="fade-in">
    <div class="row ">
      <div class="col-xl-12 col-md-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary" id="add-customer"><i class="fa fa-plus"></i>&nbspAdd Employees</button>
      </div>

    </div>
  </div>
  <div class="row bg-white mx-0 py-3 mt-2">
    <div class="col-md-12">
      <table class="table table-responsive-sm table-bordered" id="table-id">
        <thead>
          <tr class="table-primary">
            <th>Sr.No.</th>
            <th>Role</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th class="table-status">Membership</th>
            <th class="table-status">Status</th>
            @if(Auth::user()->role == 'admin')
            <th>Action</th>

            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($userdata as $customer)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->role }}</td>
            <td>{{ $customer->name }} </td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->mobile }}</td>
            @if($customer->membership_status==0)
            <td class="inactive-color">Not Taken</td>
            @else
            <td class="active-color">Active</td>
            @endif

            @if($customer->is_active==0)
            <td class="inactive-color">Inactive</td>
            @else
            <td class="active-color">Active</td>
            @endif

            @if(Auth::user()->role == 'admin')
            <td>

              <a title="Active" style="@if($customer->is_active == 0)

                                      display:none;transition: 0.5s;

                                      @endif">
                <i class="fa fa-toggle-on active-toggle-on" onclick="activeinactivetoggle(0,{{ $customer->id }})"></i>&nbsp</a>

              <a title="Inactive" style="@if($customer->is_active == 1)

                                  display:none;transition: 0.5s;

                                @endif">
                <i class="fa fa-toggle-off active-toggle-off" onclick="activeinactivetoggle(1,{{ $customer->id }})"></i>&nbsp</a>

              <a title="View" href="{{ route('admin.view_customer',['id'=>$customer->id]) }}"><i class="fa fa-television" style="color: #29b6f6;"></i></a>&nbsp&nbsp


              <a href="javascript:void(0)" class="customer-delete" data-url="{{ route('admin.delete_customer',['id'=>$customer->id]) }}"><i class="fa fa-trash" style="color: maroon;"></i></a>

            </td>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- /.row-->
</div>
</div>

@endsection

@section('modal')

<div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header py-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Add Employees</h3>
        <form class="sform form" method="post" action="{{ route('admin.add_customer_genuine') }}">
          @csrf
          <div class="row " style="padding: 30px;">
            <div class="col-md-6">
              <div class="form-group">
                <label for="role">Role<span>*</span></label>
                <select class="form-control" type="text" name="role" id="role" value="{{ old('role') }}" data-parsley-required data-parsley-required-message="Role is required.">
                  <option value="">Enter Role</option>
                  <option value="user">User</option>
                  <option value="Professional">Professional</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name<span>*</span></label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name" data-parsley-required data-parsley-required-message="Name is required.">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobile">Mobile<span>*</span></label>
                <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" data-parsley-required data-parsley-required-message="Mobile Number is required." data-parsley-pattern="^[6-9]\d{9}$" data-parsley-pattern-message="Enter valid mobile number." data-parsley-maxlength="10" data-parsley-maxlength-message="Enter valid mobile number." data-parsley-minlength="10" data-parsley-minlength-message="Enter valid mobile number.">

                @error('mobile')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
              </div>
            </div>
            <div class="col-md-6 form-group">
              <label>Password<span>*</span></label>
              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" data-parsley-required data-parsley-required-message="Password is required.">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="col-md-6 form-group">
              <label for="password-confirm">Confirm Password*</label>
              <input type="password" class="form-control" name="password_confirmation" id="password-confirm" autocomplete="new-password" placeholder="Confirm Password" data-parsley-required data-parsley-required-message="This field is required." data-parsley-equalto="#password" data-parsley-equalto-message="password does not match.">
            </div>
            <div class="col-md-12">
              <div class="form-group">

                <button type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>

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

    $('#add-customer').click(function() {

      $('#add-customer-modal').modal('show');
    });

    $('.customer-delete').click(function() {

      var url = $(this).data('url');
      swal.fire({
        title: "Are you sure?",
        text: "You want to delete this User!",
        icon: "warning",
        buttons: [
          'No, cancel it!',
          'Yes, I am sure!'
        ],
        closeOnClickOutside: false,
        dangerMode: true,
      }).then(function(isConfirm) {

        if (isConfirm) {

          window.location.href = url;
        }
      });
    });

    $('#add-category').click(function() {

      $('#add-category-modal').modal('show');

    });



  });

  function activeinactivetoggle(status, id) {

    var token = $('meta[name="csrf-token"]').attr('content');

    if (status == 0) {

      var statusstr = 'inactive';
    }

    if (status == 1) {

      var statusstr = 'active';
    }

    var result = confirm('Are you want to ' + statusstr + ' this Customer ?');

    if (result) {

      $.ajax({

        url: "{{ route('admin.toggle_customer') }}",
        method: 'POST',
        data: {

          _token: token,
          status: status,
          id: id

        },

        success: function(data) {

          if (data == 1) {


            window.location.href = "{{ route('admin.customer') }}";


          }
        }

      });

    }
  }


  function categoryedit(id) {

    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({

      url: "{{ route('admin.edit_category') }}",
      method: 'POST',
      data: {

        _token: token,
        id: id

      },

      success: function(data) {

        if (data) {

          var data = $.parseJSON(data);


          $('#edit_category_id').val(data.id);
          $('#edit_category_name').val(data.title);
          $('#edit_category_descrition').val(data.description);

          $('#edit-category-modal').modal('show');

        }
      }

    });
  }
</script>

@endsection
