@extends('layouts.master')
@section('title')
    Edit Produk
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-warning">
                    <b>Edit Produk</b>
                    <a href="{{ url('/produk') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/produk/update/'.$produk->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <input type="input" name="id_pengguna" class="form-control" value="{{ $produk->id_pengguna }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="input" name="nama" class="form-control" value="{{ $produk->nama }}">
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="input" name="harga" class="form-control" value="{{ $produk->harga }}">
                        </div>

                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="input" name="satuan" class="form-control" value="{{ $produk->satuan }}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Status</option>
                                <option <?php if($produk->status == "pre sale"){ echo "selected='selected'"; } ?> value="pre sale">Pre Sale</option>
                                <option <?php if($produk->status == "siap antar"){ echo "selected='selected'"; } ?> value="siap antar">Siap Antar</option>
                            </select>

                            @if($errors->has('status'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value="">- Pilih Status</option>
                                <option <?php if($produk->kategori == "Pakan Sapi"){ echo "selected='selected'"; } ?> value="Pakan Sapi">Pakan Sapi</option>
                                <option <?php if($produk->kategori == "Pakan Kuda"){ echo "selected='selected'"; } ?> value="Pakan Kuda">Pakan Kuda</option>
                                <option <?php if($produk->kategori == "Pakan Domba & Kambing"){ echo "selected='selected'"; } ?> value="Pakan Domba & Kambing">Pakan Domba & Kambing</option>
                                <option <?php if($produk->kategori == "Pakan Ayam"){ echo "selected='selected'"; } ?> value="Pakan Ayam">Pakan Ayam</option>
                                <option <?php if($produk->kategori == "Pakan Kerbau"){ echo "selected='selected'"; } ?> value="Pakan Kerbau">Pakan Kerbau</option>
                                <option <?php if($produk->kategori == "Suplemen"){ echo "selected='selected'"; } ?> value="Suplemen">Suplemen</option>
                                <option <?php if($produk->kategori == "Hijauan"){ echo "selected='selected'"; } ?> value="Hijauan">Hijauan</option>
                                <option <?php if($produk->kategori == "Bahan Mentah Pakan"){ echo "selected='selected'"; } ?> value="Bahan Mentah Pakan">Bahan Mentah Pakan</option>
                                <option <?php if($produk->kategori == "Produk Peternak Binaan"){ echo "selected='selected'"; } ?> value="Produk Peternak Binaan">Produk Peternak Binaan</option>
                            </select>

                            @if($errors->has('kategori'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('kategori') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Minimum</label>
                            <input type="input" name="minimum" class="form-control" value="{{ $produk->minimum }}">
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="input" name="stok" class="form-control" value="{{ $produk->stok }}">
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection