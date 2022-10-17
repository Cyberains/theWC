@extends('admin.includes.main')
@section('title')
<title>Track Location</title>
@endsection

@section('btitle')
<li class="breadcrumb-item">Employees Management</li>
@endsection

@section('btitle1')

<li class="breadcrumb-item">Employees</li>

@endsection

@section('style')

    <style type="text/css">
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
    @endsection
    @section('script')
  <script type="text/javascript">
    function initMap() {
   
  let uluru = { lat: {{$users->getDefaultAddress['latitude']}}, lng: {{$users->getDefaultAddress['longitude']}} };
   
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: uluru,
    title:'text',
      draggable:true
  });
 


 
addMarker({ lat: {{$users->getDefaultAddress['latitude']}}, lng: {{$users->getDefaultAddress['longitude']}} },'{{$users['name']}}');
@foreach($matchingprofisionaldistance as $data)
addMarker({ lat: {{$data['latitude']}}, lng: {{$data['longitude']}} },"{{$data['title']}} Professional");
@endforeach
  function addMarker(coords,name){
 var marker = new google.maps.Marker({
    position: coords,
    map: map,
    title:name,
      draggable:true
  });
  }
}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotIb1Vhm9kEiDWaQn5IaIg1bpy6wJTRU&callback=initMap" async defer></script>
 
   
   @endsection
  @section('body')
  <div class="container-fluid">
   
  <div class="row bg-white mx-0 py-3 mt-2">
    <div class="col-md-12">
   
    <div id="map"></div>
 </div>
</div>
</div>
    
  @endsection