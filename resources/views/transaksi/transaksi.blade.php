@extends('layouts.master')
@section('title')
    Laporan Transaksi
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12"> 
            <div class="card"> 
                <div class="card-header text-white bg-primary">
                        <b>Data Transaksi</b>
                    <a href="{{ url('/transaksi/tambah') }}" class="float-right btn btn-sm btn-success">Input Transaksi</a>
                </div> 
 
                <div class="card-body"> 
 
                    @if(Session::has('sukses')) 
                    <div class="alert alert-success"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('sukses') }} 
                    </div> 
                    @endif 

                    @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 

                    @if(Session::has('hapus')) 
                    <div class="alert alert-danger"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('hapus') }} 
                    </div> 
                    @endif 
                    <div class="row"> 
                        <div class="col-md-3"> 
                                    <form action="{{ url('/transaksi/cari') }}" method="get" class="form-inline"> 
                   
                                            <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
                                            <input type="submit" class="btn btn-primary" value="Cari"> 
                                        </form> 
                                    </div> 
                             </div> 
                   <br>
                   <div class="table-responsive">
                    <table class="table table-condensed table-hover table-bordered table-striped"> 
                        <thead class="thead-light"> 
                            <tr> 
                                <th class="text-center" rowspan="2" width="11%">Tanggal</th> 
                                <th class="text-center" rowspan="2" width="5%">Jenis</th> 
                                <th class="text-center" rowspan="2">Keterangan</th> 
                                <th class="text-center" rowspan="2">Kategori</th> 
                                <th class="text-center" colspan="2">Transaksi</th> 
                                <th class="text-center" rowspan="2" width="13%">OPSI</th> 
                            </tr> 
                            <tr> 
                                <th class="text-center">Pemasukan</th> 
                                <th class="text-center">Pengeluaran</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
 
                            @foreach($transaksi as $t) 
                            <tr> 
                                <td class="text-center">{{ date('d-m-Y',strtotime($t->tanggal)) }}</td> 
                                <td class="text-center">{{ $t->jenis }}</td> 
                                <td class="text-center">{{ $t->keterangan }}</td> 
                                <td class="text-center">{{ $t->kategori->kategori }}</td> 
                                <td class="text-center"> 
                                    @if($t->jenis == "Pemasukan") 
                                    {{ "Rp.".number_format($t->nominal).",-" }} 
                                    @else 
                                    - 
                                    @endif 
                                </td> 
                                <td class="text-center"> 
                                    @if($t->jenis == "Pengeluaran") 
                                    {{ "Rp.".number_format($t->nominal).",-" }} 
                                    @else 
                                    - 
                                    @endif 
                                </td> 
                                <td class="text-center"> 
                                    <a href="{{ url('/transaksi/edit/'.$t->id) }}" class="btn btn-sm btn-warning">Edit</a> 
                                    {{-- <a href="{{ url('/transaksi/hapus/'.$t->id) }}" class="btn btn-sm btn-danger">Hapus</a>  --}}
                                <a href="{{ url('/transaksi/hapus/'.$t->id) }}" class="btn btn-sm btn-danger yu" transaksi-id="{{$t->id}}">Hapus</a> 
                                </td> 
                            </tr> 
                            @endforeach 
 
                        </tbody> 
                    </table> 
                    {{ $transaksi->links() }} 
                </div> 
            </div> 
            </div>
        </div> 
    </div> 
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).on("click", ".yu", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data transaksi akan terhapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
            if (result.value) {
              document.location.href = link;
              Swal.fire(
                'Terhapus!',
                'Data sudah terhapus.',
                'success'
              )
            }
          })
        });
    </script>
@endsection