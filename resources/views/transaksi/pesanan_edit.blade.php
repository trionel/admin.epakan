@extends('layouts.master')
@section('title')
    Status Pembayaran
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-6"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-success">
                    <b>Ubah Status Pembayaran</b>
                    <a href="{{ url('/pesanan') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                </div>
                <div class="card-body">
                    @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 
                    <form method="post" action="{{ url('/pesanan/pesanan_update/'.$pesanan->id_pesanan) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pesanan</label>
                            <input type="input" name="id_pesanan" class="form-control" value="{{ $pesanan->id_pesanan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input type="input" name="id_pengguna" class="form-control" value="{{ "Rp.".number_format($pesanan->total_bayar).",-" }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Status</option>
                                <option <?php if($pesanan->belum == "belum"){ echo "selected='selected'"; } ?> value="belum">Belum Lunas</option>
                                <option <?php if($pesanan->belum == "lunas"){ echo "selected='selected'"; } ?> value="lunas">Lunas</option>
                            </select>
                            {{-- @if($errors->has('pesanan')) 
                                <span class="text-danger"> 
                                    <strong>{{ $errors->first('pesanan') }}</strong> 
                                </span> 
                            @endif  --}}
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- @section('script')
    <script type="text/javascript">
      $(document).on("click", ".konfirmasi", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Pesanan sudah dikonfirmasi.',
            showConfirmButton: false,
            timer: 1500
          })
      });
    </script>
@endsection --}}