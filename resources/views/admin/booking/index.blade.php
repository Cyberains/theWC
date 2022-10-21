@extends('admin.includes.main')
@section('title')
    <title>Bookings | Bookings Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Bookings Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Bookings</li>
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
        <div class="fade-in" >
            <div class="row ">
                <div class="col-xl-12 col-md-12 row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-3">
                        <div class="form-group row">
                            <label for="search" class="col-sm-2 col-form-label">Search</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="search" placeholder="Search Here">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Booking Id</th>
                            <th>Booking Address</th>
                            <th>User Name</th>
                            <th>Professional Name</th>
                            <th>Total Amount</th>
                            <th>Payed Amount</th>
                            <th>Due Amount</th>
                            <th>Service Date</th>
                            <th>Service Time</th>
                            <th>Booking Raised</th>
                            <th>Service Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('admin.booking.paggination_booking')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="view-booking-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Booking Details</h3>
                    <div class="row " style="padding: 30px;">
                        <div id="allServices"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            initSample();
            //filter jquery
            var token = $('meta[name="csrf-token"]').attr('content');
            $("#search").on('keyup',function(){
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val(1);
                fetch_data(page, sort_type, column_name, query);
            });
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();
                console.log(query);
                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });
        });

        function fetch_data(page, sort_type, sort_by, query)
        {
            $.ajax({
                url:"bookings/search?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
    </script>
@endsection
