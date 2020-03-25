@extends('layouts.master')
@section('title')
    Email
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-9">
        <div class="card">
          <div class="card-header text-white bg-primary">
            <b>Kirim Email ke Pengguna</b>
        </div>
        <div class="card-body">
            @if($notif = Session::has('sukses'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
            {{ Session::get('sukses') }}
          </div>
          @endif
            <form action="{{url ('/kirim_email') }}" method="post" class="form-horizontal group-border-dashed">
                {{ csrf_field() }} 
                <div class="form-group">
                    <label for="simpleinput">Email</label>
                    <input type="text" name="email" required="" placeholder="Enter email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="simpleinput">Nama Penerima</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="simpleinput">Judul</label>
                    <textarea type="text" class="form-control" name="judul" placeholder="Masukkan judul subjek"></textarea>
                </div>
                <div class="form-group">
                    <label for="simpleinput">Pesan</label>
                    <textarea type="text" class="form-control" name="pesan" placeholder="Masukkan pesanmu disini..."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection