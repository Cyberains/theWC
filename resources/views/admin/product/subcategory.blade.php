@extends('admin.includes.main')
@section('title')

    <title>SubCategory | Product Management</title>

@endsection

@section('btitle')

    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')

    <li class="breadcrumb-item">Sub-Category</li>

@endsection


@section('style')



@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">

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
                    <button class="btn btn-sm btn-primary float-right" id="add-subcategory"><i class="fa fa-plus"></i>&nbspAdd SubCategory</button>
                  </div>

            </div>
        </div>

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered" >
                  <thead>
                    <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>Category Name</th>
                      <th>Sub-Category Name</th>
                      <th>Image</th>
                      <th>Description</th>
                      @if(Auth::user()->role == 'admin')
                      <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody id="searchresult">

                     @include('admin.product.paggination_subcategory')
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

  <div class="modal fade" id="add-subcategory-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add SubCategory</h3>
          <form class="sform form" method="post" enctype="multipart/form-data" action="{{ route('admin.add_subcategory') }}" >
              @csrf
              <div class="row " style="padding: 30px;">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="category">Category<span>*</span></label>
                        <select class="form-control"  name="category" id="category"                                data-parsley-required
                             data-parsley-required-message="Category Name is required.">
                            <option value="">Select Category</option>
                            @foreach($categorydata as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title of the SubCategory<span>*</span></label>
                        <input class="form-control" type="text" name="title" id="title"
                        value="{{ old('title') }}" placeholder="Enter SubCategory Title"  data-parsley-required
                            data-parsley-required-message="SubCategory Name is required.">
                    </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group ">
                          <label for="image">Sub Category Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                          <input class="form-control category_photo" type="file" name="image"
                                 value="{{ old('image') }}" data-parsley-required
                                 data-parsley-required-message="This field is required.">
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="price">Description of the SubCategory</label>
                          <textarea class="form-control" type="text" name="description" id="description" placeholder="Enter Description"></textarea>
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

  <div class="modal fade" id="edit-subcategory-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Edit Category</h3>
          <form class="sform form" method="post" enctype="multipart/form-data" action="{{ route('admin.update_subcategory') }}">
              @csrf
              <div class="row " style="padding: 30px;">

                  <input type="text" name="subcategory_id" value="" id="edit_subcategory_id" hidden="hidden">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="category">Category<span>*</span></label>
                        <select class="form-control"  name="category" id="edit_category"                                data-parsley-required
                             data-parsley-required-message="Category Name is required.">
                            <option value="">Select Category</option>
                            @foreach($categorydata as $category)

                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group ">
                          <label for="image">Category Image<span>*</span>( Enter 1:1 ratio Image Above 400px )</label>
                          <div class="d-flex">
                              <div id="upload_image">
                                  <img width="50" height="50" src="">
                              </div>
                              <input class="form-control ml-4 category_photo" type="file" name="image"
                                     id="edit_image" value="{{ old('image') }}">
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group ">
                          <label for="title">Title of the SubCategory<span>*</span></label>
                          <input class="form-control" type="text" name="title" id="edit_subcategory_name"
                          value="" placeholder="Enter SubCategory Title">
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="price">Description of the SubCategory</label>
                          <textarea class="form-control" type="text" name="description" placeholder="Enter Description" id="edit_subcategory_description"></textarea>
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
        $('#add-subcategory').click(function(){
            $('#add-subcategory-modal').modal('show');
        });
      //======filter jquery=======//
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

$(document).on('click','.subcategory-delete',function () {

            var url = $(this).data('url');
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this SubCategory.It will delete all product corresponding to this subcategory.",
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

function fetch_data(page, query) {
    //console.log(query);
    $.ajax({
        url: "subcategory/search?page=" + page + "&query=" + query,
        success: function(data) {
        // console.log()
            $('tbody').html(data);
        }
    })
}

    function subcategoryedit(id){
        var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{ route('admin.edit_subcategory') }}",
                method:'POST',
                data:{
                    _token:token,
                    id:id
                },
                success:function(data){
                    if (data) {
                        var data = $.parseJSON(data);
                      $('#edit_subcategory_id').val(data.id);
                      $('#edit_category option').each(function(){
                            if ($(this).val() == data.category_id) {
                              $(this).attr('selected','selected');
                            }
                      });
                        $('#edit_subcategory_name').val(data.title);
                        $('#edit_subcategory_description').val(data.description);
                        $('#edit-subcategory-modal').modal('show');
                    }
                }
            });
        }
  </script>

@endsection
