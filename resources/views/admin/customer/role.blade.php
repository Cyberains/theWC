@extends('admin.includes.main')
@section('title')
    
    <title>Role | Customer Management</title>

@endsection

@section('style')
  
  <style type="text/css">
    


  </style>

@endsection

@section('body')

  <div class="container-fluid">
    <div class="fade-in">
      
      <div class="row ">
            <div class="col-xl-12 col-md-12">                            
                
                    <button class="btn btn-sm btn-primary float-right" id="add-role"><i class="fa fa-plus"></i>&nbspAdd Role</button>
                
            </div>                    
        </div> 


        <div class="row bg-white mx-0 py-3 mt-2">
          <div class="col-md-12">
              <table class="table table-responsive-sm table-bordered" id="table-id" >
                  <thead>
                    <tr class="table-primary">
                      <th>Sr.No.</th>
                      <th>Role Name</th>
                      <th>Module Name</th>
                      <th>Sub Module Name</th>
                      <th>View</th>
                      <th>Add</th>
                      <th>Edit</th>
                      <th>Delete</th>
                        @if(Auth::user()->role == 'admin')
                      <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($roledata as $role)

                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $role->name }}  </td>
                          <td>{{ $role->modules }}  </td>
                          <td>{{ $role->sub_modules }}  </td>
                          <td>@if($role->is_view==1) 

                                  <i style="color:green" class="fa fa-check"></i>
                              @else
                                  <i style="color: maroon" class="fa fa-times"></i>
                              @endif
                          </td>
                          <td>@if($role->is_add==1) 

                                  <i style="color:green" class="fa fa-check"></i>
                              @else
                                  <i style="color: maroon" class="fa fa-times"></i>
                              @endif
                          </td>
                          <td>@if($role->is_edit==1) 

                                  <i style="color:green" class="fa fa-check"></i>
                              @else
                                  <i style="color: maroon" class="fa fa-times"></i>
                              @endif
                          </td>
                          <td>@if($role->is_delete==1) 

                                  <i style="color:green" class="fa fa-check"></i>
                              @else
                                  <i style="color: maroon" class="fa fa-times"></i>
                              @endif
                          </td>
                      
                          @if(Auth::user()->role == 'admin')
                          <td>
                            
                              <a title="Edit" href="javascript:void(0)"  onclick="roleedit( {{ $role->id }} )"  id="role-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp
                                                       
                              <a href="javascript:void(0)" data-url="{{ route('admin.delete_role',['id'=>$role->id]) }}"  class="role-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
                           
                          </td>
                            @endif
                        </tr>

                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
  
      <!-- /.row-->
    </div>

  </div>

@endsection

@section('modal')  
      
  <div class="modal fade" id="add-role-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
      <div class="modal-content">
        <div class="modal-header py-3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">Add Role</h3>
              <form class="sform" id="role_form" action="{{ route('admin.add_role') }}" method="post">
                @csrf      
                <div class="row bg-white mx-0 py-3 mt-2" id="add_role_info">
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="role_name">Role Name:</label>
                            <input class="form-control" type="text" name="role_name" id="role_name" data-parsley-required data-parsley-required-message="Role Name is required." placeholder="Enter Role Name" autofocus>
                          
                        </div>
                      </div>
                      <div class="col-md-12">
                        <table class="table" id="multiple_select">
                          <thead class="table-primary">
                              <tr>
                                <td>Module</td>
                                <td>Sub Module</td>
                                <td>IS_VIEW</td>
                                <td>IS_ADD</td>
                                <td>IS_EDIT</td>
                                <td>IS_DELETE</td>
                                <td><button type="button" id="add" onclick ="addrole({{ $module }} )" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
                              </tr>
                          </thead>
                          <tbody>
                              
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-right">
                       

                      <button type="button" name="role_submit" id="role_submit" class="btn btn-primary" style="float: right;">Assign Role</button>

                      <button type="button" class="btn btn-danger" style="float: right;margin-right: 10px;" data-dismiss="modal">Close</button>

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

        $('.role-delete').click(function () {

            var url = $(this).data('url'); 
            swal({
                title: "Are you sure?",
                text: "You want to delete this Role.",
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

        $('#add-role').click(function(){

            $('#add-role-modal').modal('show');

        });

        $('#role_submit').click(function(){

            if ($('#multiple_select tbody').find('tr').length>0) {


              $('#role_form').submit();

            }
            else{

              toastr.options =
              {
                "closeButton" : true,
                "progressBar" : true
              }

              toastr.error('Take atleast One Role.');

            }

        });


    var count = 0;
    function addrole(modules){

          var html='';

          count++;

          html += '<tr><td><select class="form-control module" data-parsley-required data-parsley-required-message="Module Name is required." id= "module_id_'+count+'" name="module[]"><option value="">Select Module</option>';

              for(var key in modules){

                html += '<option value="'+ modules[key].name+'">'+ modules[key].name+'</option>';

              }

              html += '</select></td><td><select type="text" class="form-control" name="sub_module[]" data-parsley-required data-parsley-required-message="Sub Module is required." id="sub_module_id_'+count+'"><option>Select Sub Module</option></select></td><td><input type="checkbox" class="form-control" name="view[]" id="is_view_id_'+count+'"></td><td><input type="checkbox" class="form-control" name="add[]" id="is_add_id_'+count+'"></td><td><input type="checkbox" class="form-control" name="edit[]" id="is_edit_id_'+count+'"></td><td><input type="checkbox" class="form-control" name="delete[]" id="is_delete_id_'+count+'"></td><td><button type="button" class="btn btn-danger remove"><i class="fa fa-minus"></i></button></td></tr>';

            $('#multiple_select tbody').append(html);  

       }; 


    $(document).on('click','.remove',function(){

          $(this).closest('tr').remove();

    });


    $(document).on('change','.module',function(){

          var module_val = $(this).val();

          var module_id = $(this).attr('id');

          var target2 = module_id.split('module_id_');

          var htmlsec ='';

          $.ajax({

              url:"{{ route('admin.get_submodule') }}",
              method:"GET",
              async:false,
              data:{

                  module_name:module_val,

              },

              success:function(data){

                  if (data != '') {

                  var submoduledata=data.submodule;
                  $('#sub_module_id_'+target2[1]+' option').remove();

                   htmlsec='<option value="">Select Sub Module</option>';
                    for(var key in submoduledata){                      

                        htmlsec += '<option value="'+ submoduledata[key].sub_module+'">'+ submoduledata[key].sub_module +'</option>'; 

                    } 
                   

                  }

                
              }

          })

          $('#sub_module_id_'+target2[1]).append(htmlsec);

      });
  


  </script>

@endsection
