<!DOCTYPE html>
<html>
<style type="text/css">
	
</style>
<body>
<div class="section" style="width: 800px;
    margin: 0 auto; display: block;">
  <h1>Membership Card No</h1>
<?php 
$card = $take; 

?>
<div style="width: 300px;float: left;"> 
  @foreach($card as $value)
   <div>{{ $loop->iteration }}) {{$value['cart_number']}}</div>
@endforeach
</div>
 
<br>
</div>
</body>
</html>




