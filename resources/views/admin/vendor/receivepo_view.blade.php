@extends('admin.includes.main')
@section('title')

<title>Purchase | Vendor Management</title>

@endsection

@section('style')

<style type="text/css">
.chosen-container-single {

    width: 100% !important;
}

.singletable {

    overflow-x: auto !important;
    overflow: auto !important;

}
</style>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Vendor Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">GRN With PO</li>

@endsection


@section('body')

<div class="container-fluid">
    <div class="fade-in">

        <div class="row ">
           
            <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" placeholder="Search Here">
                        </div>
                    </div>
                </div>
                
                  <a href="{{ route('admin.addreceivepo',['id'=>$id]) }}" class="btn btn-sm btn-primary float-right mr-2"
                    style="display: none"><i class="fa fa-plus"></i>&nbspNew Receive Po</a>
                </div>
           

        <div class="row bg-white mx-0 py-3 mt-2">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered singletable">
                    <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>PO No</th>
                            <th>Expected Date</th>
                            <th>Total Qty</th>
                            <th>Received Qty</th>
                            <th>Remarks</th>
                            <th>Supplier ID / Name</th>
                            <th>Normal Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('admin.vendor.paggination_receivepo_view')
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
        url: "receivepofilter/search?page=" + page + "&query=" + query,
        success: function(data) {
            // console.log()
            $('tbody').html(data);
        }
    })
}
</script>

@endsection