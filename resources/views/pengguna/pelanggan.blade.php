@extends('layouts.master')
@section('title')
    Pelanggan ePakan
@endsection
@section('content')
<div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">Tabel Pelanggan ePakan
                  {{ csrf_field() }}
              </div>
              <br>
              <div class="col-md-3"> 
                <form action="{{ url('/pelanggan/cari') }}" method="get" class="form-inline"> 
                    <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
                    <input type="submit" class="btn btn-primary" value="Cari"> 
                  </form> 
                </div> 
              <div class="card-body">
                <table id="data" class="table table-condensed table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="100px">ID Pengguna</th>
                      <th width="100px">Nama</th>
                      <th>No. Telepon</th>
                      <th>Saldo</th>
                      <th>Daerah</th>
                      <th>Alamat</th>
                      <th>Kode Verifikasi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                    @foreach($pengguna as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->no_telp }}</td>
                        <td>{{ $m->saldo }}</td>
                        <td>{{ $m->daerah }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->kode_verifikasi }}</td>
                        <td>{{ $m->status }}</td>
                        <td><a href="{{url ('pelanggan/verifikasi', $m->id) }}" class="btn btn-sm btn-primary">Verifikasi</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pengguna->links() }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection