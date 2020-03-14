@extends('layouts.master')
@section('title')
    Penyebaran Mitra
@endsection
@section('content')
    <div id="googleMap" style="width:100%;height:380px;"></div>
    {{-- <form action="" method="post">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
      </form> --}}
@endsection

<script src="http://maps.googleapis.com/maps/api/js"></script>

<script type="text/javascript">

function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-5.3592165234023215,105.26252601295711),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(-5.3592165234023215,105.26252601295711),
      map: peta
  });
  
    // fungsi initialize untuk mempersiapkan peta
//     var marker;

//     function taruhMarker(peta, posisiTitik){
    
//     if( marker ){
//       // pindahkan marker
//       marker.setPosition(posisiTitik);
//     } else {
//       // buat marker baru
//       marker = new google.maps.Marker({
//         position: posisiTitik,
//         map: peta
//       });
//     }
  
//      // isi nilai koordinat ke form
//     document.getElementById("lat").value = posisiTitik.lat();
//     document.getElementById("lng").value = posisiTitik.lng();
// }

//     function initialize() {
//     var propertiPeta = {
//         center:new google.maps.LatLng(-5.3592165234023215,105.26252601295711),
//         zoom:15,
//         mapTypeId:google.maps.MapTypeId.ROADMAP
//     };
    
//     var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

//     // even listner ketika peta diklik
//     google.maps.event.addListener(peta, 'click', function(event) 
//     {
//         taruhMarker(this, event.latLng);
//     });
}
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6a6dy99jZcyrlIe7OghOsZ0khO1x4O8&libraries=places" async defer> </script>