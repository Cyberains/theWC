@extends('admin.includes.main')
@section('title')
    
    <title>Membership | Billing Management</title>

@endsection

@section('btitle')
    
    <li class="breadcrumb-item">Billing Management</li>

@endsection

@section('btitle1')
    
    <li class="breadcrumb-item">Membership</li>

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

#user_name_chosen a>span {
    color: black !important;
}
#user_name_chosen {
    width: 100% !important;
}
#start_date_chosen a>span {
    color: black !important;
}
#start_date_chosen {
    width: 100% !important;
}
  </style>
@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
      
         <div class="row ">
            <div class="col-xl-12 col-md-12">
              <button class="btn btn-sm btn-primary " id="add-membership_card"><i class="fa fa-plus"></i>&nbsp Membership ID </button>                
                
                    <button class="btn btn-sm btn-primary float-right" id="add-membership"><i class="fa fa-plus"></i>&nbspAdd Membership</button>
                
            </div>                    
        </div> 

        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered" id="table-id" >
                  <thead>
                      <tr class="table-primary">
                        <th>Sr.No.</th>
                        <th>Duration</th>
                        <th>Price (<small><i class="fa fa-rupee"></i></small>)</th>
                        @if(Auth::user()->role == 'admin')
                          <th>Action</th>
                        @endif
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($membershipdata as $membership)

                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                               @if($membership->duration==29)
                                  Monthly
                              @elseif($membership->duration==89)
                                  Quaterly
                              @elseif($membership->duration==365)
                                  Yearly
                               @endif
                            </td>
                            <td>{{ $membership->price }}</td>
                              @if(Auth::user()->role == 'admin')
                            <td>
                              
                            <a title="Edit" href="javascript:void(0)"  onclick="membershipedit( {{ $membership->id }} )"  id="membership-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                                                         
                             <a href="{{ route('admin.delete_membership',['id'=>$membership->id]) }}"  id="membership-delete" onclick="return confirm('Are you sure, you want to delete this membership?')"><i class="fa fa-trash" style="color: maroon;"></i></a>
                             
                            </td>
                              @endif
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <div class="col-md-12 py-5">
              <div>
                    <h4>MemberShip Card</h4>
              </div>
               <div class="d-flex justify-content-between">
                  
                  <div>
                    <button class="btn btn-sm btn-primary mb-3" id="download-membershipbarcode"><i class="fa fa-plus"></i>&nbsp Download Membership Code</button> 
                  </div>
                  
                  <div>
                      <input type="text" class="form-control" id="search" placeholder="Search Here"> 
                                         
                  </div>
                  

               </div>
               <table class="table table-responsive-sm table-bordered" id="mtable" >
                  <thead>
                      <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>Membership Id</th>
                      <th>User Name</th>
                      <th>Start Date </th>
                      <th>End Date </th>
                      <th>Status</th>                       
                      <th>Action</th>

                      
                  </tr>
                  </thead>
                  <tbody>
                      @include('admin.billing.pagination_membership')
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

  <div class="modal fade" id="add-membership-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Membership</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_membership') }}" >
              @csrf
              <div class="row " style="padding: 30px;">
                      
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="duration">Duration<span>*</span></label>
                          <select class="form-control" type="text" name="duration" id="duration" 
                          value="{{ old('duration') }}" data-parsley-required 
                              data-parsley-required-message="Membership Duration is required."> 
                            <option value="">Select Duration</option>
                            <option value="29">Monthly</option>
                            <option value="89">Quaterly</option>
                            <option value="365">Yearly</option>

                          </select>                         
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="price">Price<span>*</span></label>
                          <input class="form-control" type="number" step="0.01" name="price" id="price" 
                          value="{{ old('price') }}" placeholder="Enter Membership Price"  data-parsley-required 
                              data-parsley-required-message="Membership Price is required.">                          
                      </div>
                  </div>                                                             
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="membership-submit" class="btn btn-primary" style="float: right;">Save</button>

                          <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>
 <div class="modal fade" id="edit-membership-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Edit Membership</h3>
          <form class="sform form" method="post" action="{{ route('admin.update_membership') }}">
              @csrf
              <div class="row " style="padding: 30px;">
                  
                  <input type="text" name="membership_id" value="" id="edit_membership_id" hidden="hidden">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="duration">Duration<span>*</span></label>
    <select class="form-control" type="text" name="duration" id="edit_duration" 
                        value="{{ old('duration') }}" data-parsley-required 
                            data-parsley-required-message="Membership Duration is required."> 
                          <option value="">Select Duration</option>
                          <option value="29">Monthly</option>
                          <option value="89">Quaterly</option>
                          <option value="365">Yearly</option>

                        </select>                         
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="price">Price<span>*</span></label>
                          <input class="form-control" type="number" step="0.01" name="price" id="edit_price" 
                          value="{{ old('price') }}" placeholder="Enter Membership Price"  data-parsley-required 
                              data-parsley-required-message="Membership Price is required.">                          
                      </div>
                  </div>                                                            
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="edit-membership-submit" class="btn btn-primary" style="float: right;">Save</button>

                          <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>




  <div class="modal fade" id="edit_membershipcard-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Edit Membership Id</h3>
          <form class="sform form" method="post" action="{{ route('admin.update_membershipcard') }}">
              @csrf
              <div class="row " style="padding: 30px;">
                  
                  <input type="text" name="cart_id" value="" id="edit_membershipcard_id" hidden="hidden">
                   <div class="col-md-12">
                    <div class="form-group">
                        <label for="duration">Membership ID</label>
                        <input class="form-control" type="number" step="0.01" name="cart_number" id="edit_card_number" 
                          value="{{ old('cart_number') }}" data-parsley-required 
                              data-parsley-required-message="Membership Id is required." readonly>                    
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">Select User<span>*</span></label>
                         <select class="form-control select2" name="user_name" id="user_name" value="{{ old('user_id') }}">

                        <option value=""> Select User </option>
                         @if(@!empty($users))
                         @foreach($users as $user)
                         <option value="{{$user->id}}">{{$user->name}}</option>
                         @endforeach
                         @endif

                      </select>                

                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                <label for="start_date">Validity</label>
                <select class="form-control select2" name="start_date" id="start_date" value="{{ old('start_date') }}">
                <option value=""> Select Here </option>
                 <option value="30">Monthly</option>
                  <option value="90">Quaterly</option>
                  <option value="180">Half Yearly</option> 
                   <option value="365">Yearly</option> 
                </select>                    
                      </div>
                  </div> 
                                     
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="edit-membership-submit" class="btn btn-primary" style="float: right;">Save</button>

                          <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>
