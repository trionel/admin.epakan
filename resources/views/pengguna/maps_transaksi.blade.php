@extends('layouts.master')
@section('title')
    Penyebaran Transaksi
@endsection
@section('content')
    <div id="map" style="width:100%;height:380px;"></div>
    {{-- <form action="" method="post">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
      </form> --}}
@endsection

{{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
<script type="text/javascript">
    // membuat objek untuk titik koordinat
    var sekret = {lat: -5.3709495170839405, lng: 105.24530187249182};
    var gunungsugih = {lat: -5.001684, lng: 105.201588};
    var infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat: -5.3709495170839405, lng: 105.24530187249182},
          mapTypeId: 'roadmap'
        });

        // Define the LatLng coordinates for the polygon.
        var triangleCoords = [
            {lat:-5.34242 , lng:105.20912 },
            {lat:-5.31949 , lng:105.23553 },
            {lat:-5.32139 , lng:105.2449 },
            {lat:-5.34053 , lng:105.25314 },
            {lat:-5.34053 , lng:105.26989 },
            {lat:-5.32891 , lng:105.29297 },
            {lat:-5.33233 , lng:105.30121 },
            {lat:-5.34889 , lng:105.29589 },
            {lat:-5.36925 , lng:105.31288 },
            {lat:-5.39652 , lng:105.32471 },
            {lat:-5.42598 , lng:105.35339 },
            {lat:-5.45196 , lng:105.35339 },
            {lat:-5.47495 , lng:105.34253 },
            {lat:-5.49844 , lng:105.36095 },
            {lat:-5.51621 , lng:105.34859 },
            {lat:-5.50596 , lng:105.32387 },
            {lat:-5.47988 , lng:105.31639 },
            {lat: -5.4549 , lng:105.30354},            
            {lat:-5.44907 , lng:105.27969 },
            {lat:-5.46119 , lng:105.26056 },
            {lat:-5.47877 , lng:105.25379 },
            {lat:-5.50021 , lng:105.25796 },
            {lat:-5.51892 , lng:105.26625 },
            {lat:-5.52327 , lng:105.23883 },
            {lat:-5.52078 , lng:105.21141 },
            {lat:-5.49886 , lng:105.20802 },
            {lat:-5.47967 , lng:105.2005, },            
            {lat: -5.4656 , lng:105.18784},            
            {lat:-5.46384 , lng:105.17105 },
            {lat:-5.44621 , lng:105.15897 },
            {lat:-5.43337 , lng:105.14071 },
            {lat:-5.39401 , lng:105.16186 },
            {lat:-5.38912 , lng:105.18356 },
            {lat:-5.36372 , lng:105.19428 },
        ];

        var lamtengkoor = [
            {lat: -4.91472, lng: 104.92975},
            {lat: -4.88573, lng: 105.0705},
            {lat: -4.6038,  lng: 105.25177},
            {lat: -4.5025,  lng: 105.37811},
            {lat: -4.47512, lng: 105.50171},
            {lat: -4.51345, lng: 105.57587},
            {lat: -4.47238, lng: 105.69122},
            {lat: -4.51893, lng: 105.70908},
            {lat: -4.53809, lng: 105.78186},
            {lat: -4.69414, lng: 105.81482},
            {lat: -4.79268, lng: 105.79559},
            {lat: -4.7734,  lng: 105.69419},
            {lat: -4.81029, lng: 105.64075},
            {lat: -4.90739, lng: 105.57631},
            {lat: -4.91067, lng: 105.4875},
            {lat: -4.89862, lng: 105.41563},
            {lat: -4.95226, lng: 105.40419},
            {lat: -4.96142, lng: 105.3488},
            {lat: -4.99795, lng: 105.32636},
            {lat: -5.02175, lng: 105.35841},
            {lat: -5.0759,  lng: 105.28881},
            {lat: -5.17324, lng: 105.25949},
            {lat: -5.14258, lng: 105.18852},
            {lat: -5.15569, lng: 105.0846},
            {lat: -5.20436, lng: 105.06856},
            {lat: -5.26397, lng: 104.92619},
            {lat: -5.13564, lng: 104.76503},
            {lat: -5.13088, lng: 104.72188},
            {lat: -5.16442, lng: 104.68972},
            {lat: -5.1549,  lng: 104.6254},
            {lat: -5.08936, lng: 104.52147},
            {lat: -5.05522, lng: 104.57251},
            {lat: -5.08127, lng: 104.6565},
            {lat: -5.04582, lng: 104.74209},
            {lat: -4.98027, lng: 104.87986},
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        // Construct the polygon.
        var lamteng = new google.maps.Polygon({
          paths: lamtengkoor,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
        lamteng.setMap(map);

        // Add a listener for the click event.
        bermudaTriangle.addListener('click', showArrays);
        lamteng.addListener('click', showArrays);

        // mebuat konten untuk info window
        var contentString = '<h5>Bandar Lampung<hr>Total : 17 Transaksi</h5>';
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          position: sekret
        });

        // mebuat konten untuk info window
        // var contentString = '<h5>Lampung Tengah<hr>Total : 29 Transaksi</h5>';
        // var infowindow = new google.maps.InfoWindow({
        //   content: contentString,
        //   position: gunungsugih
        // });

        // membuat marker
        var marker = new google.maps.Marker({
          position: sekret,
          map: map,
          title: 'Himalow'
        });
        // event saat marker diklik
        marker.addListener('click', function() {
          // tampilkan info window di atas marker
          infowindow.open(map, marker);
        });
      }

      /** @this {google.maps.Polygon} */
      function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>Bermuda Triangle polygon</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';

        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
              xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6a6dy99jZcyrlIe7OghOsZ0khO1x4O8&callback=initMap" async defer> </script>