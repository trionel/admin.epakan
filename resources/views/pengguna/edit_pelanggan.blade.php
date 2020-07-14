@extends('layouts.master')
@section('title')
    Edit Pengguna
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-secondary">
                    <b>Masukkan Saldo</b>
                    <a href="{{ url('/pelanggan') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pelanggan/edit_update/'.$pengguna->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="input" name="id_pengguna" class="form-control" value="{{ $pengguna->id }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="input" name="nama" class="form-control" value="{{ $pengguna->nama }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Saldo</label>
                            <input type="number" name="saldo" class="form-control" value="{{ $pengguna->saldo }}">
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection