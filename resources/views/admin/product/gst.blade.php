@extends('admin.includes.main')
@section('title')
    
    <title>GST | Product Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">GST</li>

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
                    <button class="btn btn-sm btn-primary float-right" id="add-gst"><i class="fa fa-plus"></i>&nbspAdd GST Rate</button>
                </div>
            </div>                    
        </div> 

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered">
                  <thead>
                      <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>GST Type</th>
                      <th>GST Rate(%)</th>
                      @if(Auth::user()->role == 'admin')
                      <th>Action</th>

                      @endif
                  </tr>
                  </thead>
                  <tbody id="searchresult">
                     @include('admin.product.paggination_gst')
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

  <div class="modal fade" id="add-gst-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add GST Rate</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_gst') }}" >
              @csrf
              <div class="row " style="padding: 30px;">
                      
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="gst_type">GST Type<span>*</span></label>
                          <input class="form-control" type="text" name="gst_type" id="gst_type" 
                          value="{{ old('gst_type') }}" placeholder="Enter GST Type"  data-parsley-required 
                              data-parsley-required-message="GST Type is required.">                          
                      </div>
                  </div>                  
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="gst_rate">GST Rate(%)<span>*</span></label>
                          <input class="form-control" type="number" step="0.01" name="gst_rate" id="gst_rate" 
                          value="{{ old('gst_rate') }}" placeholder="Enter GST Rate"  data-parsley-required 
                              data-parsley-required-message="GST Rate is required.">                          
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

  <div class="modal fade" id="edit-gst-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Edit GST Rate</h3>
          <form class="sform form" method="post" action="{{ route('admin.update_gst') }}">
              @csrf
              <div class="row " style="padding: 30px;">
                  
                  <input type="text" name="gst_id" value="" id="edit_gst_id" hidden="hidden">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="gst_type">GST Type<span>*</span></label>
                          <input class="form-control" type="text" name="gst_type" id="edit_gst_type" 
                          value="{{ old('gst_type') }}" placeholder="Enter GST Type"  data-parsley-required 
                              data-parsley-required-message="GST Type is required.">                          
                      </div>
                  </div>                  
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="gst_rate">GST Rate(%
                            )<span>*</span></label>
                          <input class="form-control" type="number" step="0.01" name="gst_rate" id="edit_gst_rate" 
                          value="{{ old('gst_rate') }}" placeholder="Enter GST Rate"  data-parsley-required 
                              data-parsley-required-message="GST Rate is required.">                          
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
      var token = $('meta[name="csrf-token"]').attr('content');

        $('#add-gst').click(function(){

            $('#add-gst-modal').modal('show');

        });
//filter jquery
var token = $('meta[name="csrf-token"]').attr('content');
 $("#search").on('keyup',function(){
    var query = $('#search').val();
    var page = $('#hidden_page').val(1);
    fetch_data(page,query);
  });
 
 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
 $('#hidden_page').val(page);
   var query = $('#search').val();
    
  $('li').removeClass('active');
        $(this).parent().addClass('active');
  fetch_data(page,query);
 });
});
 function fetch_data(page, query)
 {
 //console.log(query);
  $.ajax({
   url:"gst/search?page="+page+"&query="+query,
   success:function(data)
   {
  
    $('tbody').html(data);
   }
  })
 }

  $(document).on('click','.gst-delete',function () {
    
        var url = $(this).data('url'); 
        swal({
            title: "Are you sure?",
            text: "You want to delete this GST!",
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

    function gstedit(id){

        var token = $('meta[name="csrf-token"]').attr('content');

        
            $.ajax({

                url:"{{ route('admin.edit_gst') }}",
                method:'POST',
                data:{

                    _token:token,
                    id:id
                    
                },

                success:function(data){

                    if (data) {

                        var data = $.parseJSON(data);
                       
                        $('#edit_gst_id').val(data.id);
                        $('#edit_gst_rate').val(data.gst_rate);
                        $('#edit_gst_type').val(data.gst_type);                       
                        $('#edit-gst-modal').modal('show');

                    }
                }

            });
        }


  </script>

@endsection
