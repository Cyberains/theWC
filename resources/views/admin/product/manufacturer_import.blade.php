@extends('admin.includes.main')

@section('title')
    
    <title>Manufacturer Import | Product Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Product Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Manufacturer</li>

@endsection

@section('btitle2')
    
    <li class="breadcrumb-item">Import Manufacturer</li>

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
                <a href="{{ route('admin.download_csv_sample_manufacturer')}}" class="btn btn-primary "><i class="fa fa-download"></i> Download Sample</a><br><br>
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
                         <th>Name</th>
                         <th>Description</th>

                       </tr>
                      </thead>
                      <tbody>
                          <tr>
                             <td>3M</td>
                             <td>Descrption.</td>
                                                               
                         </tr>
                       </tbody>
                   </table>
              </div>
          </div>
          <div class="row mx-0 bg-white mt-2 pb-3">
            <div class="col-md-12">
               <form action="{{ route('admin.import_csv_manufacturer') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group my-3">
                    <label class="col-sm-2 control-label " for="name"><strong>Choose CSV File:</strong></label>

                    <div class="col-md-12">
                      <input type="file" class="form-control valdation_check input-file-field" id="name" name="import_file">
                      <span id="val_name" style="color: red"></span>
                    </div>
                    <div class="col-md-12 py-3">
                      <button class="btn btn-primary btn-flat float-right " type="submit">submit</button>
                      <a href="{{ route('admin.manufacturer') }}" class="btn btn-info float-right mr-3 ">cancel</a>
                      
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
      
      
      var url1 = "{{ route('admin.import_manufacturer') }}";
      var url2 = window.location.href;

      if (url1==url2) {

        $('a[href="'+'{{ route('admin.manufacturer') }}' + '"]').addClass('c-active');

        $('a[href="' + '{{ route('admin.manufacturer') }}' + '"]').parent().parent().parent().addClass('c-show');

      };

  

  </script>

@endsection
