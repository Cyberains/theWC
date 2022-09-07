@extends('admin.includes.main')
@section('title')

<title>Brand | Product Management</title>

@endsection

@section('btitle')

<li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')

<li class="breadcrumb-item">Brand</li>

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
        <div class="row ">
            <div class="col-xl-12 col-md-12 row">
                <div class="col-sm-6"></div>
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" placeholder="Search Here">
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <button class="btn btn-sm btn-primary float-right" id="add-brand"><i class="fa fa-plus"></i>&nbspAdd
                        Brand</button>
                    <a href="{{ route('admin.import_brand') }}" class="btn btn-sm btn-primary float-right mr-2"><i class="fa fa-cloud"></i>&nbspImport Brand</a>
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
                            <th>Image</th>
                            <th>Description</th>
                            <th>Top Brand</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="searchresult">
                        @include('admin.product.paggination_brand')
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

<div class="modal fade" id="add-brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Add Brand</h3>
                <form class="sform form" method="post" action="{{ route('admin.add_brand') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">City<span>*</span></label>
                                <select class="form-controll" name="city_id" id="brand">
                                    <option> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Brand Title" data-parsley-required data-parsley-required-message="Brand Name is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="image">Brand Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                <input class="form-control product_photo" type="file" name="brand_image" value="{{ old('image') }}" data-parsley-required data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" name="top_brand" type="checkbox" id="top_brand" style="width: auto;margin-top: 0.3rem">
                                <label class="form-check-label" for="top_brand">
                                    Top brand
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>

                                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Edit Brand</h3>
                <form class="sform form" method="post" action="{{ route('admin.update_brand') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <input type="text" name="brand_id" value="" id="edit_brand_id" hidden="hidden">

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="edit_brand_name" value="" placeholder="Enter Brand Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="image">Brand Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                <div class="d-flex">
                                    <div id="upload_image"><img width="50" height="50" src=""></div>
                                    <input class="form-control ml-4 product_photo" type="file" name="brand_image" id="edit_image" value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description" placeholder="Enter Description" id="edit_brand_description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" name="top_brand" type="checkbox" id="edit_top_brand" style="width: auto;margin-top: 0.3rem">
                                <label class="form-check-label" for="edit_top_brand">
                                    Top brand
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="student-submit" class="btn btn-primary" style="float: right;">Save</button>

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
    $(document).ready(function() {

        $('.select2').select2();
        $('#add-brand').click(function() {

            categoryadd();
            // $('#add-brand-modal').modal('show');

        });


        function categoryadd() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var html = "";
            $.ajax({
                url: "{{ route('admin.add_brand') }}",
                method: 'GET',
                success: function(data) {
                    var datas = $.parseJSON(data);

                    if (datas) {

                        $.each(datas, function(index, item) {
                            html += '<option value="' + item.id + '">' + item.name + '</option>';
                        });
                        $('#add-brand-modal #brand').append(html);
                        $('#add-brand-modal').modal('show');
                    }
                }
            });
        }



        $('#edit_image').change(function() {

            var images = $(this).prop('files')[0];

            reader = new FileReader();
            reader.onload = function(e) {
                $('#upload_image img').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

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

    $(document).on('click', '.brand-delete', function() {

        var url = $(this).data('url');
        swal({
            title: "Are you sure?",
            text: "You want to delete this Brand.It will delete all SubBrand and Product corresponding to this Brand",
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
        //console.log(query);
        $.ajax({
            url: "brand/search?page=" + page + "&query=" + query,
            success: function(data) {

                $('tbody').html(data);
            }
        })
    }

    function brandedit(id) {

        var token = $('meta[name="csrf-token"]').attr('content');

        $('#edit_subcategory option').remove();

        $.ajax({

            url: "{{ route('admin.edit_brand') }}",
            method: 'POST',
            data: {

                _token: token,
                id: id

            },
            async: false,
            success: function(data) {
                if (data) {
                    var data = $.parseJSON(data);
                    $('#edit_brand_id').val(data.id);
                    $('#edit_brand_name').val(data.title);
                    if (data.image != null) {
                        $("#upload_image").show();
                        $("#upload_image img").attr('src', "{{ asset('public/images/brand') }}" + '/' + data.image);
                    } else {
                        $("#upload_image").hide();
                    }

                    $('#edit_brand_description').val(data.description);
                    if (data.top_brand == 1) {
                        $('#edit_top_brand').attr('checked', true);
                    }
                    $('#edit-brand-modal').modal('show');
                }
            }

        });
    }
</script>

@endsection