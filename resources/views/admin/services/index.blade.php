@extends('admin.includes.main')
@section('title')
    <title>Service | Service Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">Service Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">Service</li>
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
                    <div class="col-sm-2">
                        <button class="btn btn-sm btn-primary float-right" onclick="serviceAdd()"><i class="fa fa-plus"></i>&nbspAdd Service</button>
                    </div>

{{--                    <div class="col-sm-2">--}}
{{--                        <a href="{{ route('admin.import-city') }}" class="btn btn-sm btn-primary float-right mr-2" ><i class="fa fa-cloud"></i>&nbspImport Service's</a>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Service Image</th>
                            <th>Service Product Image</th>
                            <th>Service Banner Image</th>
                            <th>Service Time</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Final price</th>
                            <th>Tag</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            @if(Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('admin.services.paggination_services')
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
                    <h3 class="text-center">Add Service</h3>
                    <form class="sform form" method="post" action="{{ route('admin.add-service') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Service Name<span>*</span></label>
                                    <input class="form-control"
                                           type="text"
                                           name="title"
                                           id="title"
                                           value="{{ old('title') }}"
                                           placeholder="Enter Service Name"
                                           data-parsley-required
                                           data-parsley-required-message="Service Name is required."
                                    >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="service_image">Service Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <input class="form-control photo" type="file" name="service_image"
                                           value="{{ old('service_image') }}" data-parsley-required
                                           data-parsley-required-message="This field is required.">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="service_image">Service Banner Image<span>*</span>( Enter 1:1 ratio Image Above 1024x400px )</label>
                                    <input class="form-control photo" type="file" name="service_banner_image" value="{{ old('service_banner_image') }}" data-parsley-required data-parsley-required-message="This field is required.">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="service_product_image">Service Product Image( Enter 1:1 ratio Image Above 400px )</label>
                                    <input class="form-control photo" type="file" name="service_product_image"
                                           value="{{ old('service_product_image') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="service_time">Service Time<span>*</span></label>
                                    <input class="form-control" type="text" name="service_time" id="service_time" value="{{ old('service_time') }}" placeholder="Enter Service Time"  data-parsley-required data-parsley-required-message="Service Time is required.">
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
                                    <label for="tag">Tag<span>*</span></label>
                                    <select class="form-control" type="text" name="tag" id="tag" value="{{ old('tag') }}" data-parsley-required data-parsley-required-message="Tag is required.">
                                        <option value="">Select Tag</option>
                                        <option value="NoTag">NoTag</option>
                                        <option value="New">New</option>
                                        <option value="Exclusive">Exclusive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="category_id" id="category_id" value="{{ old('category_id') }}" data-parsley-required data-parsley-required-message="Category is required.">
                                        <option value="">Select Tag</option>
                                        <option value="3">Category Title</option>
                                        @foreach($categories as $category)
                                            <option id="selected-category-id" onclick="getSubCategory({{ $category->id }})" value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="sub_category_id" id="sub_category_id" value="{{ old('sub_category_id') }}" data-parsley-required data-parsley-required-message="Sub-Category is required.">
                                        <option value="">Select Sub-Category</option>
                                        @foreach($sub_category as $sub_cat)
                                            <option id="selected-sub-category-id" value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">Description</label>
                                    <textarea class="form-control" type="text" name="description" placeholder="Enter Description" id="editor"></textarea>
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
                    <h3 class="text-center">Edit Service</h3>
                    <form class="sform form" method="post" action="{{ route('admin.update-service') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="service-title">Service Name<span>*</span></label>
                                    <input class="form-control" type="text" name="title" id="service-title" value="" placeholder="Enter Service Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="image">Service Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <div class="d-flex">
                                        <div id="upload_service_image"><img width="50" height="50"></div>
                                        <input class="form-control ml-4 photo" type="file" name="service_image" id="service_image" value="{{ old('service_image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="service_banner_image">Service Banner Image<span>*</span>( Enter 1:1 ratio Image Above 1024x400px )</label>
                                    <div class="d-flex">
                                        <div id="upload_service_banner_image"><img width="50" height="50"></div>
                                        <input class="form-control ml-4 photo" type="file" name="service_banner_image" id="service_banner_image" value="{{ old('service_banner_image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="image">Service Product Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                                    <div class="d-flex">
                                        <div id="upload_service_product_image"><img width="50" height="50"></div>
                                        <input class="form-control ml-4 photo" type="file" name="service_product_image" id="service_product_image" value="{{ old('service_product_image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="up-service_time">Service Time<span>*</span></label>
                                    <input class="form-control" type="text" name="service_time" id="up-service_time" value="" placeholder="Enter Service Time">
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
                                    <label for="up-tag">Tag<span>*</span></label>
                                    <select class="form-control" type="text" name="tag" id="up-tag" value="" data-parsley-required data-parsley-required-message="Tag is required.">
                                        <option value="">Select Tag</option>
                                        <option value="NoTag">NoTag</option>
                                        <option value="New">New</option>
                                        <option value="Exclusive">Exclusive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="category_id" id="up_category_id" value="" data-parsley-required data-parsley-required-message="Category is required.">
                                        <option value="">Select Tag</option>
                                        <option value="3">Category Title</option>
                                        @foreach($categories as $category)
                                            <option id="selected-category-id" onclick="getSubCategory({{ $category->id }})" value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_sub_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="sub_category_id" id="up_sub_category_id" value="" data-parsley-required data-parsley-required-message="Sub-Category is required.">
                                        <option value="">Select Sub-Category</option>
                                        @foreach($sub_category as $sub_cat)
                                            <option id="selected-sub-category-id" value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="edit_service_description">Description</label>
                                    <textarea class="form-control" type="text" value="" name="description" placeholder="Enter Description" id="edit_service_description"></textarea>
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
        CKEDITOR.replace( 'edit_service_description' );
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
                text: "You want to delete this Category.It will delete all SubCategory and Product corresponding to this Category",
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
                url:"{{ route('admin.add-service') }}",
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
                        console.log(datas.description);
                        console.log('1111111111111111111111111111');
                    }
                }
            });
        }

        function getSubCategory(param) {
            console.log('hhhhhhhhhh');
        }

        function ServiceEdit(id){
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('admin.edit-service') }}",
                method:'POST',
                data: {
                    _token:token,
                    id:id
                },
                success:function(data){
                    if (data) {
                        let datas = $.parseJSON(data);
                        $('#id').val(datas.id);
                        $('#service-title').val(datas.title);

                        // service image
                        if (datas.service_image != null) {
                            $("#upload_service_image").show();
                            $("#upload_service_image img").attr('src', "{{ asset('public/images/services/') }}"+'/'+datas.service_image);
                        }else{
                            $("#upload_service_image").hide();
                        }
                        // service product image
                        if (datas.service_product_image != null) {
                            $("#upload_service_product_image").show();
                            $("#upload_service_product_image img").attr('src', "{{ asset('public/images/services/') }}"+'/'+datas.service_product_image);
                        }else{
                            $("#upload_service_product_image").hide();
                        }

                        // service product image
                        if (datas.service_banner_image != null) {
                            $("#upload_service_banner_image").show();
                            $("#upload_service_banner_image img").attr('src', "{{ asset('public/images/services/') }}"+'/'+datas.service_banner_image);
                        }else{
                            $("#upload_service_banner_image").hide();
                        }

                        $('#up-service_time').val(datas.service_time);
                        $('#up-price').val(datas.price);
                        $('#up-discount').val(datas.discount);
                        $('#up-tag').val(datas.tag);
                        $('#up_sub_category_id').val(datas.sub_category_id);
                        $('#up_category_id').val(datas.category_id);

                        CKEDITOR.instances.edit_service_description.setData( datas.description,
                            function(){
                                this.checkDirty();
                            });

                        $('#edit-service-modal').modal('show');
                    }
                }
            });
        }
    </script>
@endsection
