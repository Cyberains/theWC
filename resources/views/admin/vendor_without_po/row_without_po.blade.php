@extends('admin.includes.main')
@section('title')

<title>GRN Without PO | Vendor Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Vendor Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">GRN Without PO</li>

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

</style>

@endsection

@section('body')

<div class="container-fluid">
    <div class="fade-in">
        @if ($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-center" style="list-style: none;">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="row  justify-content-between align-items-between">
            <div class="col-md-3">
                <div>
                    <a href="{{ route('admin.grn_without_po_show') }}" class="btn btn-sm btn-primary"> + Add GRN Without PO</a>
                </div>
            </div>            
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search" placeholder="Search Here">
                </div>
            </div>
        </div>


        <div class="row bg-white mx-0 py-3 mt-2">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>GRN ID</th>
                            <th>Total Qty</th>
                            <th>Total Tax(<i class="fa fa-rupee"></i>)</th>
                            <th>Sub Total(<i class="fa fa-rupee"></i>)</th>
                            <th>Grand Total(<i class="fa fa-rupee"></i>)</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="searchresult">
                        @include('admin.vendor_without_po.paggination_grnwopo')
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
$(document).ready(function() {

    var url1 = "{{ route('admin.grn_without_po') }}";
    var url2 = window.location.href;

      if (url1==url2) {

          $('a[href="'+'{{ route('admin.grn_without_po_show') }}' + '"]').addClass('c-active');

          $('a[href="' + '{{ route('admin.grn_without_po_show') }}' + '"]').parent().parent().parent().addClass('c-show');

      };

    //filter jquery
    var token = $('meta[name="csrf-token"]').attr('content');
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
        url: "sale/item/search?page=" + page + "&query=" + query,
        success: function(data) {

            $('tbody').html(data);
        }
    })
}

$(document).on('click','.grnwopo-delete',function() {

        var url = $(this).data('url');
        swal({
            title: "Are you sure?",
            text: "You want to delete this GRN.",
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


</script>

@endsection