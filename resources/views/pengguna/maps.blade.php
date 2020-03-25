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

{{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
<script type="text/javascript">
var markers = [

@foreach( $pengguna as $a)

{
 "lat": '{{$a->lat_toko}}',
         "long": '{{$a->lng_toko}}',
         "nama": '{{$a->nama}}' },

@endforeach
    ];

    window.onload = function () {

                var mapOptions = {
                center: new google.maps.LatLng(-5.3709495170839405, 105.24530187249182),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var infoWindow = new google.maps.InfoWindow();
                var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

                for (i = 0; i < markers.length; i++) {
                    var data = markers[i];
            var latnya = data.lat;
            var longnya = data.long;

            var myLatlng = new google.maps.LatLng(latnya, longnya);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
    										icon: {
    											url: "{{asset('assets/images/marker.png')}}",
    											scaledSize: new google.maps.Size(50, 50)
    													},
                        title: data.nama
                    });
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent('<b>Nama Pelanggan</b> :' + data.nama + '<br>');
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
      google.maps.event.addListener(map, 'click', function( event ){
      alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
    });
            }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6a6dy99jZcyrlIe7OghOsZ0khO1x4O8&libraries=places" async defer> </script>