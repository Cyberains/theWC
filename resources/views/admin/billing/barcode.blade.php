@extends('admin.includes.main')
@section('title')
    
    <title>Barcode | Billing Management</title>

@endsection

@section('style')
  
  <style type="text/css">
    
   #barcode_submit{

    display: none;
    
   }

  </style>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Billing Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Barcode label</li>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="row ">
        <div class="col-md-4">
            <div class="form-group barcode_div">
                <label for="barcode">Barcode ID or Product Name:</label>
                <input class="form-control" type="text" list="items" name="barcode_id" onchange="additem(this.value)" id="barcode_id" placeholder="Scan Barcode ID or Type Enter Product Name" autofocus>

                <datalist id="items" style="width: 100%">
                  
                </datalist>
              
            </div>
          </div>                                     
      </div> 
      <form class="sform" id="barcode_form" action="{{ route('admin.add_barcode') }}" method="post">
      @csrf      
      <div class="row bg-white mx-0 py-3 mt-2" id="add_barcode">
          
          <div class="col-md-12">
            <table class="table" id="multiple_select">
              <thead class="table-primary">
                  <tr>
                    <td>Barcode</td>
                    <td>Product Name</td>
                    <td>MRP Price</td>
                    <td>Weight</td>
                    <td>Unit</td>
                    <td>Quantity</td>
                    <td>Action</td>
                  </tr>
              </thead>
              <tbody>
                  
              </tbody>
            </table>
        </div>
        <div class="col-md-12 text-right">
          <button type="submit" name="barcode_submit" id="barcode_submit" class="btn btn-primary">Submit Barcode</button>
        </div>                    
        </div>

      </form>  
      <!-- /.row-->
    </div>
    @if($offlinebarcode !=null)
      @if($offlinebarcode->status==0)
        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
            <div>
              <a href="{{ route('admin.generate_offbarcode',['id'=>$offlinebarcode->id]) }}"  target="_blank"  id="generate_barcode" class="btn btn-primary">Generate Barcode</a>
            </div>
          </div>
        </div>
      @endif
    @endif

  </div>

@endsection

@section('modal')

@endsection

@section('script')
  
  <script type="text/javascript">

    
    $(document).ready(function(){

        $(document).on('click','#generate_barcode' , function(e){ 

            e.preventDefault(); 
            var url = $(this).attr('href');
            window.open(url, '_blank');

            setInterval(function(){ 

              location.reload(true);

             }, 3000);

        });

        $(".select2").chosen({});

        $('#product_name').change(function(){

          var user_id = $(this).val();

        });

    });


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

    $("#barcode_id").keyup(delay(function (e) {

        var check = false;
        var valueq = $(this).val();

        $('#items option').each(function(){

            if ($(this).val()==$('#barcode_id').val()) {

                $('#items option').remove();
                check = true;

            }

        });

        if (check==false) {

          if (!$.isNumeric(valueq) && valueq !='') {
              
              $('#items option').remove();
              var token = $('meta[name="csrf-token"]').attr('content');
                var html='';
                $.ajax({

                  url: "{{ route('admin.item-search') }}",
                  dataType: "json",
                  type: "POST",
                  data: {
                      _token:token,
                      search:valueq
                  },
                  success: function(data){
                    console.log('manoj');
                    //Start
                    if(data.status == 1){

                      storeproductdata='';
                      storeproductdata = data;

                      var productdata = data.productdata;

            

                      for(key in productdata){

                        html += '<option value="'+productdata[key].title+'"/>';
                      }
                                                
                    }
                    else{
                      
                      toastr.options =
                      {
                        "closeButton" : true,
                        "progressBar" : true
                      }
                      toastr.error("No Record Found.");
                      html = '<option value="No Record Found" />';

                    }

                    $('#items').html(html);
                    

                   }
                })
    

        }
      }
    }, 2000));


    var count = 0;
    function additem(bar_code){

      var token = $('meta[name="csrf-token"]').attr('content');
     
      $.ajax({

          url:"{{ route('admin.get_barcode_product') }}",
          method:'POST',
          data:{

              _token:token,
              bar_code:bar_code,
            
          },
          success:function(data){

              if (data.success==1) {

                  var productdata = data.productdata;
                  var html='';
                  count++;

                  for(key in productdata){
                   
                    html += '<tr style="width:200px;"><td><input type="text" class="form-control bar_dublicate" name="bar_code[]" value="'+productdata[key].barcode_id+'" id="bar_code_id_'+count+'" readonly></td><td style="width: 400px;"><input type="text" class="form-control" name="product_name[]" value="'+productdata[key].product_name.title+'" id="product_name_id_'+count+'" readonly></td><td><input type="text" class="form-control" name="mrp_price[]" value="'+productdata[key].mrp_price+'" id="mrp_price_id_'+count+'" readonly></td><td><input type="text" class="form-control" name="weight[]" value="1" id="weight_'+count+'"></td><td><input type="text" class="form-control" name="unit[]" value="'+productdata[key].unit+'" id="unit_'+count+'" readonly></td><td><input type="text" class="form-control product_qty" name="quantity[]" id="quantity_id_'+count+'" data-parsley-required data-parsley-required-message="Quantity is required."></td><td style="width:10%"><button type="button"  class="btn btn-danger remove" ><i class="fa fa-minus"></i></button></td></tr>';

                  }

                    $('#product_name').val('').trigger("chosen:updated");

                    $('#multiple_select tbody').append(html);

                  if ($('.bar_dublicate').length==1){

                    $('#barcode_submit').css('display','inline-block');
                  }


              }

              else{

                toastr.options =
                {
                  "closeButton" : true,
                  "progressBar" : true
                }
                toastr.error("No Record Found.");
                      
              }
          }

      });

    }


    $(document).on('click','.remove',function(){

          $(this).closest('tr').remove();

          if ($('.bar_dublicate').length<1){

            $('#barcode_submit').hide();
          }

    });


  </script>

@endsection
