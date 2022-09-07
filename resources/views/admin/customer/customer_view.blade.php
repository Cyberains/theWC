@extends('admin.includes.main')
@section('title')
    
    <title>Customer Detail</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Employees Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Employees</li>

@endsection

@section('btitle2')
    
    <li class="breadcrumb-item">View</li>

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

   .active-color{

        color: darkgreen;
        font-weight: 600;
    }

    .inactive-color{
        color: maroon;
        font-weight: 600;
    }

  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
        <div class="row ">
            <div class="col-xl-12 col-md-12">                            
                
                    <a href="{{ route('admin.customer') }}" class="btn btn-primary float-right">Back</a>
                
            </div>                    
        </div>
        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
            <div class="row mb-4">
              <div class="col-md-12">
                <h5>CUSTOMER DETAILS PAGE</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label>Customer Name</label>
                <h6>{{ $customerdata->name }}</h6>
              </div>
              <div class="col-md-4 mb-3">
                <label>Customer Email</label>
                <h5>{{ $customerdata->email }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Customer Mobile</label>
                <h5>{{ $customerdata->mobile }}</h5>
              </div>
              <div class="col-md-4 mb-3">
                <label>Membership</label>
                @if($customerdata->membership_status==0)
               <h5 class="inactive-color">Not Taken</h5>
               @else
               <h5 class="active-color">Active</h5>
               @endif
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-12">
                <h5>Customer Address</h5>
              </div>
            </div>
            @if($customerdata->address_id != null)
              @foreach($customerdata->addressName as $address)
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label>Address</label>
                    <h5>{{ $address->house_no }} {{ $address->area }} {{ $address->landmark }}</h5>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>City</label>
                    <h5>{{ $address->city }}</h5>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>State</label>
                    <h5>{{ $address->state }}</h5>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label>Country</label>
                    <h5>{{ $address->country }}</h5>
                  </div>
                </div>
              @endforeach
            @endif
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

    var url1 = "{{ route('admin.view_customer',['id'=>$customerdata->id]) }}";
    var url2 = window.location.href;

    if (url1==url2) {

      $('a[href="'+'{{ route('admin.customer') }}' + '"]').addClass('c-active');

      $('a[href="' + '{{ route('admin.customer') }}' + '"]').parent().parent().parent().addClass('c-show');

    }



  </script>

@endsection
