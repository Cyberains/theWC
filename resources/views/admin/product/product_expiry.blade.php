@extends('admin.includes.main')
@section('title')
    
    <title>Product Attribute | Product Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Product Expiry</li>

@endsection

@section('style')
  
<style type="text/css">
  
      .table-status{

        width: 150px;

    }

   .table .active-color{
        color: darkgreen;
        font-weight: 600;
    }

    .table .inactive-color{
        color: maroon;
        font-weight: 600;
    }

    .table .fa-toggle-on{

      color:darkgreen;
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
                <div class="col-sm-4">
                    <button class="btn btn-sm btn-primary float-right" id="add-productexpiry"><i class="fa fa-plus"></i>&nbspAdd Product Expiry</button>

                    <a href="{{ route('admin.import_quantity') }}" class="btn btn-sm btn-primary float-right mr-3"><i
                            class="fa fa-cloud"></i>&nbspUpdate Bulk Quantity</a>
                
                </div>
            </div>                    
        </div> 

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered">
                  <thead>
                      <tr class="table-primary">
                        <th>Sr.No.</th>
                        <th> Product Name</th>
                        <th>Product MRP</th>
                        <th>Aisle</th>
                        <th>Rack</th>
                        <th>Shelf</th>
                        <th>Net Stock</th>
                        <th>Mfg Date</th>
                        <th>Expiry Date</th>
                        <th>Offline Status</th>
                        <th>Online Status</th>
                        @if(Auth::user()->role == 'admin')
                        <th>Action</th>

                        @endif
                  </tr>
                  </thead>
                  <tbody>
                    @include('admin.product.paggination_product_expiry')
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

  <div class="modal fade" id="add-productexpiry-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Product Expiry</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_productexpiry') }}" enctype="multipart/form-data">
              @csrf
              <div class="row " style="padding: 30px;">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Product<span>*</span></label>
                        <input type="text" name="product" id="addproduct"  list="addproduct_list" class="form-control" placeholder="Enter Product" data-parsley-required
                             data-parsley-required-message="Product Name is required.">
                          <datalist id="addproduct_list"></datalist>
                       
                    </div>
                  </div>                 
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_attr">Product MRP<span>*</span></label>
                        <select class="form-control" name="product_attr" id="product_attr"                                data-parsley-required
                             data-parsley-required-message="Product MRP is required.">
                            <option value="">Select Product MRP</option>
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="aisle">Aisle</label>
                          <input class="form-control" type="text" name="aisle" id="aisle" 
                          value="{{ old('aisle') }}" placeholder="Enter Aisle" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="rack">Rack</label>
                          <input class="form-control" type="text" name="rack" id="rack" 
                          value="{{ old('rack') }}" placeholder="Enter Rack" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="self">Shelf</label>
                          <input class="form-control" type="text" name="self" id="shelf" 
                          value="{{ old('shelf') }}" placeholder="Enter Shelf" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="quantity">Net Stock<span>*</span></label>
                          <input class="form-control" type="number" step="0.01" name="quantity" id="quantity" 
                          value="{{ old('quantity') }}" min="0" placeholder="Enter Stock" data-parsley-required 
                          data-parsley-required-message="Stock is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="mfg_date">Manufacturing Date</label>
                          <input class="form-control" type="text" name="mfg_date" id="mfg_date" value="{{ old('mfg_date') }}" placeholder="Enter Manufacturing Date">                          
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="expiry_date">Expiry Date</label>
                          <input class="form-control" type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}" placeholder="Enter Expiry Date">                          
                      </div>
                  </div>          
                  <div class="col-md-12">
                     <div class="form-group">
                          <button type="submit" name="productexpiry-submit" id="productexpiry-submit" class="btn btn-primary" style="float: right;">Save</button>

                          <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit-productattr-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Edit Product Expiry</h3>
          <form class="sform form" method="post" action="{{ route('admin.update_productexpiry') }}">
              @csrf
              <div class="row " style="padding: 30px;">
                  
                  <input type="text" name="productexpiry_id" value="" id="edit_productexpiry_id" hidden="hidden">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Product<span>*</span></label>
                        <input type="text" name="product" id="edit_product"  list="product_list" placeholder="Enter Product"  class="form-control" data-parsley-required
                             data-parsley-required-message="Product Name is required.">
                          <datalist id="product_list"></datalist>
                      
                    </div>
                  </div>                 
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_attr">Product MRP<span>*</span></label>
                        <select class="form-control" name="product_attr" id="edit_product_attr"                                data-parsley-required
                             data-parsley-required-message="Product MRP is required.">
                            <option value="">Select Product MRP Price</option>
                            
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="aisle">Aisle</label>
                          <input class="form-control" type="text" name="aisle" id="edit_aisle" 
                          value="{{ old('aisle') }}" placeholder="Enter Aisle" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="rack">Rack</label>
                          <input class="form-control" type="text" name="rack" id="edit_rack" 
                          value="{{ old('rack') }}" placeholder="Enter Rack" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="self">Shelf</label>
                          <input class="form-control" type="text" name="self" id="edit_shelf" 
                          value="{{ old('shelf') }}" placeholder="Enter Shelf" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="quantity">Net Stock<span>*</span></label>
                          <input class="form-control" min="0" type="number" name="quantity" id="edit_quantity" 
                          value="{{ old('quantity') }}" placeholder="Enter Quantity" data-parsley-required 
                          data-parsley-required-message="Quantity is required.">                            
                      </div>
                  </div> 
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="mfg_date">Manufacturing Date</label>
                          <input class="form-control" type="text" name="mfg_date" id="edit_mfg_date" value="{{ old('mfg_date') }}" placeholder="Enter Manufacturing Date">                          
                      </div>
                  </div>              
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="expiry_date">Expiry Date</label>
                          <input class="form-control" type="text" name="expiry_date" id="edit_expiry_date" value="{{ old('expiry_date') }}" placeholder="Enter Expiry Date">                          
                      </div>
                  </div>                               
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="productexpiry-submit" id="edit-productexpiry-submit" class="btn btn-primary" style="float: right;">Save</button>

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

        var date_input=$('input[name="expiry_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

        date_input.datepicker({

            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,

        })

        var date_input=$('input[name="mfg_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

        date_input.datepicker({

            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,

        })

        

        $('#add-productexpiry').click(function(){

            $('#add-productexpiry-modal').modal('show');

        });


      //filter
      $("#search").on('keyup', function() {
        var query = $('#search').val();
        var page = $('#hidden_page').val(1);
        fetch_data(page, query);
    });


      $(document).on('change','#addproduct',function(){

          var product_id = $(this).val();
          var token = $('meta[name="csrf-token"]').attr('content');
          $('#product_attr option').remove();

          $.ajax({

              url:"{{ route('admin.get_productattribute') }}",
              method:'POST',
              data:{

                  _token:token,
                  id:product_id
                  
              },

              success:function(data){

                  if (data !=1) {

                    var data = $.parseJSON(data);
                    var html = "<option value=''>Select Product MRP</option>";
                    var count = data.length;

                    for(var i =0; i<count;i++){

                      html += "<option value='"+data[i].id+"'>"+data[i].mrp_price.toFixed(2)+"</option>";

                    }

                    $('#product_attr').append(html);


                  }
                  else{

                    toastr.options =
                    {
                      "closeButton" : true,
                      "progressBar" : true
                    }
                    toastr.error("This product does not exists");
                  }
              }

          });

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

  $(document).on('click','.productexpiry-delete',function () {

            var url = $(this).data('url'); 
            swal({

                title: "Are you sure?",
                text: "You want to delete this product expiry.",
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

$.ajax({
    url: "productexpiry/search?page=" + page + "&query=" + query,
    success: function(data) {

        $('tbody').html(data);
    }
})
}
  function activeinactivetoggle(status,id){

      var token = $('meta[name="csrf-token"]').attr('content');

      if (status==0) {

          var statusstr = 'inactive';
      }

      if (status==1) {

          var statusstr = 'active';
      }

      var result = confirm('Are you want to offline '+statusstr+' this product quantity ?');
  
      if (result) {

          $.ajax({

          url:"{{ route('admin.toggle_productexpiry') }}",
          method:'POST',
          data:{

              _token:token,
              status:status,
              id:id
              
          },

          success:function(data){

              if (data==1) {

                  
                window.location.href = "{{ route('admin.productexpiry') }}";
                  
                 
              }
            }

          });

      }
  }

  function onlineactiveinactivetoggle(status,id){

      var token = $('meta[name="csrf-token"]').attr('content');

      if (status==0) {

          var statusstr = 'inactive';
      }

      if (status==1) {

          var statusstr = 'active';
      }

      var result = confirm('Are you want to online '+statusstr+' this product quantity ?');
  
      if (result) {

          $.ajax({

          url:"{{ route('admin.onlinetoggle_productexpiry') }}",
          method:'POST',
          data:{

              _token:token,
              status:status,
              id:id
              
          },

          success:function(data){

              if (data==1) {

                  
                window.location.href = "{{ route('admin.productexpiry') }}";
                  
                 
              }
            }

          });

      }
  }

 
        
  function productexpiryedit(id){

        var token = $('meta[name="csrf-token"]').attr('content');

        
            $.ajax({

                url:"{{ route('admin.edit_productexpiry') }}",
                method:'POST',
                data:{

                    _token:token,
                    id:id
                    
                },
                async:false,
                success:function(data){

                    if (data) {

                        var data = $.parseJSON(data);

                        
                        $('#edit_productexpiry_id').val(data.id);
                        // $('#edit_product option').each(function(){

                        //     if ($(this).val()==data.product_id) {

                        //       $(this).attr('selected','selected');
                        //     }

                        // });

                        $('#edit_product').val(data.product_name.title);

                        $('#edit_product_attr option').remove();

                        $.ajax({

                            url:"{{ route('admin.get_productattributeid') }}",
                            method:'POST',
                            data:{

                                _token:token,
                                id:data.product_id
                                
                            },
                            async:false,
                            success:function(data){

                                if (data) {

                                  var data = $.parseJSON(data);
                                  var html = "<option value=''>Select Product MRP</option>";
                                  var count = data.length;

                                  for(var i =0; i<count;i++){

                                    html += "<option value='"+data[i].id+"'>"+parseFloat(data[i].mrp_price).toFixed(2)+"</option>";

                                  }

                                  $('#edit_product_attr').append(html);


                                }
                            }

                        });

                        $('#edit_product_attr option').each(function(){

                            if ($(this).val()==data.productattr_id) {

                              $(this).attr('selected','selected');
                            }

                        });

                        $('#edit_aisle').val(data.aisle);
                        $('#edit_rack').val(data.rack);
                        $('#edit_self').val(data.shelf);
                        $('#edit_quantity').val(data.quantity);
                        $('#edit_mfg_date').val(data.mfg_date);
                        $('#edit_expiry_date').val(data.expiry_date);
                        $('#edit-productattr-modal').modal('show');

                    }
                }

            });
        }

       //  var count = 0;
       //  function addImage(){

       //    var html='';

       //    count++;

           

       //        html += '<tr><td style="width:40%"><input type="file" class="form-control item_image"  name="product_image[]" id="product_image_'+count+'" data-parsley-required data-parsley-required-message="Image is required."></td><td style="width:40%"><div id="product_show_'+count+'"><img src="{{ asset("public/assets/img/image.jpg") }}" width="30px"></div></td><td style="width:10%"><button type="button"  class="btn btn-danger remove"><i class="fa fa-minus"></i></button></td></tr>';

       //          $('#multiple_image tbody').append(html);  

       // }; 


       // $(document).on('click','.remove',function(){

       //    $(this).closest('tr').remove();

       // });

       var token = $('meta[name="csrf-token"]').attr('content');
    $(document).on('keypress','#edit_product',function(){
        var productname=$(this).val();
        
        
       var html='';
         $.ajax({
               url: "{{ route('admin.attributes-title-search') }}",
               dataType: "json",
               type: "POST",
               data: {
                       _token:token,
                       productname:productname
                   },

               success:function(data){
              console.log(data);
               if(data.status == 1){
               var productdata = data.productdata;
             //console.log(productdata.barcode_id);
               for(key in productdata){
                   html += '<option value="'+productdata[key].title+'"/>';

                   }
                  
                }
              if(data.status == 0){
                   $('#product_list option').remove();
                   html = "<option value='No Record Found'/>";
                   }
                   $('#product_list').html(html);
            }
       })
     
    });
    
    $(document).on('keypress','#addproduct',function(){
        var productname=$(this).val();
        
        
       var html='';
         $.ajax({
               url: "{{ route('admin.attributes-title-search') }}",
               dataType: "json",
               type: "POST",
               data: {
                       _token:token,
                       productname:productname
                   },

               success:function(data){
                console.log(data);
               if(data.status == 1){

               var productdata = data.productdata;
             
               for(key in productdata){
                   html += '<option value="'+productdata[key].title+'"/>';

                   }
                  
                }
              if(data.status == 0){
                   $('#addproduct_list option').remove();
                   html = "<option value='No Record Found'/>";
                   }
                   $('#addproduct_list').html(html);
            }
       })
     
    });

  </script>

@endsection
