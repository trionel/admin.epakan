@extends('layouts.master')
@section('title')
    Tambah Kategori
@endsection
@section('content')
<div class="main-content container-fluid">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header text-white bg-primary">
            <b>Tambah Kategori</b>
            <a href="{{ url('/kategori') }}" class="float-right btn btn-sm btn-warning">Kembali</a> 
        </div>
        <div class="card-body">
            <form action="{{url ('/kategori/aksi') }}" method="post" class="form-horizontal group-border-dashed">
                {{ csrf_field() }} 
                <div class="form-group">
                    <label for="simpleinput">Nama Kategori</label>

                    <input type="text" name="kategori" required="" placeholder="Mis. Pembayaran" class="form-control">

                    @if($errors->has('kategori')) 
                            <span class="text-danger"> 
                                <strong>{{ $errors->first('kategori') }}</strong> 
                            </span> 
                            @endif
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
              
          </form>
        </div>
      </div>
    </div>
</div>
@endsection