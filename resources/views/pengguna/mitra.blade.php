@extends('layouts.master')
@section('title')
    Mitra ePakan
@endsection
@section('content')
<div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">Tabel Mitra ePakan
                  {{ csrf_field() }}
              </div>
              <br>
              <div class="col-md-3"> 
                <form action="{{ url('/mitra/cari') }}" method="get" class="form-inline"> 
                  <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
                  <input type="submit" class="btn btn-primary" value="Cari"> 
                </form> 
              </div> 
              <div class="card-body">
                <table id="data" class="table table-condensed table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="100px">ID Mitra</th>
                      <th width="100px">Nama</th>
                      <th>NIK</th>
                      <th>Foto KTP</th>
                      <th>Tipe</th>
                      <th>Foto Peternakan</th>
                      <th>Foto CPPB</th>
                      {{-- <th>Foto Sertifikat</th> --}}
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                    @foreach($mitra as $m)
                    <tr>
                        <td>{{ $m->id_pengguna }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->nik }}</td>
                        <td>{{ $m->foto_ktp }}</td>
                        <td>{{ $m->tipe }}</td>
                        <td>{{ $m->foto_peternakan }}</td>
                        <td>{{ $m->foto_cppb }}</td>
                        {{-- <td>{{ $m->foto_sertifikat }}</td> --}}
                        <td><a href="{{url ('mitra/lihat', $m->id) }}" class="btn btn-sm btn-primary">Lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $mitra->links() }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection