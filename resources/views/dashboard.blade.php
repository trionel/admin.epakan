@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-xl-3">
                <div class="card bg-success border-info">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Hari Ini</span>
                            <h5 class="card-title mb-0 text-white">Pemasukan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pemasukan_hari_ini) . " ,-" }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-success border-success">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Bulan Ini</span>
                            <h5 class="card-title mb-0 text-white">Pemasukan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pemasukan_bulan_ini) . " ,-" }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-success border-success">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Tahun Ini</span>
                            <h5 class="card-title mb-0 text-white">Pemasukan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pemasukan_tahun_ini) . " ,-" }}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <span class="text-white-50">12.5% <i class="mdi mdi-arrow-up"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger border-warning">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Hari Ini</span>
                            <h5 class="card-title mb-0 text-white">Pengeluaran</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pengeluaran_hari_ini) . " ,-" }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success border-success">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Total Pemasukan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($seluruh_pemasukan) . " ,-" }}</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wallet fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger border-danger">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Total Pengeluaran</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($seluruh_pengeluaran) . " ,-" }}</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="{{url ('pesanan')}}">
                <div class="card bg-primary border-primary">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Pesanan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0 text-white">{{count($pesanann)}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cart-plus text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-warning border-warning">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Bulan Ini</span>
                            <h5 class="card-title mb-0 text-white">Pengeluaran</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pengeluaran_bulan_ini) . " ,-" }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-warning border-warning">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Tahun Ini</span>
                            <h5 class="card-title mb-0 text-white">Pengeluaran</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h4 class="card-title mb-0 text-white">{{ "Rp " . number_format($pengeluaran_tahun_ini) . " ,-" }}</h4>
                            </div>
                            <div class="col-4 text-right">
                                <span class="text-white-50">12.5% <i class="mdi mdi-arrow-up"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <div class="col-md-6 col-xl-3">
                <a href="{{url ('pelanggan')}}">
                <div class="card bg-dark border-dark">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Pengguna</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 text-white">{{count($pengguna)}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="{{url ('produk')}}">
                <div class="card bg-warning border-warning">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Produk</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 text-white">{{count($produk)}}</h2>
                            </div>
                            <div class="icon">
                                <i class="fas fa-box fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="{{url ('laporan')}}">
                <div class="card bg-info border-info">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Saldo</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                                <h5 class="d-flex align-items-center mb-0 text-white">{{ "Rp. ".number_format($saldo)." ,-"}}</h5>
                            </div>
                            <div class="icon">
                                <i class="fab fa-cc-visa fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaksi Chart</h4>
                        <p class="card-subtitle mb-4">Laporan Transaksi dalam bentuk chart</p>
                        <div id="coba" class="morris-chart"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengeluaran ePakan</h4>
                        {{-- <p class="card-subtitle mb-4">Kategori pengeluaran ePakan.</p> --}}
                        <div id="kategori" class="morris-chart"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Produk ePakan</h4>
                        {{-- <p class="card-subtitle mb-4">Kategori produk ePakan.</p> --}}
                        <div id="produk" class="morris-chart"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <h4 class="card-title">Pesanan Terbaru</h4>
                        <p class="card-subtitle mb-4">Periode pesanan 1 bulan terakhir</p>
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Pesanan</th>
                                        <th>Pengguna</th>
                                        <th>Total Bayar</th>
                                        <th>Status Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                  $no = 1;
              @endphp
              @foreach($pesanan as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->id_pesanan }}</td>
                <td>{{ $p->pengguna->nama }}</td>
                <td>{{ $p->total_bayar }}</td>
                <td>
                  @if ($p->status == "belum")
                  <span class="badge badge-soft-danger p-2">{{ $p->status }}</span>
                  @endif
                  @if ($p->status == "lunas")
                  <span class="badge badge-soft-success p-2">{{ $p->status }}</span>
                  @endif
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $pesanan->links() }} --}}
                        </div>

        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <h4 class="card-title">Produk Terlaris</h4>
                        <p class="card-subtitle mb-4">Periode transaksi 1 bulan terakhir</p>
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Total Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                  $no = 1;
              @endphp
              @foreach($produkk as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->kategori }}</td>
                <td>{{ $p->jumlah}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $pesanan->links() }} --}}
                        </div>

        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <h4 class="card-title">Pengguna Terbaru</h4>
                        <p class="card-subtitle mb-4">Periode pesanan 1 bulan terakhir</p>
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                <thead>
                                    <tr>
                                        <th width="100px">ID Pengguna</th>
                                        <th width="100px">Nama</th>
                                        <th>No. Telepon</th>
                                        <th>Daerah</th>
                                        <th>Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
              @foreach($penggunaa as $m)
              <tr>
                <td>{{ $m->id }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->no_telp }}</td>
                        <td>{{ $m->daerah }}</td>
                        <td>{{ $m->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $pesanan->links() }} --}}
                        </div>

        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <h4 class="card-title">Pelanggan Setia</h4>
                        <p class="card-subtitle mb-4">Pengguna dengan transaksi terbanyak minggu ini</p>
                        <div class="table-responsive">
                            <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                <thead>
                                    <tr>
                                        <th width="100px">#</th>
                                        <th width="100px">Nama</th>
                                        <th>Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                  $no = 1;
              @endphp
              @foreach($pengguna_setia as $m)
              <tr>
                <td>{{ $no++ }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->jumlah }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $pesanan->links() }} --}}
                        </div>

        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div><!-- end col -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
        
                        <h4 class="card-title">Mitra ePakan</h4>
                        <p class="card-subtitle mb-4">Penyebaran Lokasi Mitra ePakan</p>

                        <div id="googleMap" style="width:100%;height:380px;"></div>
        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
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
                    zoom: 14,
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
                            infoWindow.setContent('<b>Nama Mitra</b> :' + data.nama + '<br>');
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
@endsection


