@extends('layouts.master')
@section('title')
    Pencairan Saldo
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card"> 
                <div class="card-header text-white bg-success">
                <b>Filter Pencairan Saldo</b>
                </div>
                <div class="card-body">

                    <?php 
                    $dari = $_GET['dari'];
                    $sampai = $_GET['sampai'];
                    ?>

                    <form method="get" action="{{ url('/pencairan/hasil') }}">

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
                        @if($notif = Session::has('edit'))
                          <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $notif }}</strong>
                            {{ Session::get('edit') }}
                          </div>
                          @endif
                          
                        @if($notif = Session::has('hapus'))
                          <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $notif }}</strong>
                            {{ Session::get('hapus') }}
                          </div>
                          @endif
                        <div class="table-responsive">
                            <table class="table mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th >No</th>
                              <th>Tanggal</th>
                              <th>Mitra</th>
                              <th>Saldo</th>
                              <th>Status</th>
                              <th width="25%" class="text-center">OPSI</th> 
                            </tr>
                          </thead>
                          <tbody>
                            @php 
                            $no = 1; 
                            @endphp
                                @foreach($pencairan as $p)
                                <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->pengguna->nama }}</td>
                                <td>{{ "Rp.".number_format($p->saldo).",-" }} </td>
                                <td>@if ($p->status == "belum cair")
                                  <span class="badge badge-soft-danger p-2">{{ $p->status }}</span>
                                  @endif
                                  @if ($p->status == "sudah cair")
                                  <span class="badge badge-soft-success p-2">{{ $p->status }}</span>
                                  @endif</td>
                                <td class="text-center"> 
                                    <a href="{{ url('/pencairan/cairkan/'.$p->id) }}" class="btn btn-sm btn-success">Cairkan</a> 
                                    <a href="{{ url('/pencairan/hapus_cair/'.$p->id) }}" class="btn btn-sm btn-danger hapca">Hapus</a> 
                                </td> 
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                        </div>
                @endsection
                @section('script')
                      <script type="text/javascript">
                        $(document).on("click", ".hapca", function (e) {
                          var link = $(this).attr("href"); // "get" the intended link in a var
                          e.preventDefault();
                          Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data pencairan akan terhapus!",
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