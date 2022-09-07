@extends('admin.includes.main')
@section('title')

<title>Manufacturer | Product Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Manufacturer</li>

@endsection



@section('style')


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
                <div class="col-sm-4">
                    <button class="btn btn-sm btn-primary float-right" id="add-manufacturer"><i
                            class="fa fa-plus"></i>&nbspAdd Manufacturer</button>

                    <a href="{{ route('admin.import_manufacturer') }}"
                        class="btn btn-sm btn-primary float-right mr-2"><i class="fa fa-cloud"></i>&nbspImport
                        Manufacturer</a>
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
                            <th>Description</th>
                            @if(Auth::user()->role == 'admin')
                            <th>Action</th>

                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @include('admin.product.paggination_manufacturer')
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

<div class="modal fade" id="add-manufacturer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Add Manufacturer</h3>
                <form class="sform form" method="post" action="{{ route('admin.add_manufacturer') }}">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="title"
                                    value="{{ old('title') }}" placeholder="Enter Manufacturer Title"
                                    data-parsley-required
                                    data-parsley-required-message="Manufacturer Name is required.">
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

<div class="modal fade" id="edit-manufacturer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Edit Manufacturer</h3>
                <form class="sform form" method="post" action="{{ route('admin.update_manufacturer') }}">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <input type="text" name="manufacturer_id" value="" id="edit_manufacturer_id" hidden="hidden">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="title">Title<span>*</span></label>
                                <input class="form-control" type="text" name="title" id="edit_manufacturer_name"
                                    value="" placeholder="Enter Manufacturer Title">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Description</label>
                                <textarea class="form-control" type="text" name="description"
                                    placeholder="Enter Description" id="edit_manufacturer_descrition"></textarea>
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

    
    $('#add-manufacturer').click(function() {

        $('#add-manufacturer-modal').modal('show');

    });
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
        url: "manufacturer/search?page=" + page + "&query=" + query,
        success: function(data) {

            $('tbody').html(data);
        }
    })
}

$(document).on('click','.manufacturer-delete',function() {

        var url = $(this).data('url');
        swal({

            title: "Are you sure?",
            text: "You want to delete this manufacturer.It will delete all Product corressponding to this manufacturer.",
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


function manufactureredit(id) {

    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({

        url: "{{ route('admin.edit_manufacturer') }}",
        method: 'POST',
        data: {

            _token: token,
            id: id

        },

        success: function(data) {

            if (data) {

                var data = $.parseJSON(data);


                $('#edit_manufacturer_id').val(data.id);
                $('#edit_manufacturer_name').val(data.title);
                $('#edit_manufacturer_descrition').val(data.description);

                $('#edit-manufacturer-modal').modal('show');

            }
        }

    });
}
</script>

@endsection