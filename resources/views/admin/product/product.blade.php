@extends('admin.includes.main')
@section('title')

<title>Product | Product Management</title>

@endsection

@section('title')

<title>Manufacturer Import | Product Management</title>

@endsection

@section('btitle')

<li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')

<li class="breadcrumb-item">Product</li>

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

    .chosen-container-single {

        width: 100% !important;
    }
</style>

@endsection

@section('body')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">

                    <input type="text" class="form-control" id="search" placeholder="Search Here">

                </div>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-4 text-right">
                <button class="btn btn-sm btn-primary" id="add-product"><i class="fa fa-plus"></i>&nbspAdd Product</button>

                <a href="{{ route('admin.import_product') }}" class="btn btn-sm btn-primary"><i class="fa fa-cloud"></i>&nbspImport Product</a>

                <a href="{{ route('admin.export_product') }}" class="btn btn-sm btn-primary">Export Product</a>
            </div>

        </div>
        <div class="row bg-white mx-0 py-3 mt-2">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr class="table-primary">

                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Status</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>

                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @include('admin.product.paggination_product')
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

<div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Add Product</h3>
                <form class="sform form" method="post" action="{{ route('admin.add_product') }}">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Product Title" data-parsley-required data-parsley-required-message="Product Name is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category<span>*</span></label>
                                <select class="form-control select2" name="category" id="category" data-parsley-required data-parsley-required-message="Category Name is required.">
                                    <option value="">Select Category</option>
                                    @foreach($categorydata as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategory">SubCategory</label>
                                <select class="form-control" name="subcategory" id="subcategory">
                                    <option value="">Select SubCategory</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand">Brand<span>*</span></label>
                                <select class="form-control select2" name="brand" id="brand" data-parsley-required data-parsley-required-message="Brand Name is required.">
                                    <option value="">Select Brand</option>
                                    @foreach($branddata as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="subbrand">SubBrand</label>
                                <select class="form-control" name="subbrand" id="subbrand">
                                    <option value="">Select SubBrand</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="manufacturer">Manufacturer<span>*</span></label>
                                <select class="form-control select2" name="manufacturer" id="manufacturer" data-parsley-required data-parsley-required-message="Manufacturer Name is required.">
                                    <option value="">Select Manufacturer</option>
                                    @foreach($manufacturerdata as $manufacturer)
                                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="package_type">Sub Category Type<span>*</span></label>
                                <input class="form-control" type="text" name="package_type" id="package_type" value="{{ old('package_type') }}" placeholder="Enter Package Type" data-parsley-required data-parsley-required-message="Package Type is required.">
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="package_type">HSN Code<span>*</span></label>
                                <input class="form-control" type="text" name="hsn" id="hsn" value="{{ old('hsn') }}" placeholder="Enter HSN Code" data-parsley-required data-parsley-required-message="Package Type is required.">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sgst_tax">SGST Tax:</label>
                                <select class="form-control" name="sgst_tax" id="sgst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cgst_tax">CGST Tax:</label>
                                <select class="form-control" name="cgst_tax" id="cgst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="igst_tax">IGST Tax:</label>
                                <select class="form-control" name="igst_tax" id="igst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ugst_tax">UTGST Tax:</label>
                                <select class="form-control" name="ugst_tax" id="ugst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cess_tax">CESS Tax:</label>
                                <select class="form-control" name="cess_tax" id="cess_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apmc_tax">APMC Tax:</label>
                                <select class="form-control" name="apmc_tax" id="apmc_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Price</label>
                                <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}" data-parsley-required data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Discount Amt</label>
                                <input class="form-control" type="text" name="discount_amt" id="discount_amt" data-parsley-type="number" value="{{ old('discount_amt') }}" data-parsley-required data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Discount Percentage</label>
                                <input class="form-control" readonly type="text" name="discount_percentage" id="discount_percentage">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Service Time</label>
                                <input class="form-control" type="text" name="time_in_min" value="{{ old('time_in_min') }}" data-parsley-required data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="image"> Image<span>*</span> </label>
                                <input class="form-control" type="file" name="image" value="{{ old('image') }}" data-parsley-required data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" id="product-submit" name="product-submit" class="btn btn-primary" style="float: right;">Save</button>

                                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Edit Product</h3>
                <form class="sform form" method="post" action="{{ route('admin.update_product') }}">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <input type="text" name="product_id" value="" id="edit_product_id" hidden="hidden">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="edit_product_name" value="" placeholder="Enter Product Title" data-parsley-required data-parsley-required-message="Package Type is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category<span>*</span></label>
                                <select class="form-control select2" name="category" id="edit_category" data-parsley-required data-parsley-required-message="Category Name is required.">
                                    <option value="">Select Category</option>
                                    @foreach($categorydata as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategory">SubCategory<span>*</span></label>
                                <select class="form-control" name="subcategory" id="edit_subcategory" data-parsley-required data-parsley-required-message="SubCategory Name is required.">
                                    <option value="">Select SubCategory</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_brand">Brand<span>*</span></label>
                                <select class="form-control select2" name="brand" id="edit_brand" data-parsley-required data-parsley-required-message="Brand Name is required.">
                                    <option value="">Select Brand</option>
                                    @foreach($branddata as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_subbrand">SubBrand</label>
                                <select class="form-control" name="subbrand" id="edit_subbrand">
                                    <option value="">Select SubBrand</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_manufacturer">Manufacturer<span>*</span></label>
                                <select class="form-control select2" name="manufacturer" id="edit_manufacturer" data-parsley-required data-parsley-required-message="Manufacturer Name is required.">
                                    <option value="">Select Manufacturer</option>
                                    @foreach($manufacturerdata as $manufacturer)
                                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_package_type">Sub Category Type<span>*</span></label>
                                <input class="form-control" type="text" name="package_type" id="edit_package_type" value="{{ old('package_type') }}" placeholder="Enter Package Type" data-parsley-required data-parsley-required-message="Package Type is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_hsn_code">HSN Code<span>*</span></label>
                                <input class="form-control" type="text" name="hsn" id="edit_hsn" value="{{ old('hsn') }}" placeholder="Enter HSN Code" data-parsley-required data-parsley-required-message="HSN code is required.">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sgst_tax">SGST Tax:</label>
                                <select class="form-control" name="sgst_tax" id="edit_sgst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cgst_tax">CGST Tax:</label>
                                <select class="form-control" name="cgst_tax" id="edit_cgst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="igst_tax">IGST Tax:</label>
                                <select class="form-control" name="igst_tax" id="edit_igst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ugst_tax">UTGST Tax:</label>
                                <select class="form-control" name="ugst_tax" id="edit_ugst_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cess_tax">CESS Tax:</label>
                                <select class="form-control" name="cess_tax" id="edit_cess_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apmc_tax">APMC Tax:</label>
                                <select class="form-control" name="apmc_tax" id="edit_apmc_tax">
                                    <option value="">Select GST Rate</option>
                                    @foreach($gstdata as $gst)
                                    <option value="{{ $gst->id }}">{{ $gst->gst_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="Enter Description" id="edit_product_description"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" name="product-submit" id="edit-product-submit" class="btn btn-primary" style="float: right;">Save</button>

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
    $("#discount_amt").on('change', function() {
        var discount = $(this).val();
        var price = $("#price").val();

        var discount_percentage = Math.round((discount / price) * 100)
        $('#discount_percentage').val(discount_percentage)


    })
    $(document).ready(function() {


        @if(Session::has('addproduct'))

        $('#add-product-modal').modal('show'); {
            {
                Session::forget('addproduct')
            }
        };

        @endif

        $('.select2').chosen();

        $('#add-product').click(function() {

            $('#add-product-modal').modal('show');

        });

        $('#product-submit').click(function() {

            $('.sform').submit();

        });

        $('#edit-product-submit').click(function() {

            $('.sform').submit();
        });

        // $(":input").keypress(function(event){
        //     if (event.which == '10' || event.which == '13') {
        //         event.preventDefault();
        //     }
        // });

        $('#category').change(function() {

            var category_id = $(this).val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $('#subcategory option').remove();

            $.ajax({

                url: "{{ route('admin.get_subcategory') }}",
                method: 'POST',
                data: {

                    _token: token,
                    id: category_id

                },

                success: function(data) {

                    if (data) {

                        $("#subcategory").chosen('destroy');

                        var data = $.parseJSON(data);
                        var html = "<option value=''>Select Sub-category</option>";
                        var count = data.length;

                        for (var i = 0; i < count; i++) {

                            html += "<option value='" + data[i].id + "'>" + data[i].title +
                                "</option>";

                        }

                        $('#subcategory').append(html);
                        $('#subcategory').chosen();


                    }
                }

            });

        });


        $('#brand').change(function() {

            var brand_id = $(this).val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $('#subbrand option').remove();

            $.ajax({

                url: "{{ route('admin.get_subbrand') }}",
                method: 'POST',
                data: {

                    _token: token,
                    id: brand_id

                },

                success: function(data) {

                    if (data) {

                        var data = $.parseJSON(data);
                        var html = "<option value=''>Select SubBrand</option>";
                        var count = data.length;

                        for (var i = 0; i < count; i++) {

                            html += "<option value='" + data[i].id + "'>" + data[i].title +
                                "</option>";

                        }

                        $('#subbrand').append(html);


                    }
                }

            });

        });
        //filter

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


    $(document).on('click', '.product-delete', function() {

        var url = $(this).data('url');
        swal({

            title: "Are you sure?",
            text: "You want to delete this product.It will delete all Product attribute and expiry corressponding to this product.",
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

    function fetch_data(page, query) {

        $.ajax({
            url: "product/search?page=" + page + "&query=" + query,
            success: function(data) {

                $('tbody').html(data);
            }
        })
    }

    $('#edit_category').change(function() {

        var category_id = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#edit_subcategory option').remove();

        $.ajax({

            url: "{{ route('admin.get_subcategory') }}",
            method: 'POST',
            data: {

                _token: token,
                id: category_id

            },

            success: function(data) {

                if (data) {

                    $("#edit_subcategory").chosen('destroy');

                    var data = $.parseJSON(data);
                    var html = "<option value=''>Select Sub-category</option>";
                    var count = data.length;

                    for (var i = 0; i < count; i++) {

                        html += "<option value='" + data[i].id + "'>" + data[i].title + "</option>";

                    }

                    $('#edit_subcategory').append(html);
                    $("#edit_subcategory").chosen();


                }
            }

        });

    });

    $('#edit_brand').change(function() {

        var brand_id = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $('#edit_subbrand option').remove();

        $.ajax({

            url: "{{ route('admin.get_subbrand') }}",
            method: 'POST',
            data: {

                _token: token,
                id: brand_id

            },

            success: function(data) {

                if (data) {

                    var data = $.parseJSON(data);
                    var html = "<option value=''>Select SubBrand</option>";
                    var count = data.length;

                    for (var i = 0; i < count; i++) {

                        html += "<option value='" + data[i].id + "'>" + data[i].title + "</option>";

                    }

                    $('#edit_subbrand').append(html);


                }
            }

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

        var result = confirm('Are you want to ' + statusstr + ' this product ?');

        if (result) {

            $.ajax({

                url: "{{ route('admin.toggle_product') }}",
                method: 'POST',
                data: {

                    _token: token,
                    status: status,
                    id: id

                },

                success: function(data) {

                    if (data == 1) {


                        window.location.href = "{{ route('admin.product') }}";


                    }
                }

            });

        }
    }

    function productedit(id) {

        var token = $('meta[name="csrf-token"]').attr('content');


        $.ajax({

            url: "{{ route('admin.edit_product') }}",
            method: 'POST',
            data: {

                _token: token,
                id: id

            },
            async: false,
            success: function(data) {

                if (data) {

                    var data = $.parseJSON(data);

                    $('#edit_product_id').val(data.id);
                    $('#edit_product_name').val(data.title);

                    $('#edit_category').val(data.category_id).trigger('chosen:updated');

                    $('#edit_subcategory option').remove();
                    $.ajax({

                        url: "{{ route('admin.get_subcategory') }}",
                        method: 'POST',
                        data: {

                            _token: token,
                            id: data.category_id

                        },
                        async: false,
                        success: function(data1) {

                            if (data1) {

                                var data2 = $.parseJSON(data1);
                                var html = "<option value=''>Select Sub-category</option>";
                                var count = data2.length;

                                for (var i = 0; i < count; i++) {

                                    html += "<option value='" + data2[i].id + "'>" + data2[i].title +
                                        "</option>";

                                }

                                $('#edit_subcategory').append(html);
                                $('#edit_subcategory').chosen();


                            }
                        }

                    });

                    $('#edit_subcategory').val(data.subcategory_id).trigger('chosen:updated');
                    $('#edit_brand').val(data.brand_id).trigger('chosen:updated');


                    $('#edit_subbrand option').remove();

                    $.ajax({

                        url: "{{ route('admin.get_subbrand') }}",
                        method: 'POST',
                        data: {

                            _token: token,
                            id: data.brand_id

                        },

                        success: function(data) {

                            if (data) {

                                var data = $.parseJSON(data);
                                var html = "<option value=''>Select SubBrand</option>";
                                var count = data.length;

                                for (var i = 0; i < count; i++) {

                                    html += "<option value='" + data[i].id + "'>" + data[i].title +
                                        "</option>";

                                }

                                $('#edit_subbrand').append(html);


                            }
                        }

                    });


                    $('#edit_subbrand option').each(function() {

                        if ($(this).val() == data.subbrand_id) {

                            $(this).attr('selected', 'selected');
                        }

                    });


                    $('#edit_manufacturer').val(data.manufacturer_id).trigger('chosen:updated');

                    $('#edit_package_type').val(data.package_type);

                    $('#edit_hsn').val(data.hsn_code);

                    $('#edit_sgst_tax option').each(function() {

                        if ($(this).val() == data.sgst_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_cgst_tax option').each(function() {

                        if ($(this).val() == data.cgst_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_igst_tax option').each(function() {

                        if ($(this).val() == data.igst_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_ugst_tax option').each(function() {

                        if ($(this).val() == data.ugst_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_cess_tax option').each(function() {

                        if ($(this).val() == data.cess_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_apmc_tax option').each(function() {

                        if ($(this).val() == data.apmc_tax) {

                            $(this).attr('selected', 'selected');
                        }

                    });

                    $('#edit_product_description').val(data.description);

                    $('#edit-product-modal').modal('show');

                }
            }

        });
    }
</script>

@endsection