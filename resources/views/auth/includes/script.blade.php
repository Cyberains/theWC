<script src="{{ URL::asset('public/assets/js/admin/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('public/assets/js/admin/popper.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/admin/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/main1.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/bootstrap-datepicker.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/js/admin/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/datetime-picker/js/admin/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/datetime-picker/js/admin/bootstrap-datetimepicker.min.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){

        setTimeout(function(){
         	$("div.alert").remove();
     	}, 5000 );

     	$('#table-id').DataTable({

	    	"pageLength": 50
	    });

	    $('.table-data').DataTable({

	    	"pageLength": 50
	    });

       });
</script>









