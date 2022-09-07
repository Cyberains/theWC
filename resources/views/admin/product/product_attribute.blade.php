@extends('admin.includes.main')
@section('title')
    
    <title>Product Attribute | Product Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Product Attribute</li>

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
                    <button class="btn btn-sm btn-primary float-right" id="add-productattr"><i class="fa fa-plus"></i>&nbspAdd Product Attributes</button>
                </div>
            </div>                    
        </div> 

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered" >
                  <thead>
                      <tr class="table-primary">
                        <th>Sr.No.</th>
                        <th> Product Name</th>
                        <th>Barcode ID</th>
                        <th>MRP</th>
                        <th>Sale(<i class="fa fa-rupee"></i>)</th>
                        <th>M.P(<i class="fa fa-rupee"></i>)</th>
                        <th>Basic(<i class="fa fa-rupee"></i>)</th>
                        <th>Cost(<i class="fa fa-rupee"></i>)</th>
                        <th>SV SEll(<i class="fa fa-rupee"></i>)</th>
                        <th>Status</th>
                        @if(Auth::user()->role == 'admin')
                        <th>Action</th>
                        
                        @endif
                      </tr>
                  </thead>
                  <tbody>
                   @include('admin.product.paggination_product_attribute')
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

  <div class="modal fade" id="add-productattr-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Product Attribute</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_productatt') }}" enctype="multipart/form-data">
              @csrf
              <div class="row " style="padding: 30px;">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="bar_code">Barcode ID:</label>
                          <input class="form-control" type="text" name="bar_code" id="bar_code" value="{{ old('bar_code') }}" placeholder="Enter Barcode">                          
                      </div>
                  </div>                                      
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Product<span>*</span></label>
                        <input type="text" name="product" id="addproduct"  list="addproduct_list" class="form-control" data-parsley-required
                             data-parsley-required-message="Product Name is required.">
                          <datalist id="addproduct_list"></datalist>
                       
                    </div>
                  </div>                 
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="mrp_price">MRP Price<span>*</span></label>
                          <input class="form-control" type="text" name="mrp_price" id="mrp_price" 
                          value="{{ old('mrp_price') }}" placeholder="Enter MRP Price"  data-parsley-required 
                          data-parsley-required-message="MRP Price is required.">                          
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="selling_price">Selling Price<span>*</span></label>
                          <input class="form-control" type="text" name="selling_price" id="selling_price" 
                          value="{{ old('selling_price') }}" placeholder="Enter Selling Price" data-parsley-required 
                          data-parsley-required-message="Selling Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="sv_selling_price">SV.Selling Price<span>*</span></label>
                          <input class="form-control" type="text" name="sv_selling_price" id="sv_selling_price" 
                          value="{{ old('sv_selling_price') }}" placeholder="Enter SV Selling Price" data-parsley-required 
                          data-parsley-required-message="SV Selling Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cost_price">Cost Price<span>*</span></label>
                          <input class="form-control" type="text" name="cost_price" id="cost_price" 
                          value="{{ old('cost_price') }}" placeholder="Enter Cost Price" data-parsley-required 
                          data-parsley-required-message="Cost Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="membership_price">Membership Price<span>*</span></label>
                          <input class="form-control" type="text" name="membership_price" id="membership_price" 
                          value="{{ old('membership_price') }}" placeholder="Enter Membership Price" >                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="unit">Weight<span>*</span></label>
                          <input class="form-control" type="text" name="unit" id="unit" 
                          value="{{ old('unit') }}" placeholder="Enter Weight" data-parsley-required 
                          data-parsley-required-message="Weight is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="unit_check">Unit</label>
                      <select class="form-control" type="text" name="unit_check" id="unit_check">
                          <option value="">Choose Unit</option>
                          <option value="nos">NOS</option>
                          <option value="kg">Kg(Kilogram)</option>
                          <option value="gm">gm(Gram)</option>
                          <option value="ml">ml(milliliter)</option>
                          <option value="ltr">Ltr(liter)</option>
                          <option value="dozen">Dozen</option>

                      </select>
                    </div>
                  </div>       
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="button" name="productattr-submit" id="productattr-submit" class="btn btn-primary" style="float: right;">Save</button>

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
          <h3 class="text-center">Edit Product Attributes</h3>
          <form class="sform form" method="post" action="{{ route('admin.update_productatt') }}">
              @csrf
              <div class="row " style="padding: 30px;">
                  
                  <input type="text" name="productattr_id" value="" id="edit_product_id" hidden="hidden">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="edit_bar_code">Barcode ID:</label>
                          <input class="form-control" type="text" name="bar_code" id="edit_bar_code" value="{{ old('bar_code') }}" placeholder="Enter Product Code">                          
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="product">Product<span>*</span></label>
                        <input type="text" name="product" id="edit_product"  list="product_list" class="form-control" data-parsley-required
                             data-parsley-required-message="Product Name is required.">
                          <datalist id="product_list"></datalist>
                      
                    </div>
                  </div>                 
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="mrp_price">MRP Price<span>*</span></label>
                          <input class="form-control" type="text" name="mrp_price" id="edit_mrp_price" 
                          value="{{ old('mrp_price') }}" placeholder="Enter MRP Price"  data-parsley-required 
                          data-parsley-required-message="MRP Price is required.">                          
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="selling_price">Selling Price</label>
                          <input class="form-control" type="text" name="selling_price" id="edit_selling_price" 
                          value="{{ old('selling_price') }}" placeholder="Enter Selling Price" data-parsley-required 
                          data-parsley-required-message="Selling Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="sv_selling_price">SV.Selling Price<span>*</span></label>
                          <input class="form-control" type="text" name="sv_selling_price" id="edit_sv_selling_price" 
                          value="{{ old('sv_selling_price') }}" placeholder="Enter SV Selling Price" data-parsley-required 
                          data-parsley-required-message="SV Selling Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cost_price">Cost Price</label>
                          <input class="form-control" type="text" name="cost_price" id="edit_cost_price" 
                          value="{{ old('cost_price') }}" placeholder="Enter Cost Price" data-parsley-required 
                          data-parsley-required-message="Cost Price is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="membership_price">Membership Price</label>
                          <input class="form-control" type="text" name="membership_price" id="edit_membership_price" 
                          value="{{ old('membership_price') }}" placeholder="Enter Membership Price">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="unit">Weight<span>*</span></label>
                          <input class="form-control" type="text" name="unit" id="edit_unit" 
                          value="{{ old('unit') }}" placeholder="Enter Unit" data-parsley-required 
                          data-parsley-required-message="Weight is required.">                            
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="unit_check">Unit</label>
                      <select class="form-control" type="text" name="unit_check" id="edit_unit_check">

                          <option value="">Choose Unit</option>
                          <option value="nos">NOS</option>
                          <option value="kg">Kg(Kilogram)</option>
                          <option value="gm">gm(Gram)</option>
                          <option value="ml">ml(milliliter)</option>
                          <option value="ltr">ltr(liter)</option>
                          <option value="dozen">Dozen</option>

                      </select>
                    </div>
                  </div>                                                              
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="button" name="productattr-submit" id="edit-productattr-submit" class="btn btn-primary" style="float: right;">Save</button>

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


        $('#add-productattr').click(function(){

            $('#add-productattr-modal').modal('show');

        });


         $('#productattr-submit').click(function(){

            $('.sform').submit();

        });

        $('#edit-productattr-submit').click(function(){

            $('.sform').submit();
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


  $(document).on('click','.productattr-delete',function () {

      var url = $(this).data('url'); 
      swal({

          title: "Are you sure?",
          text: "You want to delete this product attribute.It will delete all Product expiry corressponding to this product attribute.",
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
      url: "productattributes/search?page=" + page + "&query=" + query,
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

            var result = confirm('Are you want to '+statusstr+' this product attibute ?');
        
            if (result) {

                $.ajax({

                url:"{{ route('admin.toggle_productatt') }}",
                method:'POST',
                data:{

                    _token:token,
                    status:status,
                    id:id
                    
                },

                success:function(data){

                    if (data==1) {

                        
                      window.location.href = "{{ route('admin.productatt') }}";
                        
                       
                    }
                  }

                });

            }
        }
        
  function productattredit(id){

        var token = $('meta[name="csrf-token"]').attr('content');

        
            $.ajax({

                url:"{{ route('admin.edit_productatt') }}",
                method:'POST',
                data:{

                    _token:token,
                    id:id
                    
                },
                async:false,
                success:function(data){

                    if (data) {
                     // console.log(data.productdata);
                        $('#edit_product_id').val(data.productdata.id);
                        $('#edit_bar_code').val(data.productdata.barcode_id);

                        $('#edit_unit_check option').each(function(){

                            if ($(this).val()==data.productdata.unit_check) {

                              $(this).attr('selected','selected');
                            }

                        });
                        $('#edit_product').val(data.productdata.product_name.title);
                        $('#edit_mrp_price').val(data.productdata.mrp_price);

                        $('#edit_selling_price').val(data.productdata.selling_price);

                        $('#edit_sv_selling_price').val(data.productdata.eb_cost_price);

                        $('#edit_basic_price').val(data.productdata.basic_price);

                        $('#edit_membership_price').val(data.productdata.membership_price);

                        $('#edit_unit').val(data.productdata.unit);
                        $('#edit_cost_price').val(data.productdata.cost_price);
                        
                        $('#edit_quantity').val(data.productdata.quantity);


                       
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
            
           if(data.status == 1){
           var productdata = data.productdata;
         //console.log(productdata.barcode_id);
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
