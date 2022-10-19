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
    <div class="modal fade" id="add-subscription-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Add Subscription</h3>
                    <form class="sform form" method="post" action="{{ route('admin.add-plan') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name<span>*</span></label>
                                    <input class="form-control"
                                           type="text"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') }}"
                                           placeholder="Enter Plan Name"
                                           data-parsley-required
                                           data-parsley-required-message="Plan Name is required."
                                    >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="image">Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <input class="form-control photo" type="file" name="image"
                                           value="{{ old('image') }}" data-parsley-required
                                           data-parsley-required-message="This field is required.">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description<span>*</span></label>
                                    <input class="form-control" type="text" name="description" id="description"
                                           value="{{ old('description') }}" placeholder="Enter Description"  data-parsley-required
                                           data-parsley-required-message="Description is required.">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">Price<span>*</span></label>
                                    <input class="form-control" type="text" name="price" id="price"
                                           value="{{ old('price') }}" placeholder="Enter Price"  data-parsley-required
                                           data-parsley-required-message="Price is required.">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Discount<span>*</span></label>
                                    <input class="form-control" type="text" name="discount" id="discount"
                                           value="{{ old('discount') }}" placeholder="Enter Discount"  data-parsley-required
                                           data-parsley-required-message="Discount is required.">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="months">Months<span>*</span></label>
                                    <select class="form-control" type="text" name="months" id="months" value="{{ old('months') }}" data-parsley-required data-parsley-required-message="Tag is required.">
                                        <option value="">Select Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">12 Months</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button  type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>
                                    <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-subscription-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Edit Subscription</h3>
                    <form class="sform form" method="post" action="{{ route('admin.update-plan') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="plan-name">Name<span>*</span></label>
                                    <input class="form-control" type="text" name="name" id="plan-name" value="" placeholder="Enter Plan Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="image">Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <div class="d-flex">
                                        <div id="upload_plan_image"><img width="50" height="50"></div>
                                        <input class="form-control ml-4 photo" type="file" name="image" id="image" value="{{ old('image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="up-description">Description<span>*</span></label>
                                    <input class="form-control" type="text" name="description" id="up-description" value="" placeholder="Enter Description">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="up-price">Price<span>*</span></label>
                                    <input class="form-control" type="text" name="price" id="up-price" value="" placeholder="Enter Price">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="up-discount">Discount<span>*</span></label>
                                    <input class="form-control" type="text" name="discount" id="up-discount" value="" placeholder="Enter Discount">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up-months">Months<span>*</span></label>
                                    <select class="form-control" type="text" name="months" id="up-months" value="" data-parsley-required data-parsley-required-message="Tag is required.">
                                        <option value="">Select Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">12 Months</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button  type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>
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
