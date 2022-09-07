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
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Service Name</th>
                            <th>Service Image</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Time</th>
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
@endsection

