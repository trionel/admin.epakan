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
                    <a href="" class="btn btn-sm btn-primary">Edit</a> 
                    {{-- <a href="{{ url('/kategori/hapus/'.$k->id) }}" class="btn btn-sm btn-danger">Hapus</a>  --}}
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
  $('.ye').click(function(){
      var kategori_id = $(this).attr('kategori-id');
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
      });
  </script>
@endsection