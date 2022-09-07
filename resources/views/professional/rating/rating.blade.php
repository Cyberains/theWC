@extends('professional.layouts.main')
@section('title')
    <title>Rating | Rating History</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Rating History</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Rating</li>
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
{{--            <div class="row ">--}}
{{--                <div class="col-xl-12 col-md-12 row">--}}
{{--                    <div class="col-sm-5"></div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="search" class="col-sm-2 col-form-label">Search</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" class="form-control" id="search" placeholder="Search Here">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>User Name</th>
                            <th>Service Name</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('professional.rating.pagination_rating')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>
        </div>
    </div>
@endsection
