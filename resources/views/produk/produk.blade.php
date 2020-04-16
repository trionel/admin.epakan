@extends('layouts.master')
@section('title')
    Produk ePakan
@endsection
@section('content')
<div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header text-white bg-primary">
                <b>Tabel Produk ePakan</b>
                  {{ csrf_field() }}
              </div>
              <br>
              <div class="col-md-3"> 
                <form action="{{ url('/produk/cari') }}" method="get" class="form-inline"> 
                    <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
                    <input type="submit" class="btn btn-primary" value="Cari"> 
                  </form> 
                </div> 
              <div class="card-body">
                @if($notif = Session::has('edit'))
                <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $notif }}</strong>
                  {{ Session::get('edit') }}
                </div>
                @endif
                
              @if($notif = Session::has('hapus'))
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $notif }}</strong>
                  {{ Session::get('hapus') }}
                </div>
                @endif
                <div class="table-responsive">
                <table id="data" class="table table-bordered mb-0">
                  <thead class="thead-light">
                    <tr>
                        <th>#</th>
                      <th width="100px">Pengguna</th>
                      <th width="100px">Nama Produk</th>
                      <th>Harga</th>
                      <th>Satuan</th>
                      <th>Status</th>
                      <th>Kategori</th>
                      <th>Minimum</th>
                      <th>Stok</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                    @php
                    $no = 1;
                    @endphp
                    @foreach($produk as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->pengguna->nama }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->satuan }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->kategori }}</td>
                        <td>{{ $p->minimum }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>
                          {{-- <a href="{{url ('produk/detail', $p->id) }}" class="btn btn-sm btn-secondary">Detail</a> --}}
                            <a href="{{url ('produk/edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{url ('produk/hapus', $p->id) }}" class="btn btn-sm btn-danger prod">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produk->links() }}
          </div>
        </div>
      </div>
    </div>
        </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).on("click", ".prod", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data produk akan terhapus!",
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