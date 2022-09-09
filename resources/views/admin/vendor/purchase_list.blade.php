@extends('admin.includes.main')
@section('title')
    <title>Purchase | Vendor Management</title>
@endsection

@section('btitle')

    <li class="breadcrumb-item">Vendor Management</li>

@endsection

@section('btitle1')

    <li class="breadcrumb-item">Purchase</li>

@endsection

@section('style')

  <style type="text/css">

    .chosen-container-single{

      width: 100% !important;
    }
  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">

         <div class="row ">
            <div class="col-xl-12 col-md-12 row">
            <div class="col-sm-7"></div>
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" placeholder="Search Here">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                  <a href="{{ route('admin.create_purchase') }}" class="btn btn-sm btn-primary float-right mr-2" ><i class="fa fa-plus"></i>&nbspNew Purchase Order</a>
                </div>
            </div>
        </div>

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12 table-responsive-sm">
              <table class="table  table-bordered">
                  <thead>
                    <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>Supplier ID</th>
                      <th>Purchase ID</th>
                      <th>Sub Total<small>(<i class="fa fa-rupee"></i>)</small></th>
                      <th>Total Tax<small>(<i class="fa fa-rupee"></i>)</small></th>
                      <th>Grand Total<small>(<i class="fa fa-rupee"></i>)</small></th>
                      <th>PO Delivery Date<br><small>(yyyy-mm-dd)</small></th>
                      <th>Payment Type</th>
                      <th>Payment Option</th>
                      <th>Advance Payment Amount</th>
                      <th>PO Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @include('admin.vendor.paggination_purchage_list')
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



@endsection

@section('script')
  <script type="text/javascript">

        @if(Session::has('nmail'))

            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
            toastr.error("{{ session('nmail') }}");

        @endif



        @if(Session::has('purchaseid'))

            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }

            toastr.success("{{ session('mail') }}");

            var purchaseid = {{ Session::get('purchaseid') }};

            var url = "{{ route('admin.get_purchase_pdf') }}"+'/'+purchaseid;

            let newTab = window.open();
            newTab.location.href = url;

            setInterval(function(){

              location.reload(true);

            }, 3000);

        @endif

    $(document).ready(function(){

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

    $(document).on('click','.purchase-delete',function () {

        var url = $(this).data('url');
        swal({
            title: "Are you sure?",
            text: "You want to delete this PO order!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            closeOnClickOutside: false,
            dangerMode: true,
        }).then(function(isConfirm){

            if (isConfirm) {

              window.location.href=url;
            }
        });
    });

    function fetch_data(page, query) {
        //console.log(query);
        $.ajax({
            url: "purchage/search?page=" + page + "&query=" + query,
            success: function(data) {
            // console.log()
                $('tbody').html(data);
            }
        })
    }
  </script>

@endsection
