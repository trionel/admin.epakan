@extends('layouts.master')
@section('title')
    Edit Data Kategori
@endsection
@section('content')
<!--Basic Elements-->
<div class="main-content container-fluid">
    <div class="col-xl-6">
        <div class="card">
          <div class="card-header text-white bg-primary">
            <div class="card-title">
                <b>Tambah Kategori</b>
            </div>
          </div>
        <div class="card-body">
            <form action="{{ url('/kategori/update/'.$kategori->id) }}" method="post" class="form-horizontal group-border-dashed">
                {{ csrf_field() }} 
                {{ method_field ('PUT')}}
            <div class="form-group">
              <label>Nama Kategori</label>
              <div>
                <input type="text" name="kategori" value="{{ $kategori->kategori }}" required="" class="form-control">

                @if($errors->has('kategori')) 
                    <span class="text-danger"> 
                        <strong>{{ $errors->first('kategori') }}</strong> 
                    </span> 
                @endif 
              </div>
            </div>
                <button type="submit" class="btn btn-space btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
{{-- @section('script')
    <script type="text/javascript">
      $(document).on("click", ".save", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
      });
    </script>
@endsection --}}