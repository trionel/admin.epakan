@extends('layouts.master')
@section('title')
    Mitra ePakan
@endsection
@section('content')
<div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header text-white bg-secondary">
                <b>Detail Mitra ePakan</b>
                <a href="{{ url('/mitra') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                  {{ csrf_field() }}
              </div>
              <br> 
              <div class="card-body">
                <table id="data" class="table table-condensed table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="100px">Nama</th>
                      <th>Foto KTP</th>
                      <th>Foto Peternakan</th>
                      <th>Foto CPPB</th>
                      <th>Foto Sertifikat</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                    @foreach($mitra as $m)
                    <tr>
                        <td>{{ $m->nama }}</td>
                        <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_ktp }}" alt="" width="90" height="90">
                        </td>
                        <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_peternakan }}" alt="" width="90" height="90">
                        </td>
                        <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_cppb }}" alt="" width="90" height="90">
                        </td>
                        <td>
                            <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_sertifikat }}" alt="" width="90" height="90">
                        </td>
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