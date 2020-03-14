@extends('layouts.master')
@section('title')
    Laporan Keuangan
@endsection
@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card"> 
                <div class="card-header">
                    Filter Laporan Keuangan
                </div>
                <div class="card-body">

                    <form method="get" action="{{ url('/laporan/hasil') }}">

                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Dari Tanggal</label>
                                    <input type="date" name="dari" class="form-control">

                                    @if($errors->has('dari'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('dari') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="sampai" class="form-control">

                                    @if($errors->has('sampai'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('sampai') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option value="semua">- Semua Kategori</option>
                                        @foreach($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('kategori'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            {{-- <div class="form-group"> 
 
                            <label>Jenis</label> 
                            <select class="form-control" name="jenis"> 
                                <option value="">- Pilih Jenis</option> 
                                <option value="Pemasukan">Pemasukan</option> 
                                <option value="Pengeluaran">Pengeluaran</option> 
                            </select> 
 
                            @if($errors->has('jenis')) 
                            <span class="text-danger"> 
                                <strong>{{ $errors->first('jenis') }}</strong> 
                            </span> 
                            @endif 
                             
                        </div>  --}}

                        

                            {{-- <div class="col-md-2">

                                <input type="submit" class="btn btn-primary mt-4" value="Tampilkan">
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div> --}}

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card"> 
                <div class="card-header">
                    Filter Laporan Keuangan
                </div>
                <div class="card-body">

                    <form method="get" action="{{ url('/laporan/hasil') }}">

                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Dari Tanggal</label>
                                    <input type="date" name="dari" class="form-control">

                                    @if($errors->has('dari'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('dari') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="sampai" class="form-control">

                                    @if($errors->has('sampai'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('sampai') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            {{-- <div class="col-md-4">
                                <div class="form-group">

                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option value="semua">- Semua Kategori</option>
                                        @foreach($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('kategori'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div> --}}

                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>Kategori</label>
                                    <select class="show-tick form-control" multiple name="kategori[]" autocomplete="off" required>
                                        {{-- <option value="0">Semua</option> --}}
										<option value="01">Pesanan</option>
										<option value="02">Penggajian</option>
										<option value="03">Pembayaran</option>
										<option value="04">Pembelian</option>
										<option value="05">Lain-lain</option>
                                    </select>
                                </div>
                            </div>


                            {{-- <div class="form-group"> 
 
                            <label>Jenis</label> 
                            <select class="form-control" name="jenis"> 
                                <option value="semua">Semua Jenis</option> 
                                <option value="Pemasukan">Pemasukan</option> 
                                <option value="Pengeluaran">Pengeluaran</option> 
                            </select> 
 
                            @if($errors->has('jenis')) 
                            <span class="text-danger"> 
                                <strong>{{ $errors->first('jenis') }}</strong> 
                            </span> 
                            @endif 
                             
                        </div>  --}}

                        

                            <div class="col-md-2">

                                <input type="submit" class="btn btn-primary mt-4" value="Tampilkan">
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- @section('layouts.js')
<script>
    $(document).ready(function () {
      $('.selectpicker').selectpicker();
    });
  </script>
@endsection --}}
