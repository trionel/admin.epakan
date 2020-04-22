@extends('layouts.master')
@section('title')
Detail Pesanan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header text-white bg-secondary">
          
          <b>Tabel Detail Data Pesanan</b>
          <a href="{{ url('/pesanan') }}" class="float-right btn btn-sm btn-warning">Kembali</a>

          {{ csrf_field() }}

        </div>
        <br>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead>
              <tr>
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
              </tr>
            </thead>
            <tbody>
              @foreach($detail_pesanan as $d)
              <tr>
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
                <td>
                  @if ($d->status == "belum bayar")
                  <span class="badge badge-soft-danger p-2">{{ $d->status }}</span>
                  @endif
                  @if ($d->status == "diproses")
                  <span class="badge badge-soft-warning p-2">{{ $d->status }}</span>
                  @endif
                  @if ($d->status == "dikirim")
                  <span class="badge badge-soft-info p-2">{{ $d->status }}</span>
                  @endif
                  @if ($d->status == "diterima")
                  <span class="badge badge-soft-success p-2">{{ $d->status }}</span>
                  @endif
                  </td>
                <td>{{ $d->ambil }}</td>
                {{-- <td class="">
                  <a href="{{url ('pesanan/detail_edit', $d->id_detail) }}" class="btn btn-sm btn-secondary">Ubah Status</a>
                  {{-- <a href="{{url ('pesanan/pesanan_detail', $d->id_detail) }}" class="btn btn-sm btn-info">Detail</a>
                </td> --}}
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