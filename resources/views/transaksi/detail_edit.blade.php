@extends('layouts.master')
@section('title')
    Status Pesanan
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header"> Ubah Status Pesanan
                    <a href="{{ url('/pesanan') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pesanan/detail_update/'.$detail_pesanan->id_detail) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>ID Pesanan</label>
                            <input type="input" name="id_pesanan" class="form-control" value="{{ $detail_pesanan->id_pesanan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Status</option>
                                <option <?php if($detail_pesanan->belum == "belum bayar"){ echo "selected='selected'"; } ?> value="belum bayar">Belum dibayar</option>
                                <option <?php if($detail_pesanan->belum == "diproses"){ echo "selected='selected'"; } ?> value="diproses">Diproses</option>
                                <option <?php if($detail_pesanan->belum == "dikirim"){ echo "selected='selected'"; } ?> value="dikirim">Dikirim</option>
                                <option <?php if($detail_pesanan->belum == "diterima"){ echo "selected='selected'"; } ?> value="diterima">Diterima</option>
                            </select>
                            {{-- @if($errors->has('pesanan')) 
                                <span class="text-danger"> 
                                    <strong>{{ $errors->first('pesanan') }}</strong> 
                                </span> 
                            @endif  --}}
                        </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">

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