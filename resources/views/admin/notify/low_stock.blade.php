@extends('admin.includes.main')
@section('title')
    
    <title>Low Stock | Notification Management</title>

@endsection

@section('style')
  
  <style type="text/css">
    
    .chosen-container-single{

      width: 100% !important;
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
            </div>                    
        </div> 

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12 table-responsive-sm">
              <table class="table  table-bordered">
                  <thead>
                    <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>Product Name</th>
                      <th>MRP Price<small>(<i class="fa fa-rupee"></i>)</small></th>
                      <th>Quantity</th>
                      <th>Mfg. Date<br><small>(dd-mm-yyyy)</small></th>
                      <th>Expiry Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @include('admin.vendor.paggination_purchage_list')
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

 

@endsection

@section('script')
  
  <script type="text/javascript">

        
        
    $(document).ready(function(){

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

    
    function fetch_data(page, query) {
        //console.log(query);
        $.ajax({
            url: "purchage/search?page=" + page + "&query=" + query,
            success: function(data) {
            // console.log()
                $('tbody').html(data);
            }
        })
    }
  </script>

@endsection
