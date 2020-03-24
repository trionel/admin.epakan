@extends('layouts.master')
@section('title')
    Edit Saldo
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-secondary">
                    <b>Edit Saldo</b>
                    <a href="{{ url('/saldo') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/saldo/update/'.$saldo->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pesanan</label>
                            <input type="input" name="id_pesanan" class="form-control" value="{{ $saldo->id_pesanan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="input" name="id_pengguna" class="form-control" value="{{ $saldo->id_pengguna }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Saldo</label>
                            <input type="number" name="saldo" class="form-control" value="{{ $saldo->saldo }}">

                            @if($errors->has('saldo'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('saldo') }}</strong>
                            </span>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection