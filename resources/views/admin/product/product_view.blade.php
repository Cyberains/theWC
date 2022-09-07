@extends('admin.includes.main')
@section('title')

    <title>Product Detail | Product Management</title>

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
        <div class="row ">
            <div class="col-xl-12 col-md-12">

                    <a href="{{ route('admin.product') }}" class="btn btn-primary float-right">Back</a>

            </div>
        </div>
        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
            <div class="row mb-4">
              <div class="col-md-12">
                <h5>PRODUCT DETAILS PAGE</h5>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label>Product Name</label>
                <h6>{{ $productdata->title }}</h6>
              </div>
              <div class="col-md-4 mb-3">
                <label>Product Code</label>
                <h5>{{ $productdata->product_code }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Category</label>
                <h5>{{ @$productdata->categoryName->title }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>SubCategory</label>
                <h5>{{ @$productdata->SubCategoryName->title }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Brand</label>
                <h5>{{ @$productdata->BrandName->title }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>SubBrand</label>
                <h5>@if($productdata->sub_brand_id != null){{ @$productdata->SubBrandName->title }} @endif</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Manufacturer</label>
                <h5>{{ @$productdata->ManufacturerName->title }} </h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>HSN</label>
                <h5>{{ $productdata->hsn_code }} </h5>
              </div>
              @if($productdata->sgst_tax != null)
              <div class="col-md-4 mb-3">
                <label>SGST(%)</label>
                <h5>{{ @$productdata->sgstName->gst_rate }}</h5>
              </div>
              @endif
              @if($productdata->cgst_tax != null)
              <div class="col-md-4 mb-3">
                <label>CGST(%)</label>
                <h5>{{ @$productdata->cgstName->gst_rate }}</h5>
              </div>
              @endif
              @if($productdata->igst_tax != null)
              <div class="col-md-4 mb-3">
                <label>IGST(%)</label>
                <h5>{{ @$productdata->igstName->gst_rate }}</h5>
              </div>
              @endif
              @if($productdata->ugst_tax != null)
              <div class="col-md-4 mb-3">
                <label>UTGST(%)</label>
                <h5>{{ @$productdata->ugstName->gst_rate }}</h5>
              </div>
              @endif
              @if($productdata->cess_tax != null)
              <div class="col-md-4 mb-3">
                <label>CESS(%)</label>
                <h5>{{ @$productdata->cessName->gst_rate }}</h5>
              </div>
              @endif
              @if($productdata->apmc_tax != null)
              <div class="col-md-4 mb-3">
                <label>APMC(%)</label>
                <h5>{{ @$productdata->apmcName->gst_rate }}</h5>
              </div>
              @endif
              @if($productattriute != null)
              <div class="col-md-4 mb-3">
                <label>MRP Price  (<i class="fa fa-rupee-sign"></i>)</label>
                <h5>@if($productattriute->mrp_price != null){{ $productattriute->mrp_price }}/- @endif</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Selling Price  (<i class="fa fa-rupee-sign"></i>)</label>
                <h5>@if($productattriute->selling_price != null){{ $productattriute->selling_price }}/- @endif</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Memership Price  (<i class="fa fa-rupee-sign"></i>)</label>
                <h5>@if($productattriute->membership_price != null){{ $productattriute->membership_price }}/- @endif</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Cost Price(<i class="fa fa-rupee-sign"></i>)</label>
                <h5>@if($productattriute->cost_price != null){{ $productattriute->cost_price }}/- @endif</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Basic Price(<i class="fa fa-rupee-sign"></i>)</label>
                <h5>@if($productattriute->basic_price != null){{ $productattriute->basic_price }}/- @endif</h5>
              </div>

              <div class="col-md-4 mb-3">
                <label>Weight</label>
                <h5>@if($productattriute->unit != null){{ $productattriute->unit }} @endif</h5>
              </div>
              @if($productexpiry)
              <div class="col-md-4 mb-3">
                <label>Net Stock</label>
                <h5>@if($productexpiry->quantity != null){{ $productexpiry->quantity }} @endif</h5>
              </div>
              @endif
              <div class="col-md-4 mb-3">
                <label>Barcode ID</label>
                <h5>@if($productattriute->barcode_id != null){{ $productattriute->barcode_id }} @endif</h5>
              </div>
              @endif
            </div>

            <div class="row">
              <div class="col-md-12">
                <label>Product Details:</label>
                <p>{{ $productdata->description }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Product Image</label>
                @if($productimage->count()>0)
                <div class="d-flex">
                  @foreach($productimage as $image)
                  <div class="card ml-2">
                    <a href="{{ route('admin.remove_image',['id'=>$image->id]) }}" class="cross"
                      onclick="return confirm('Are you sure, you want to delete this product image?')"><i class="fa fa-times"></i></a>
                    <img src="{{ asset('public/images/product/'.$image->image) }}" width="100px" height="100px">
                  </div>
                  @endforeach
                </div>
                @endif
              </div>
            </div>
            <div class="row fileupload-buttonbar">
              <div class="col-md-12">
                <div class="col-md-2">
                    <div class="file-field">
                      <form action="{{ route('admin.image_product') }}" method="post" class="form" id="image-form" enctype="multipart/form-data">
                        @csrf
                        <div class=" float-left btn-file">
                           <a href="javascript:void(0)" class="btn btn-success" onclick="$('#product-image').click()">Upload Product Image</a>

                              <input type="file" id="product-image" onchange="readImage()"  name="productImg[]" accept="image/jpg,image/png" multiple hidden="hidden">
                              <input type="text" name="product_id" value="{{ $productdata->id }}" hidden>
                        </div>
                      </form>
                    </div>

                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="d-flex preview-images-zone">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 d-flex">
                <div class="file-field" id="startUploadButtonDiv" style="display:none;">
                  <div class="btn btn-warning btn-sm">
                      <span> Start Upload</span>
                  </div>
                </div>
                <div class="file-field ml-3" id="cancelUploadButtonDiv" style="display:none;">
                  <div class="btn btn-danger btn-sm" id="cancelUploadButton">
                      <span> Cancel Upload</span>
                  </div>
                </div>
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
  </script>

@endsection
