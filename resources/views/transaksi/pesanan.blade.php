@extends('layouts.master')
@section('title')
Pesanan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          
          <h4>Tabel Data Pesanan</h4> 

          {{ csrf_field() }}

        </div>
        <br>
        <div class="col-md-3"> 
          <form action="{{ url('/pesanan/cari') }}" method="get" class="form-inline"> 
            <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
            <input type="submit" class="btn btn-primary" value="Cari"> 
          </form> 
        </div> 
        <div class="card-body">
          @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 
          <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Pesanan</th>
                <th>ID Pengguna</th>
                <th>Ongkir</th>
                <th>Harga</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Pembayaran</th>
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
                <td>{{ $p->id_pengguna }}</td>
                <td>{{ $p->ongkir }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->total_bayar }}</td>
                <td>{{ $p->status }}</td>
                <td class="">
                  <a href="{{url ('pesanan/pesanan_edit', $p->id_pesanan) }}" class="btn btn-sm btn-primary">Konfirmasi</a>
                  <a href="{{url ('pesanan/detail_pesanan', $p->id_pesanan) }}" class="btn btn-sm btn-info">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $pesanan->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection