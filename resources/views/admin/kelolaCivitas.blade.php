@extends('admin/master/masterAdmin')

@section('feature', 'Civitas')

@section('title', 'Civitas | ABSS')

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
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahCivitas"><i class="fa fa-plus-square"></i>
                            Tambah Civitas
                        </button>
                        <br>

                        <!-- Modal Tambah Civitas -->

                        <div class="modal fade" id="tambahCivitas" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Civitas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/civitas/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama">Nama<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email">Email<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" placeholder="Masukkan Email Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email">No. HP<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hp" name="hp" placeholder="Masukkan Nomor HP Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="tipe">Status<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="tipe_civitas" name="tipe_civitas" required>
                                                        <option>--- Pilih Status ---</option>
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Tata Usaha">Tata Usaha</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Ubah Civitas-->

                        <div class="modal fade" id="ubahCivitas" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Civitas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/civitas/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}

                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_civitas">ID Civitas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_civitas" name="id_civitas" class="form-control" readonly required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama">Nama<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email">Email<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" placeholder="Masukkan Email Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="email">No. HP<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hp" name="hp" placeholder="Masukkan Nomor HP Civitas" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="tipe">Status<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="tipe_civitas" name="tipe_civitas" required>
                                                        <option>--- Pilih Status ---</option>
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Tata Usaha">Tata Usaha</option>
                                                    </select>
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

                        <!-- Modal Hapus Civitas -->

                        <div class="modal fade" id="hapusCivitas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Civitas</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/dataSekolah/civitas/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_civitas">ID Civitas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_civitas" name="id_civitas" class="form-control" readonly required>
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
                                <th>Email</th>
                                <th>HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($civitas as $key => $cvt)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$cvt->nama}}</td>
                                <td>{{$cvt->email}}</td>
                                <td>{{$cvt->hp}}</td>
                                <td>{{$cvt->tipe_civitas}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahCivitas"
                                        data-toggle="modal"
                                        data-id_civitas ="{{$cvt->id_civitas}}"
                                        data-nama="{{$cvt->nama}}"
                                        data-email="{{$cvt->email}}"
                                        data-hp="{{$cvt->hp}}"
                                        data-tipe_civitas="{{$cvt->tipe_civitas}}"
                                        >
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusCivitas"
                                        data-toggle="modal"
                                        data-id_civitas ="{{$cvt->id_civitas}}"
                                        >
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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        $('.js-example-basic-single').select2({
            theme: "classic",
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahCivitas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_civitas = button.data('id_civitas');
            var nama = button.data('nama');
            var email = button.data('email');
            var hp = button.data('hp');
            var tipe_civitas = button.data('tipe_civitas');
            var modal = $(this);
            modal.find('.modal-body #id_civitas').val(id_civitas);
            modal.find('.modal-body #nama').val(nama);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #hp').val(hp);
            modal.find('.modal-body #tipe_civitas').val(tipe_civitas);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusCivitas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_civitas = button.data('id_civitas');
            var modal = $(this);
            modal.find('.modal-body #id_civitas').val(id_civitas);
            });
        });
    </script>
@endsection

