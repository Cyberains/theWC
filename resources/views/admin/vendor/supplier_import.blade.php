@extends('admin.includes.main')
@section('title')
    
    <title>Supplier Import | Vendor Management</title>

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
                <a href="{{ route('admin.download_csv_supplier')}}" class="btn btn-primary "><i class="fa fa-download"></i>Download Sample</a><br><br>
              </div>
            </div>
            <div class="row bg-white mx-0 pt-4">
              <div class="col-xl-12 col-md-12">                            

                    <p>Your CSV data should be in the format below. The first line of your CSV file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.</p>
                     
                    <p class="mb-0"><small style="color:red">Duplicate Supplier wont be imported</small></p>
                                       
              </div>                    
          </div>
          <div class="row bg-white mx-0 py-3 mt-2 px-3">
              <div class="col-md-12 table-responsive ">
                  <table class="table table-striped table-bordered" cellspacing="0"  width="500px" style="overflow:auto;">
                    <thead>
                      <tr>
                         <th>Supplier_Name*</th>
                         <th>Supplier_Email*</th>
                         <th>Supplier_Mobile*</th>
                         <th>Supplier_Address*</th>
                         <th>GST_IN*</th>
                         <th>PAN_NO*</th>
                         <th>Pincode*</th>
                         <th>City*</th>
                         <th>State*</th>
                         <th>Country*(in:India)</th>
                         <th>Tax_type(options:none,inter_state,intra_state)</th>
                         <th>PO_Expiry_Duration*(In days)</th>
                         <th>Owner_Name</th>
                         <th>Owner_Email</th>
                         <th>Owner_Mobile</th>
                         <th>SPOC_Name</th>
                         <th>SPOC_Email</th>
                         <th>SPOC_Mobile</th>
                         <th>Lead_Time*(In Days)</th>
                         <th>Credit_Period*(In Days)</th>
                         <th>Bank_Name*</th>
                         <th>IFSC_Code*</th>
                         <th>Branch_Name*</th>
                         <th>Account_Number*</th>
                         <th>Account_Holder_name*</th>
                         <th>Secondary_Email*</th>

                       </tr>
                      </thead>
                      <tbody>
                          <tr>
                             <td>Supplier</td>
                             <td>supplier@gmail.com</td>
                             <td>1234567890</td>
                             <td>Test</td>
                             <td>22AAAAA0000A1Z5</td>
                             <td>AAAAA0000A</td>
                             <td>123456</td>
                             <td>Agra</td>
                             <td>Utter Pradesh</td>
                             <td>in</td>
                             <td>none</td>
                             <td>17</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>                                   
                             <td>6</td>                                   
                             <td>30</td>                                   
                             <td>PNB</td>                                   
                             <td>PNB00006</td>                                  
                             <td>Sikandra</td> 
                             <td>9870594819</td>                                   
                             <td>Test Test</td>                                   
                             <td>test@gmail.com</td>                                   
                         </tr>
                       </tbody>
                   </table>
              </div>
          </div>
          <div class="row mx-0 bg-white mt-2 pb-3">
            <div class="col-md-12">
               <form action="{{ route('admin.import_csv_supplier') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group my-3">
                    <label class="col-sm-2 control-label " for="name"><strong>Choose CSV File:</strong></label>

                    <div class="col-md-12">
                      <input type="file" class="form-control valdation_check input-file-field" id="name" name="import_file">
                      <span id="val_name" style="color: red"></span>
                    </div>
                    <div class="col-md-12 py-3">
                      <button class="btn btn-primary btn-flat float-right " type="submit">submit</button>
                      <a href="{{ route('admin.supplier') }}" class="btn btn-info float-right mr-3 ">cancel</a>
                      
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
   
        var url1 = "{{ route('admin.import_supplier') }}";
        var url2 = window.location.href;

        if (url1==url2) {

            $('a[href="'+'{{ route('admin.supplier') }}' + '"]').addClass('c-active');

            $('a[href="' + '{{ route('admin.supplier') }}' + '"]').parent().parent().parent().addClass('c-show');

        };

   
  </script>

@endsection
