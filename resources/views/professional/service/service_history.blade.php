@extends('professional.layouts.main')
@section('title')
    <title>Service | Service History</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Service History</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Services</li>
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
                            <th>BookingId</th>
                            <th>User Name</th>
{{--                            <th>Mobile</th>--}}
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Address</th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('professional.service.pagination_service_history')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="view-user-location-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Client location</h3>

                    <div id="map"></div>

                    <form class="sform form" method="post" action="{{ route('admin.update-city') }}">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <input type="checkbox" id="location-status">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-primary" style="float: right;">Save</button>
                                    <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">X</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        <p id="getBookingId"></p>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">X</button>
                            </div>
                        </div>
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
                url:"service-history/search?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
    </script>
    <script>
        function viewMap() {
            $('#view-user-location-modal').modal('show');
        }

        function viewBooking(id) {
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('professional.service-view') }}",
                method:'GET',
                data: {
                    _token:token,
                    id:id
                },
                success:function(data){
                    if (data) {
                        let datas = $.parseJSON(data);
                        $('#getBookingId').text(datas.bookingId);
                        $('#view-booking-modal').modal('show');
                    }
                }
            });
        }
    </script>
@endsection

