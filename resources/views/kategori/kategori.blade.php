@extends('layouts.master')
@section('title')
    Master Kategori
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
    <div class="col-xl-8">
        <div class="card">
          <div class="card-header">
            <b>Data Kategori</b>
          <a href = "{{ url ('/kategori/tambah') }}" class="float-right btn btn-sm btn-primary">Tambah</a>
          {{ csrf_field() }}
          <div>
        </div>
      </div>
      <div class="card-body">
        @if($notif = Session::has('sukses')) 
        <div class="alert alert-success"> 
            <button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $notif }}</strong>
                  {{ Session::get('sukses') }} 
        </div> 
        @endif

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
            <table class="table mb-0">
          <thead>
            <tr>
              <th >No</th>
              <th>Nama Kategori</th>
              <th width="25%" class="text-center">OPSI</th> 
            </tr>
          </thead>
          <tbody>
            @php 
            $no = 1; 
            @endphp
                @foreach($kategori as $k)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $k->kategori }}</td>
                <td class="text-center"> 
                    <a href="{{ url('/kategori/edit/'.$k->id) }}" class="btn btn-sm btn-primary">Edit</a> 
                    {{-- <a href="{{ url('/kategori/hapus/'.$k->id) }}" class="btn btn-sm btn-danger">Hapus</a>  --}}
                <a href="" class="btn btn-sm btn-danger ye" kategori-id="{{$k->id}}">Hapus</a> 
                </td> 
                </tr>
            @endforeach
          </tbody>
        </table>
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