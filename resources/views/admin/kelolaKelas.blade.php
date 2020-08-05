@extends('admin/master/masterAdmin')

@section('title', 'Kelas | ABSS')

@section('feature', 'Kelas')

@section('content')

    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('alert danger'))
                    <div class="form-group alert alert-danger">
                        <div>{{Session::get('alert danger')}}</div>
                    </div>
                @endif
                @if(Session::has('alert success'))
                    <div class="form-group alert alert-success">
                        <div>{{Session::get('alert success')}}</div>
                    </div>
                @endif
                <div class="card">

                    <div class="card-body table-responsive">
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahKelas"><i class="fa fa-plus-square"></i>
                            Tambah Kelas
                        </button>
                        <br>

                        <!-- Modal Tambah Kelas -->

                        <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Kelas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/kelas/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_kelas">Nama Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Ubah Kelas -->

                        <div class="modal fade" id="ubahKelas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Kelas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/kelas/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_kelas">ID Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_kelas" name="id_kelas" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_kelas">Nama Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus Kelas -->

                        <div class="modal fade" id="hapusKelas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Kelas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/dataSekolah/kelas/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_kelas">ID Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_kelas" name="id_kelas" class="form-control" readonly required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($kelas as $kls)
                              <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$kls->nama_kelas}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahKelas"
                                        data-toggle="modal"
                                        data-id_kelas ="{{$kls->id_kelas}}"
                                        data-nama_kelas="{{$kls->nama_kelas}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusKelas"
                                        data-toggle="modal"
                                        data-id_kelas ="{{$kls->id_kelas}}">
                                        <i class="fa fa-trash"></i>&nbsp;
                                            Hapus
                                    </button>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /page content -->
@endsection

@section('script')
    @include('admin/master/scriptTables')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahKelas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_kelas = button.data('id_kelas');
            var nama_kelas = button.data('nama_kelas');
            var modal = $(this);
            modal.find('.modal-body #id_kelas').val(id_kelas);
            modal.find('.modal-body #nama_kelas').val(nama_kelas);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusKelas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_kelas = button.data('id_kelas');
            var modal = $(this);
            modal.find('.modal-body #id_kelas').val(id_kelas);
            });
        });
    </script>
@endsection