<!---Add Membership Cart---->
<div class="modal fade" id="add-membership_card-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Membership Card Quantity</h3>
          <form class="sform form" method="post" action="{{ route('admin.add_membership_card') }}" >
              @csrf
              <div class="row " style="padding: 30px;">
                      
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="cart_number">Qty<span>*</span></label>
                           <input type="number" name="cart_number" required="" placeholder="Enter Membership Card quantity" min="1">                       
                      </div>
                  </div>
                                                                           
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="membership-submit" class="btn btn-primary" style="float: right;">Save</button>

                          <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>
                     </div>
                  </div>
              </div>               
          </form>
        </div>             
      </div>
    </div>
  </div>
  <!--download barcode -->
  <div class="modal fade" id="download-membershipbarcode-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 600px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Membership Card Download</h3>
          <form class="sform form" method="post" action="{{ route('admin.download_membership_card') }}" >
              @csrf
              <div class="row " style="padding: 30px;">
                      
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="cart_number">Qty<span >*</span></label>
                           <input type="number" name="qty" required="" placeholder="Enter Membership Card quantity" min="1" required="">                       
                      </div>
                  </div>
                                                                           
                  <div class="col-md-12">
                     <div class="form-group">
                          <button  type="submit" name="membership-submit" class="btn btn-primary" style="float: right;">Download</button>

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

        $('#add-membership').click(function(){

            $('#add-membership-modal').modal('show');

        });
         $('#add-membership_card').click(function(){

            $('#add-membership_card-model').modal('show');

        });
           $('#download-membershipbarcode').click(function(){

            $('#download-membershipbarcode-model').modal('show');

        });

 $(".select2").chosen({});
  
    });

    function membershipedit(id){
   var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url:"{{ route('admin.edit_membership') }}",
           method:'POST',
          data:{
          _token:token,
          id:id
          },
          success:function(data){
            if (data) {
            var data = $.parseJSON(data);
            $('#edit_membership_id').val(data.id);
            $('#edit_duration option').each(function(){
            if ($(this).val()==data.duration) {
            $(this).attr('selected','selected');
            }
            });
            $('#edit_price').val(data.price);
            $('#edit-membership-modal').modal('show');
            }
          }

      });
    }
//===Memebership Cart edit function===//
 function membershipcardedit(id){
 
   var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({

          url:"{{ route('admin.edit_membershipcard') }}",
          method:'POST',
          data:{
          _token:token,
          id:id
          },
          success:function(data){
            if (data) {

            var data1 = data.memberdata;
           
             $('#edit_membershipcard_id').val(data1.id);
            $('#edit_card_number').val(data1.cart_number);

            $("#user_name").val(data1.user_id).trigger("chosen:updated");
            $("#start_date").val(data1.duration).trigger("chosen:updated");
            $('#edit_membershipcard-modal').modal('show');
           
            }
          }

      });
    }


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
            url: "membership/search?page=" + page + "&query=" + query,
            success: function(data) {
            // console.log()
                $('#mtable tbody').html(data);
            }
        })
    }

  </script>

@endsection
