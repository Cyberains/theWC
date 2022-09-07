@extends('admin.includes.main')
@section('title')

<title>SubBrand | Product Management</title>

@endsection

@section('style')



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
                <div class="col-sm-7"></div>
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" placeholder="Search Here">
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-sm btn-primary float-right" id="add-subbrand"><i
                            class="fa fa-plus"></i>&nbspAdd SubBrand</button>
                </div>

            </div>
        </div>


        <div class="row bg-white mx-0 py-3 mt-2">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Brand</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="searchresult">
                        @include('admin.product.paggination_subbrand')
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

<div class="modal fade" id="add-subbrand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Add Sub-Brand</h3>
                <form class="sform form" method="post" action="{{ route('admin.add_subbrand') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="brand">Brand<span>*</span></label>
                                <select class="form-control" name="brand" id="brand" data-parsley-required
                                    data-parsley-required-message="Brand Name is required.">
                                    <option value="">Select Brand</option>
                                    @foreach($branddata as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="title"
                                    value="{{ old('title') }}" placeholder="Enter Brand Title" data-parsley-required
                                    data-parsley-required-message="Brand Name is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="image">Brand Image<span>*</span></label>
                                <input class="form-control product_photo" type="file" name="subbrand_image"
                                    value="{{ old('image') }}" data-parsley-required
                                    data-parsley-required-message="This field is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description"
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="student-submit" class="btn btn-primary"
                                    style="float: right;">Save</button>

                                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-subbrand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Edit Brand</h3>
                <form class="sform form" method="post" action="{{ route('admin.update_subbrand') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <input type="text" name="subbrand_id" value="" id="edit_subbrand_id" hidden="hidden">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="brand">Brand<span>*</span></label>
                                <select class="form-control" name="brand" id="edit_brand" data-parsley-required
                                    data-parsley-required-message="Brand Name is required.">
                                    <option value="">Select Brand</option>
                                    @foreach($branddata as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="edit_subbrand_name" value=""
                                    placeholder="Enter SubBrand Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="image">SubBrand Image<span>*</span></label>
                                <div class="d-flex">
                                    <div id="upload_image"><img width="50" height="50" src=""></div>
                                    <input class="form-control ml-4 product_photo" type="file" name="subbrand_image"
                                        id="edit_image" value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description"
                                    placeholder="Enter Description" id="edit_subbrand_description"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="student-submit" class="btn btn-primary"
                                    style="float: right;">Save</button>

                                <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;"
                                    data-dismiss="modal">Close</button>
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

    $('#add-subbrand').click(function() {

        $('#add-subbrand-modal').modal('show');

    });

    $('#edit_image').change(function() {

        var images = $(this).prop('files')[0];

        reader = new FileReader();
        reader.onload = function(e) {

            $('#upload_image img').attr('src', e.target.result);

        }

        reader.readAsDataURL(this.files[0]);

    });


    // $('#category').change(function(){

    //     var category_id = $(this).val();
    //     var token = $('meta[name="csrf-token"]').attr('content');
    //     $('#subcategory option').remove();

    //     $.ajax({

    //         url:"{{ route('admin.get_subcategory') }}",
    //         method:'POST',
    //         data:{

    //             _token:token,
    //             id:category_id

    //         },

    //         success:function(data){

    //             if (data) {

    //               var data = $.parseJSON(data);
    //               var html = "<option value=''>Select Sub-category</option>";
    //               var count = data.length;

    //               for(var i =0; i<count;i++){

    //                 html += "<option value='"+data[i].id+"'>"+data[i].title+"</option>";

    //               }

    //               $('#subcategory').append(html);


    //             }
    //         }

    //     });

    // });

    //filter jquery

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

function fetch_data(page, query) {
    //console.log(query);
    $.ajax({
        url: "subbrand/search?page=" + page + "&query=" + query,
        success: function(data) {
            // console.log()
            $('tbody').html(data);
        }
    })
}

$(document).on('click','.subbrand-delete',function() {

        var url = $(this).data('url');
        swal({

            title: "Are you sure?",
            text: "You want to delete this SubBrand.It will delete all Product corressponding to this subbrand.",
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

function subbrandedit(id) {

    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({

        url: "{{ route('admin.edit_subbrand') }}",
        method: 'POST',
        data: {

            _token: token,
            id: id

        },
        async: false,
        success: function(data) {

            if (data) {

                var data = $.parseJSON(data);

                $('#edit_brand option').each(function() {

                    if ($(this).val() == data.brand_id) {

                        $(this).attr('selected', 'selected');
                    }

                });

                $('#edit_subbrand_id').val(data.id);
                $('#edit_subbrand_name').val(data.title);
                $("#upload_image img").attr('src', "{{ asset('public/images/subbrand') }}" + '/' + data
                    .image);
                $('#edit_subbrand_description').val(data.description);
                $('#edit-subbrand-modal').modal('show');


            }
        }

    });
}
</script>

@endsection