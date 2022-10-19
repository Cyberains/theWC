@extends('admin.includes.main')
@section('title')
    <title>New Launches | New Launches Management</title>
@endsection
@section('btitle')
    <li class="breadcrumb-item">New Launches Management</li>
@endsection
@section('btitle1')
    <li class="breadcrumb-item">New Launches</li>
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
                </div>
            </div>

            <div class="row bg-white mx-0 py-3 mt-2">
                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Banner Image</th>
                            <th>Type</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Service Name</th>
                            @if(Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="searchresult">
                        @include('admin.new_launches.paggination_new_launches')
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
                    <h3 class="text-center">Add New-Launch</h3>
                    <form class="sform form" method="post" action="{{ route('admin.add-new-launched') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="banner_image">New Launch Banner Image<span>*</span>( Enter 1:1 ratio Image Above 1024px )</label>
                                    <div class="d-flex">
                                        <input class="form-control" type="file" name="banner_image" id="banner_image" value="{{ old('banner_image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up-type">Type<span>*</span></label>
                                    <select class="form-control" type="text" name="type" id="up_type" value="" data-parsley-required data-parsley-required-message="Type is required.">
                                        <option value="">Select Type</option>
                                        <option value="Service List">Service List</option>
                                        <option value="Service">Service</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="category_id" id="up_category_id" value="">
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
                                    <label for="up_sub_category_id">Select Sub-Category<span>*</span></label>
                                    <select class="form-control" type="text" name="sub_category_id" id="up_sub_category_id" value="">
                                        <option value="">Select Sub-Category</option>
                                        @foreach($sub_category as $sub_cat)
                                            <option id="selected-sub-category-id" value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_service_id">Select Service<span>*</span></label>
                                    <select class="form-control" type="text" name="service_id" id="service_id" value="{{ old('service_id') }}">
                                        <option value="">Select Sub-Category</option>
                                        @foreach($services_list as $service)
                                            <option id="selected-sub-category-id" value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
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

    <div class="modal fade" id="edit-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Edit New-Launch</h3>
                    <form class="sform form" method="post" action="{{ route('admin.update-new-launched') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" id="id" hidden="hidden">
                        <div class="row " style="padding: 30px;">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="banner_image">New Launch Banner Image<span>*</span>( Enter 1:1 ratio Image Above 1024px )</label>
                                    <div class="d-flex">
                                        <div id="upload_banner_image"><img width="50" height="50"></div>
                                        <input class="form-control ml-4 photo" type="file" name="banner_image" id="banner_image" value="{{ old('banner_image') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up-type">Type<span>*</span></label>
                                    <select class="form-control" type="text" name="type" id="up_type" value="" data-parsley-required data-parsley-required-message="Type is required.">
                                        <option value="">Select Type</option>
                                        <option value="Service List">Service List</option>
                                        <option value="Service">Service</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="category_id" id="up_category_id" value="">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option id="selected-category-id" onclick="getSubCategory({{ $category->id }})" value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_sub_category_id">Select Category<span>*</span></label>
                                    <select class="form-control" type="text" name="sub_category_id" id="up_sub_category_id" value="">
                                        <option value="">Select Sub-Category</option>
                                        @foreach($sub_category as $sub_cat)
                                            <option id="selected-sub-category-id" value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_service_id">Select Service<span>*</span></label>
                                    <select class="form-control" type="text" name="service_id" id="up_service_id" value="">
                                        <option value="">Select Service</option>
                                        @foreach($services_list as $service)
                                            <option id="selected-sub-category-id" value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
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

        function ServiceEdit(id){
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('admin.edit-new-launched') }}",
                method:'POST',
                data: {
                    _token:token,
                    id:id
                },
                success:function(data){
                    if (data) {
                        let datas = $.parseJSON(data);
                        $('#id').val(datas.id);
                        // New Launched image
                        if (datas.banner_image != null) {
                            $("#upload_banner_image").show();
                            $("#upload_banner_image img").attr('src', datas.base_path +'/'+datas.banner_image);
                        }else{
                            $("#upload_service_image").hide();
                        }
                        $('#up_type').val(datas.type);
                        $('#up_sub_category_id').val(datas.sub_category_id);
                        $('#up_category_id').val(datas.category_id);
                        $('#up_service_id').val(datas.service_id);
                        $('#edit-service-modal').modal('show');
                    }
                }
            });
        }
    </script>
@endsection
