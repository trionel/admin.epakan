@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-xl-3">
                <div class="card bg-success border-success">
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
            <div class="col-md-6 col-xl-3">
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
            </div>
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
                <div class="card bg-info border-info">
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
                <div class="card bg-primary border-primary">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Pesanan</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            <div class="col-8">
                            <h4 class="mb-0 text-white">{{count($pesanan)}}</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clipboard-list text-white fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-warning border-warning">
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
            </div>
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
                <div class="card bg-dark border-dark">
                    <div class="card-body">
                        <div class="mb-4">
                            <span class="badge badge-soft-light float-right">Keseluruhan</span>
                            <h5 class="card-title mb-0 text-white">Pengguna</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-0">
                            
                            <div class="col-8">
                                <h1 class="card-title mb-0 text-white">{{count($pengguna)}}</h1>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
        
                        <h4 class="card-title">Pie Chart</h4>
                        <p class="card-subtitle mb-4">Kategori pengeluaran ePakan.</p>

                        <div id="kategori" class="morris-chart"></div>
        
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
}
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt6a6dy99jZcyrlIe7OghOsZ0khO1x4O8&libraries=places" async defer> </script>

@section('chart')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('coba', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Transaksi ePakan'
    },
    subtitle: {
        text: 'Pemasukan dan Pengeluaran'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
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
        data: [{{$tm1}},{{$tm2}},{{$tm3}},{{$tm4}},{{$tm5}},{{$tm6}},{{$tm7}},{{$tm8}},{{$tm9}},{{$tm10}},{{$tm11}},{{$tm12}}]

    }, {
        name: 'Pengeluaran',
        data: [{{$tk1}},{{$tk2}},{{$tk3}},{{$tk4}},{{$tk5}},{{$tk6}},{{$tk7}},{{$tk8}},{{$tk9}},{{$tk10}},{{$tk11}},{{$tk12}}]

    }]
});
    </script>

<script>
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
        }]
    }]
});
</script>
@endsection
