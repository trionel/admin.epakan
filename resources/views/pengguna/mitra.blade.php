@extends('layouts.master')
@section('title')
    Mitra ePakan
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-9">
            <div class="card">
              <div class="card-header text-white bg-secondary">
                <b>Tabel Mitra ePakan</b>
                  {{ csrf_field() }}
              </div>
              <br>
              <div class="col-md-6"> 
                <form action="{{ url('/mitra/cari') }}" method="get" class="form-inline" enctype="multipart/form-data"> 
                  <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>" class="form-control" placeholder="Cari .."> 
                  <input type="submit" class="btn btn-primary" value="Cari"> 
                </form> 
              </div> 
              <div class="card-body">
                @if($notif = Session::has('hapus'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
            {{ Session::get('hapus') }}
          </div>
          @endif
                <table id="data" class="table table-condensed table-hover table-bordered table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th width="100px">ID Mitra</th>
                      <th width="100px">Nama</th>
                      <th>NIK</th>
                      <th>Tipe</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="data">
                    @php
                $no = 1;
                @endphp
                    @foreach($mitra as $m)
                    <tr>
                      <td>{{ $no++ }}</td>
                        <td>{{ $m->id_pengguna }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->nik }}</td>
                        <td>{{ $m->tipe }}</td>
                        {{-- <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_ktp }}" alt="">
                        </td>
                        <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_peternakan }}" alt=""></td>
                        <td>
                          <img src="http://marketplace.epakan.id/uploads/file/{{ $m->foto_cppb }}" alt=""></td>
                        <td>{{ $m->foto_sertifikat }}</td> --}}
                        <td class="text-center">
                          <a href="{{url ('mitra/detail_mitra', $m->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                          <a href="{{url ('mitra/hapus_mitra', $m->id) }}" class="btn btn-sm btn-danger hapmit">Hapus</a>
                        </td>
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
@section('script')
      <script type="text/javascript">
        $(document).on("click", ".hapmit", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data mitra akan terhapus!",
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