@extends('layouts.master')
@section('title')
    Saldo
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
    <div class="col-xl-8">
        <div class="card">
          <div class="card-header">
            <b>Data Saldo Masuk</b>
          <a href = "" class="float-right btn btn-sm btn-primary">Tambah</a>
          {{ csrf_field() }}
          <div>
        </div>
      </div>
      <div class="card-body">
        @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 

                    @if(Session::has('hapus')) 
                    <div class="alert alert-danger"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('hapus') }} 
                    </div> 
                    @endif 
        <div class="table-responsive">
            <table class="table mb-0">
          <thead>
            <tr>
              <th >No</th>
              <th>ID Pesanan</th>
              <th>ID Pengguna</th>
              <th>Saldo</th>
              <th width="25%" class="text-center">OPSI</th> 
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1; 
            @endphp
                @foreach($saldo as $s)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $s->id_pesanan }}</td>
                <td>{{ $s->id_pengguna }}</td>
                <td>{{ $s->saldo }}</td>
                <td class="text-center"> 
                    <a href="{{ url('/saldo/edit/'.$s->id) }}" class="btn btn-sm btn-primary">Edit</a> 
                    <a href="{{ url('/saldo/hapus/'.$s->id) }}" class="btn btn-sm btn-danger salpus">Hapus</a> 
                </td> 
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $saldo->links() }} 
      </div>
    </div>
        </div>
@endsection
@section('script')
      <script type="text/javascript">
        $(document).on("click", ".salpus", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data kategori akan terhapus!",
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