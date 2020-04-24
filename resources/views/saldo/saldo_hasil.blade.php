@extends('layouts.master')
@section('title')
    Saldo Masuk
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card"> 
                <div class="card-header text-white bg-success">
                <b>Filter Saldo Masuk</b>
                </div>
                <div class="card-body">

                    <?php 
                    $dari = $_GET['dari'];
                    $sampai = $_GET['sampai'];
                    ?>

                    <form method="get" action="{{ url('/saldo/hasil') }}">

                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Dari Tanggal</label>
                                    <input type="date" name="dari" class="form-control" value="{{ $dari }}">

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
                                    <input type="date" name="sampai" class="form-control" value="{{ $sampai }}">

                                    @if($errors->has('sampai'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('sampai') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary mt-4" value="Tampilkan">
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        @if(Session::has('edit')) 
                                    <div class="alert alert-primary"> 
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        {{ Session::get('edit') }} 
                                    </div> 
                                    @endif 
                
                                    @if(Session::has('hapus')) 
                                    <div class="alert alert-danger"> 
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                        {{ Session::get('hapus') }} 
                                    </div> 
                                    @endif 
                        <div class="table-responsive">
                            <table class="table mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th >No</th>
                              <th >Tanggal</th>
                              <th>ID Pesanan</th>
                              <th>Mitra</th>
                              <th>Saldo</th>
                              <th width="25%" class="text-center">OPSI</th> 
                            </tr>
                          </thead>
                          <tbody>
                            @php 
                            $no = 1; 
                            @endphp
                                @foreach($saldo as $s)
                                <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->created_at }}</td>
                                <td>{{ $s->id_pesanan }}</td>
                                <td>{{ $s->pengguna->nama }}</td>
                                <td>{{ "Rp.".number_format($s->saldo).",-" }} </td>
                                <td class="text-center"> 
                                    <a href="{{ url('/saldo/edit/'.$s->id) }}" class="btn btn-sm btn-secondary">Edit</a> 
                                    <a href="{{ url('/saldo/hapus/'.$s->id) }}" class="btn btn-sm btn-danger salpus">Hapus</a> 
                                </td> 
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{-- @if ($saldo->count()>5)
                        {{ $saldo->links() }}     
                        @endif --}}
                        {{-- @if ($saldo->count()>5)
                        {{ $saldo->links() }}
                        @else
                        {{ $saldo->links() }}
                        @endif --}}
                      </div>
                    </div>
                        </div>
                @endsection
                @section('script')
                      <script type="text/javascript">
                        $(document).on("click", ".salpus", function (e) {
                          var link = $(this).attr("href"); // "get" the intended link in a var
                          e.preventDefault();
                          Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data saldo akan terhapus!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus!'
                          }).then((result) => {
                            if (result.value) {
                              document.location.href = link;
                              Swal.fire(
                                'Terhapus!',
                                'Data sudah terhapus.',
                                'success'
                              )
                            }
                          })
                        });
                      </script>
                      @endsection