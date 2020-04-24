@extends('layouts.master')
@section('title')
    Status Pencairan
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-success">
                    <b>Ubah Status Pencairan</b>
                    <a href="{{ url('/pencairan') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pencairan/cairkan_proses/'.$pencairan->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="input" name="id_pengguna" class="form-control" value="{{ $pencairan->id_pengguna }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Saldo</label>
                            <input type="nominal" name="saldo" class="form-control" value="{{ $pencairan->saldo }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Status</option>
                                <option <?php if($pencairan->status == "belum cair"){ echo "selected='selected'"; } ?> value="belum cair">Belum Cair</option>
                                <option <?php if($pencairan->status == "sudah cair"){ echo "selected='selected'"; } ?> value="sudah cair">Sudah Cair</option>
                            </select>
                            
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection