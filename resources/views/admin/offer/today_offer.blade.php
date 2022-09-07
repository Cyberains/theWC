@extends('admin.includes.main')
@section('title')

<title>Today Offer | Offer Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Offer Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Today Offer</li>

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
            <div class="col-md-12 text-right">

                <button class="btn btn-sm btn-primary" id="add-offer"><i class="fa fa-plus"></i>&nbspAdd
                    Offer</button>

            </div>
        </div>


        <div class="row bg-white mx-0 py-3 mt-2">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th>Sr.No.</th>
                            <th>Offer ID</th>
                            <th>Product Name</th>
                            <th>MRP</th>
                            <th>Selling Price</th>
                            <th>Today Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            @if(Auth::user()->role == 'admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="offer">
                        @include('admin.offer.paggination_offer')
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

<div class="modal fade" id="add-offer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Add Today Offer</h3>
                <form class="sform form" method="post" action="{{ route('admin.add_today_offer') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product">Product<span>*</span></label>
                                <input type="text" name="product" id="addproduct"  list="addproduct_list" class="form-control" placeholder="Enter product Name" data-parsley-required
                                     data-parsley-required-message="Product Name is required.">
                                  <datalist id="addproduct_list"></datalist>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_attr">Product MRP<span>*</span></label>
                                <select class="form-control" name="product_attr" id="product_attr" data-parsley-required
                                     data-parsley-required-message="Product MRP is required.">
                                    <option value="">Select Product MRP</option>
                                    
                                </select>
                            </div>
                        </div>                      
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="today_price">Today Price<span>*</span></label>
                              <input class="form-control" type="number" step="0.01" name="today_price" id="today_price" 
                              value="{{ old('today_price') }}" placeholder="Enter Today Price" data-parsley-required 
                              data-parsley-required-message="Today Price is required.">                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input class="form-control input-bottom" type="text" name="start_date" id="startdate" placeholder="Enter Start Date">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End Date:</label>
                                <input class="form-control input-bottom" type="text" name="end_date" id="enddate" placeholder="Enter End Date">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <button type="submit" name="offer-submit" class="btn btn-primary"
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

<div class="modal fade" id="edit-offer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Edit Offer</h3>
                <form class="sform form" method="post" action="{{ route('admin.update_offer') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row " style="padding: 30px;">

                        <input type="text" name="offer_id" value="" id="edit_offer_id" hidden="hidden">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product">Product<span>*</span></label>
                                <input type="text" name="product" id="edit_addproduct"  list="edit_addproduct_list" class="form-control" placeholder="Enter product Name" data-parsley-required data-parsley-required-message="Product Name is required.">
                                  <datalist id="edit_addproduct_list"></datalist>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_attr">Product MRP<span>*</span></label>
                                <select class="form-control" name="product_attr" id="edit_product_attr" data-parsley-required
                                     data-parsley-required-message="Product MRP is required.">
                                    <option value="">Select Product MRP</option>
                                    
                                </select>
                            </div>
                        </div>                      
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="today_price">Today Price<span>*</span></label>
                              <input class="form-control" type="number" step="0.01" name="today_price" id="edit_today_price" 
                              value="{{ old('today_price') }}" placeholder="Enter Today Price" data-parsley-required 
                              data-parsley-required-message="Today Price is required.">                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input class="form-control input-bottom" type="text" name="start_date" id="edit_startdate" placeholder="Enter Start Date">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End Date:</label>
                                <input class="form-control input-bottom" type="text" name="end_date" id="edit_enddate" placeholder="Enter End Date">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="offer-submit" class="btn btn-primary"
                                    style="float: right;">Update</button>

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

var token = $('meta[name="csrf-token"]').attr('content');

function delay(callback, ms) {

      var timer = 0;
      return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
}

$('#addproduct').keypress(delay(function(){

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
     
    },2000));


$('#add-offer').click(function(){

    $('#add-offer-modal').modal('show');

});

$('#addproduct').change(function(){

          var product_id = $(this).val();
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

                      html += "<option value='"+data[i].id+"'>"+parseFloat(data[i].mrp_price).toFixed(2)+"</option>";

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

    $('#startdate').datetimepicker({

        format : 'DD-MM-YYYY HH:mm:ss'
    });
    
    $('#enddate').datetimepicker({

        format : 'DD-MM-YYYY HH:mm:ss'
    });

    
   $("#startdate").on("dp.change", function (e) {
       $('#enddate').data("DateTimePicker").minDate(e.date);
   });
   $("#enddate").on("dp.change", function (e) {
       $('#startdate').data("DateTimePicker").maxDate(e.date);
   });

//edit
function offeredit(id) {

    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({

        url: "{{ route('admin.edit_offer') }}",
        method: 'POST',
        data: {

            _token:token,
            id: id

        },

        success: function(data) {

            if (data) {

                var option = '<option value="">Select Product MRP</option>';
                var offer = data.offerdata;
                $('#edit_offer_id').val(offer.id);
                $('#edit_addproduct').val(offer.product_name.title);
                $('#edit_product_attr option').remove();

                for(key in data.mrpdata){

                    option += '<option value="'+data.mrpdata[key].id+'">'+(data.mrpdata)[key].mrp_price+'</option>'

                }

                $('#edit_product_attr').append(option);

                $('#edit_product_attr option').each(function(){

                    if( $(this).val()==offer.productattr_id){

                        $(this).attr('selected','selected');

                    }

                });

                $('#edit_today_price').val(offer.today_price);               
                $('#edit_startdate').val(offer.start_date);               
                $('#edit_enddate').val(offer.end_date);               
                $('#edit-offer-modal').modal('show');

            }
        }

    });
}


$('#edit_addproduct').keypress(delay(function(){

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
                   $('#edit_addproduct_list option').remove();
                   html = "<option value='No Record Found'/>";
                   }
                   $('#edit_addproduct_list').html(html);
            }
       })
     
    },2000));


$('#edit_addproduct').change(function(){

          var product_id = $(this).val();
          $('#edit_product_attr option').remove();

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

                      html += "<option value='"+data[i].id+"'>"+parseFloat(data[i].mrp_price).toFixed(2)+"</option>";

                    }

                    $('#edit_product_attr').append(html);


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


    $('#edit_startdate').datetimepicker({

        format : 'DD-MM-YYYY HH:mm:ss'
    });
    
    $('#edit_enddate').datetimepicker({

        format : 'DD-MM-YYYY HH:mm:ss'
    });

    
   $("#edit_startdate").on("dp.change", function (e) {
       $('#edit_enddate').data("DateTimePicker").minDate(e.date);
   });
   $("#edit_enddate").on("dp.change", function (e) {
       $('#edit_startdate').data("DateTimePicker").maxDate(e.date);
   });





</script>

@endsection