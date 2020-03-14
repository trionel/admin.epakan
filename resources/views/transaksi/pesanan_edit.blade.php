@extends('layouts.master')
@section('title')
    Status Pembayaran
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header"> Ubah Status Pembayaran
                    <a href="{{ url('/pesanan') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pesanan/pesanan_update/'.$pesanan->id_pesanan) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">

                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Staus</option>
                                <option <?php if($pesanan->belum == "belum"){ echo "selected='selected'"; } ?> value="belum">Belum Lunas</option>
                                <option <?php if($pesanan->belum == "lunas"){ echo "selected='selected'"; } ?> value="lunas">Lunas</option>
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