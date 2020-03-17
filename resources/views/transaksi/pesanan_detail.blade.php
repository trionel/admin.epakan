@extends('layouts.master')
@section('title')
Detail Pesanan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          
          <h4>Tabel Detail Data Pesanan</h4> 

          {{ csrf_field() }}

        </div>
        <br>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Detail</th>
                <th>ID Pesanan</th>
                <th>ID Penjual</th>
                <th>ID Pembeli</th>
                <th>ID Produk</th>
                <th>Harga</th>
                <th>Ongkir</th>
                <th>Total Keuntungan</th>
                <th>Jumlah</th>
                <th>Alamat Antar</th>
                <th>Status</th>
                <th>Ambil</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach($detail_pesanan as $d)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d->id_detail }}</td>
                <td>{{ $d->id_pesanan }}</td>
                <td>{{ $d->id_penjual }}</td>
                <td>{{ $d->id_pembeli }}</td>
                <td>{{ $d->id_produk }}</td>
                <td>{{ $d->harga }}</td>
                <td>{{ $d->ongkir }}</td>
                <td>{{ $d->total_keuntungan }}</td>
                <td>{{ $d->jumlah }}</td>
                <td>{{ $d->alamat_antar }}</td>
                <td>{{ $d->status }}</td>
                <td>{{ $d->ambil }}</td>
                <td class="">
                  <a href="{{url ('pesanan/detail_edit', $d->id_detail) }}" class="btn btn-sm btn-primary">Ubah Status</a>
                  {{-- <a href="{{url ('pesanan/pesanan_detail', $d->id_detail) }}" class="btn btn-sm btn-info">Detail</a> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $detail_pesanan->links() }} --}}
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection