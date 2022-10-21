@extends('admin.includes.main')
@section('title')
    <title>Coupon | Coupon Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Coupon Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Coupon</li>
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
        .sform .eye i {
            position: absolute;
            top: 41px;
            right: 8%;
            cursor: pointer;
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
                    <div class="col-sm-2">
                        <button class="btn btn-sm btn-primary float-right" onclick="serviceAdd()"><i class="fa fa-plus"></i>&nbspAdd Service</button>
                    </div>
                </div>
            </div>

            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Promo Code</th>
                            <th>Amount</th>
                            <th>Price Limit</th>
                            <th>Expiry Date</th>
                            @if(Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('admin.Coupon.paggination_coupon')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="add-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Add Promo Code</h3>
                    <form class="sform form" method="post" action="{{ route('admin.add-promo') }}">
                        @csrf
                        <div class="row " style="padding: 30px;">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name<span>*</span></label>
                                    <input class="form-control" type="text" name="name" id="name"
                                           value="{{ old('name') }}" placeholder="Enter Promo Name"  data-parsley-required
                                           data-parsley-required-message="Promo Name is required.">
                                </div>
                            </div>
                            <div class="col-md-6 eye form-group">
                                <div class="form-group">
                                    <label for="coupon">Coupon Code<span>*</span></label>
                                    <input class="form-control" type="text" name="coupon" id="coupon"
                                           value="{{ old('coupon') }}" placeholder="Enter Promo Code"  data-parsley-required
                                           data-parsley-required-message="Promo Code is required.">
                                    <i class="fa fa-pencil" id="generateCode"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Coupon Amount<span>*</span></label>
                                    <input class="form-control" type="text" name="amount" id="amount"
                                           value="{{ old('amount') }}" placeholder="Enter Coupon Amount"  data-parsley-required
                                           data-parsley-required-message="Coupon Amount is required.">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_limit">Coupon Price Limit</label>
                                    <input class="form-control" type="text" name="price_limit" id="price_limit"
                                           value="{{ old('price_limit') }}" placeholder="Enter Coupon Price Limit">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expire_date">Coupon Expire Date</label>
                                    <input class="form-control" type="text" name="expire_date" id="datepicker" readonly="readonly"
                                           value="{{ old('expire_date') }}" placeholder="Select Expire Date" style="background:white;">
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

    <div class="modal fade" id="edit-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Edit Promo Code</h3>
                    <form class="sform form" method="post" action="{{ route('admin.update-promo') }}">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name<span>*</span></label>
                                    <input class="form-control" type="text" name="name" id="up-name"
                                           value="{{ old('name') }}" placeholder="Enter Promo Name"  data-parsley-required
                                           data-parsley-required-message="Promo Name is required.">
                                </div>
                            </div>
                            <div class="col-md-6 eye form-group">
                                <div class="form-group">
                                    <label for="coupon">Coupon Code<span>*</span></label>
                                    <input class="form-control" type="text" name="coupon" id="up-coupon"
                                           value="{{ old('coupon') }}" placeholder="Enter Promo Code"  data-parsley-required
                                           data-parsley-required-message="Promo Code is required.">
                                    <i class="fa fa-pencil" id="generateCode"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Coupon Amount<span>*</span></label>
                                    <input class="form-control" type="text" name="amount" id="up-amount"
                                           value="{{ old('amount') }}" placeholder="Enter Coupon Amount"  data-parsley-required
                                           data-parsley-required-message="Coupon Amount is required.">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price_limit">Coupon Price Limit</label>
                                    <input class="form-control" type="text" name="price_limit" id="up-price_limit"
                                           value="{{ old('price_limit') }}" placeholder="Enter Coupon Price Limit">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expire_date">Coupon Expire Date</label>
                                    <input class="form-control" type="text" name="expire_date" id="up-datepicker" readonly="readonly"
                                           value="{{ old('expire_date') }}" placeholder="Select Expire Date" style="background:white;">
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

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#up-datepicker" ).datepicker();
        } );
    </script>

    <script>

        const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        function generateString(length) {
            let result = ' ';
            const charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        document.getElementById("generateCode").addEventListener("click", function () {
            $('#coupon').val(generateString(10));
        });
    </script>


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
                url:"service/search?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $(document).on('click','.category-delete',function () {
            var url = $(this).data('url');
            swal({
                title: "Are you sure?",
                text: "You want to delete this New Launched.",
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
        function serviceAdd(){
            let token = $('meta[name="csrf-token"]').attr('content');
            let html ="";
            $.ajax({
                url:"{{ route('admin.get-promo') }}",
                method:'GET',
                data:{ _token:token },
                success:function(data){
                    let datas = $.parseJSON(data);
                    if (datas) {
                        $.each(datas, function(index, item) {
                            html+='<option value="'+item.id+'">'+item.title+'</option>';
                        });
                        $('#add-service-modal #service').append(html);
                        $('#add-service-modal').modal('show');
                    }
                }
            });
        }

        function ServiceEdit(id){
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('admin.edit-promo') }}",
                method:'POST',
                data: {
                    _token:token,
                    id:id
                },
                success:function(data){
                    if (data) {
                        let datas = $.parseJSON(data);
                        $('#id').val(datas.id);
                        $('#up-name').val(datas.name);
                        $('#up-coupon').val(datas.coupon);
                        $('#up-amount').val(datas.amount);
                        $('#up-price_limit').val(datas.price_limit);
                        $('#up-datepicker').val(datas.datepicker);
                        $('#edit-service-modal').modal('show');
                    }
                }
            });
        }
    </script>
@endsection