@section('chart')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        Highcharts.chart('coba', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Laporan Transaksi ePakan'
    },
    subtitle: {
        text: 'Pemasukan dan Pengeluaran'
    },
    xAxis: {
        categories: {!!$bulan!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rupiah (Rp.)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp. {point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Pemasukan',
        data: {!!$pemasukan!!}

    }, {
        name: 'Pengeluaran',
        data: {!!$pengeluaran!!}

    }]
});
    </script>
<script type="text/javascript">
    Highcharts.chart('kategori', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Pengeluaran ePakan berdasarkan kategori'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} Pengeluaran</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Kategori',
        colorByPoint: true,
        data: [{
            name: 'Penggajian',
            y: {{$kat[2]}}
        }, {
            name: 'Pembayaran',
            y: {{$kat[3]}}
        }, {
            name: 'Pembelian',
            y: {{$kat[4]}},
            sliced: true,
            selected: true
        }, {
            name: 'Lain-lain',
            y: {{$kat[5]}}
        }, {
            name: 'Pencairan',
            y: {{$kat[6]}}
        }]
    }]
});
</script>

<script type="text/javascript">
    Highcharts.chart('produk', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Produk ePakan berdasarkan kategori'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} produk</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Kategori',
        colorByPoint: true,
        data: [{
            name: 'Pakan Sapi',
            y: {{$prod[1]}},
            sliced: true,
            selected: true
        }, {
            name: 'Pakan Kuda',
            y: {{$prod[2]}}
        }, {
            name: 'Pakan Domba & Kambing',
            y: {{$prod[3]}}
        }, {
            name: 'Pakan Ayam',
            y: {{$prod[4]}}
        }, {
            name: 'Pakan Kerbau',
            y: {{$prod[5]}}
        }, {
            name: 'Suplemen',
            y: {{$prod[6]}}
        }, {
            name: 'Hijauan',
            y: {{$prod[7]}}
        }, {
            name: 'Bahan Mentah Pakan',
            y: {{$prod[8]}}
        }, {
            name: 'Produk Peternak Binaan',
            y: {{$prod[9]}}
        }]
    }]
});
</script>

@endsection
