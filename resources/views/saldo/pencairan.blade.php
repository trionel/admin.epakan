@extends('layouts.master')
@section('title')
    Pencairan Saldo
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
    <div class="col-xl-8">
        <div class="card">
          <div class="card-header">
            <b>Data Pencairan Saldo</b>
          <a href = "" class="float-right btn btn-sm btn-primary">Tambah</a>
          {{ csrf_field() }}
          <div>
        </div>
      </div>
      <div class="card-body">
        @if($notif = Session::has('hapus'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
            {{ Session::get('hapus') }}
          </div>
          @endif
        <div class="table-responsive">
            <table class="table mb-0">
          <thead>
            <tr>
              <th >No</th>
              <th>ID Pengguna</th>
              <th>Saldo</th>
              <th>Status</th>
              <th width="25%" class="text-center">OPSI</th> 
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1; 
            @endphp
                @foreach($pencairan as $p)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->id_pengguna }}</td>
                <td>{{ $p->saldo }}</td>
                <td>{{ $p->status }}</td>
                <td class="text-center"> 
                    <a href="{{ url('/pencairan/cairkan/'.$p->id) }}" class="btn btn-sm btn-primary">Cairkan</a> 
                    <a href="{{ url('/pencairan/hapus_cair/'.$p->id) }}" class="btn btn-sm btn-danger hapca">Hapus</a> 
                </td> 
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $pencairan->links() }} 
      </div>
    </div>
        </div>
@endsection
@section('script')
      <script type="text/javascript">
        $(document).on("click", ".hapca", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data pencairan akan terhapus!",
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