@extends('admin/master/masterAdmin')

@section('title', 'Kelas | ABSS')

@section('content')

<div class="content">
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
                    <div class="card-header">
                        <strong class="card-title">Kelola Orang Tua</strong>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahOrangTua"><i class="fa fa-plus-square"></i>
                            Tambah Orang Tua
                        </button>
                        <br>

                        <!-- Modal Tambah Kelas -->

                        <div class="modal fade" id="tambahOrangTua" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Orang Tua</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataPihakLuar/orangtua/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_parent">Nama Orang Tua<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_parent" name="nama" placeholder="Masukkan Nama Orang Tua" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email_parent">Email<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email_parent" name="email" placeholder="Masukkan Email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="hp_parent">HP<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hp_parent" name="hp" placeholder="Masukkan Nama Handphone cth:081xxx" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="alamat_parent">Alamat<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="alamat_parent" name="alamat" placeholder="Masukkan Nama Orang Tua" class="form-control" required>
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

                        <div class="modal fade" id="ubahOrangTua" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Orang Tua</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataPihakLuar/orangtua/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_kelas">ID Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_parent" name="id_parent" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_parent">Nama Orang Tua<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_parent" name="nama" placeholder="Masukkan Nama Orang Tua" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email_parent">Email<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email_parent" name="email" placeholder="Masukkan Email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="hp_parent">HP<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hp_parent" name="hp" placeholder="Masukkan Nama Handphone cth:081xxx" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="alamat_parent">Alamat<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="alamat_parent" name="alamat" placeholder="Masukkan Nama Orang Tua" class="form-control" required>
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

                        <div class="modal fade" id="hapusOrangTua" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Orang Tua</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/dataPihakLuar/orangtua/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_parent">ID Orang Tua<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_parent" name="id_parent" class="form-control" readonly required>
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
                                <th>Nama</th>
                                <th>HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($parent as $key => $prt)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$prt->nama}}</td>
                                <td>{{$prt->hp}}</td>
                                <td>{{$prt->email}}</td>
                                <td>{{$prt->alamat}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahOrangTua"
                                        data-toggle="modal"
                                        data-id_parent ="{{$prt->id_parents}}"
                                        data-nama_parent="{{$prt->nama}}"
                                        data-email_parent="{{$prt->email}}"
                                        data-hp_parent="{{$prt->hp}}"
                                        data-alamat_parent="{{$prt->alamat}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusOrangTua"
                                        data-toggle="modal"
                                        data-id_parent ="{{$prt->id_parents}}">
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
</div>
  <!-- /page content -->
@endsection

@section('script')
  @include('admin/master/scriptTables')
  @push('table_script')

  @endpush
    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahOrangTua').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_parent = button.data('id_parent');
            var nama_parent = button.data('nama_parent');
            var email_parent = button.data('email_parent');
            var hp_parent = button.data('hp_parent');
            var alamat_parent = button.data('alamat_parent');

                console.log(nama_parent);
            var modal = $(this);
            modal.find('.modal-body #id_parent').val(id_parent);
            modal.find('.modal-body #nama_parent').val(nama_parent);
            modal.find('.modal-body #email_parent').val(email_parent);
            modal.find('.modal-body #hp_parent').val(hp_parent);
            modal.find('.modal-body #alamat_parent').val(alamat_parent);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusOrangTua').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_parent = button.data('id_parent');
                console.log(id_parent);
            var modal = $(this);
            modal.find('.modal-body #id_parent').val(id_parent);
            });
        });
    </script>
@endsection

