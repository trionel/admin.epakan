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
                <b>Detail Produk ePakan</b>
                <a href="{{ url('/produk') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                  {{ csrf_field() }}
              </div>
              <div class="card-body">
                <table id="data" class="table table-bordered mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th width="100px">Nama</th>
                      <th>Foto 1</th>
                      <th>Foto 2</th>
                      <th>Foto 3</th>
                      <th>Deskripsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($produk as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td><img src="http://marketplace.epakan.id/uploads/file/{{ $p->foto }}" alt=""></td>
                        <td><img src="http://marketplace.epakan.id/uploads/file/{{ $p->foto2 }}" alt=""></td>
                        <td><img src="http://marketplace.epakan.id/uploads/file/{{ $p->foto3 }}" alt=""></td>
                        <td>{{ $p->deskripsi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection