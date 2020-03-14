@extends('layouts.master')
@section('title')
    Verifikasi Mitra
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header"> Ubah Status Pengguna
                    <a href="{{ url('/pelanggan') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pelanggan/verifikasi_update/'.$pengguna->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">

                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Status</option>
                                <option <?php if($pengguna->belum == 0){ echo "selected='selected'"; } ?> value="0">Pelanggan</option>
                                <option <?php if($pengguna->mitra == 1){ echo "selected='selected'"; } ?> value="1">Mitra</option>
                            </select>
                            
                        </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection