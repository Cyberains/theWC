@extends('admin.includes.main')
@section('title')
    
    <title>Product Import | Product Management</title>

@endsection

@section('style')

  <style type="text/css">
    
    .preview-image img{

      width: 100px;
      height: 100px;
    }

    .cross{

      position: absolute;
      top: 0px;
      right: 0px;
    }

  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
        <div class="row bg-white mx-0 py-3 mt-2 mb-4">
          <div class="col-md-12">
            <div class="row border-bottom">
              <div class="col-md-12 col-xl-12">
                <a href="{{ route('admin.download_csv_sample_product')}}" class="btn btn-primary "><i class="fa fa-download"></i> Download Sample</a><br><br>
              </div>
            </div>
            <div class="row bg-white mx-0 pt-4">
              <div class="col-xl-12 col-md-12">                            

                        <p>Your xlsx data should be in the format below. The first line of your xlsx file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.</p>

                     
                      <p class="mb-0"><small style="color:red">Duplicate Product wont be imported</small></p>
                     

                  
              </div>                    
          </div>
          <div class="row bg-white mx-0 py-3 mt-2 px-3">
              <div class="col-md-12 table-responsive ">
                  <table class="table table-striped table-bordered" cellspacing="0"  width="500px" style="overflow:auto;">
                    <thead>
                        <tr>
                         <th>Category</th>
                         <th>Sub_Category</th>
                         <th>Brand</th>
                         <th>Sub_Brand</th>
                         <th>Manufacturer</th>
                         <th>Bar_Code</th>
                         <th>Title</th>
                         <th>HSN_Code</th>
                         <th>Sub_Category_Type</th>
                         <th>Description</th>
                         <th>SGST_Tax</th>
                         <th>CGST_Tax</th>
                         <th>IGST_Tax</th>
                         <th>UGST_Tax</th>
                         <th>CESS_Tax</th>
                         <th>APMC_Tax</th>
                         <th>MRP_Price</th>
                         <th>Selling_Price </th>
                         <th>Membership_Price</th>
                         <th>Cost_Price</th>
                         <th>SV_Sell_Price</th>
                         <th>Aisle</th>
                         <th>Rack</th>
                         <th>Shelf</th>
                         <th>Weight</th>
                         <th>Unit</th>
                         <th>Net Stock</th>
                         <th>Mfg_Date</th>
                         <th>Expiry_Date</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                             <td>Cleaning Essentials</td>
                             <td>Cleaning Accesories</td>
                             <td>Scotch Brite</td>
                             <td></td>
                             <td>3M</td>
                             <td>897867564534</td>
                             <td>Scotch Brite Jumper Spin Mob</td>
                             <td>123456</td>
                             <td>Poly bags</td>
                             <td>Scotch-Brite is a line of abrasive products produced by 3M.</td>
                             <td>SGST@9</td>
                             <td>CGST@9</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>3500</td>
                             <td>3400</td>
                             <td>3300</td>
                             <td>3200</td>
                             <td>3200.50</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>pieces</td>
                             <td>kg,gm,ltr,ml</td>
                             <td>20</td>
                             <td>2020-01-15</td>
                             <td>2021-01-15</td>                                   
                         </tr>
                       </tbody>
                   </table>
              </div>
          </div>
          <div class="row mx-0 bg-white mt-2 pb-3">
            <div class="col-md-12">
               <form action="{{ route('admin.import_csv_product') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group my-3">
                    <label class="col-sm-2 control-label " for="name"><strong>Choose CSV File:</strong></label>

                    <div class="col-md-12">
                      <input type="file" class="form-control valdation_check input-file-field" id="name" name="import_file">
                      <span id="val_name" style="color: red"></span>
                    </div>
                    <div class="col-md-12 py-3">
                      <button class="btn btn-primary btn-flat float-right " type="submit">submit</button>
                      <a href="{{ route('admin.product') }}" class="btn btn-info float-right mr-3 ">cancel</a>
                      
                    </div>
                  </div>
             
               
              </form>
            </div>
        </div>
          </div>
        </div>    
     
      <!-- /.row-->
    </div>
  </div>

@endsection



@section('script')
  
  <script type="text/javascript">
   
    var num = 1;
    function readImage() {
       if (window.File && window.FileList && window.FileReader) {
          var files = event.target.files; //FileList object
          var output = $(".preview-images-zone");
          for (let i = 0; i < files.length; i++) {
               var file = files[i];
               if (!file.type.match('image')) continue;
               var picReader = new FileReader();
               picReader.addEventListener('load', function (event) {
                   var picFile = event.target;
                   var html =  '<div class="preview-image card ml-2 preview-show-' + num + '">' +
    //                             '<div class="image-cancel" data-no="' + num + '">x</div>' +
                               '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                               '</div>';

                   output.append(html);
                   num = num + 1;
               });

               picReader.readAsDataURL(file);
           }

          $("#cancelUploadButtonDiv").show();
          $("#startUploadButtonDiv").show();
         //  $("#pro-image").val('');
       } else {
           console.log('Browser not support');
       }
    }

    $('#cancelUploadButtonDiv').click(function(){

        $('.preview-image').remove();
        $("#cancelUploadButtonDiv").hide();
        $("#startUploadButtonDiv").hide();

        $('#product-image').val(null);


    });

    $('#startUploadButtonDiv').click(function(){

        $('#image-form').submit();

    });

        var url1 = "{{ route('admin.import_product') }}";
        var url2 = window.location.href;

        if (url1==url2) {

            $('a[href="'+'{{ route('admin.product') }}' + '"]').addClass('c-active');

            $('a[href="' + '{{ route('admin.product') }}' + '"]').parent().parent().parent().addClass('c-show');

        };
  </script>

@endsection
