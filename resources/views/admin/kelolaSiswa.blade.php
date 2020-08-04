@extends('admin/master/masterAdmin')

@section('feature', 'Siswa')

@section('title', 'Siswa | ABSS')

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

                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahSiswa"><i class="fa fa-plus-square"></i>
                            Tambah Siswa
                        </button>
                        <br>

                        <!-- Modal Tambah Siswa -->

                        <div class="modal fade" id="tambahSiswa" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Siswa</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/siswa/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_siswa">Nama Siswa<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_siswa" name="nama" placeholder="Masukkan Nama Siswa" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="kelas">Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="kelas" name="kelas" required>
                                                        <option>--- Pilih Kelas ---</option>
                                                        @foreach ($class as $kls)
                                                        <option value="{{$kls->id_kelas}}">{{$kls->nama_kelas}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="orang_tua">Orang Tua<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control js-example-basic-single" id="orang_tua" name="id_parents" style="width:100%" required>
                                                        <option>--- Pilih Orang Tua ---</option>
                                                        @foreach ($parent as $prt)
                                                        <option value="{{$prt->id_parents}}">{{$prt->nama}}</option>
                                                        @endforeach
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

                        <!-- Modal Ubah Siswa-->

                        <div class="modal fade" id="ubahSiswa" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Siswa</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/dataSekolah/siswa/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_student">ID Siswa<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_student" name="id_student" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="nama_siswa">Nama Siswa<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama_siswa" name="nama" placeholder="Masukkan Nama Siswa" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="kelas">Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="kelas" name="id_kelas" required>
                                                        <option>--- Pilih Kelas ---</option>
                                                        @foreach ($class as $kls)
                                                        <option value="{{$kls->id_kelas}}">{{$kls->nama_kelas}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="orang_tua">Orang Tua<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="orang_tua" name="id_parents" style="width:100%" required disabled>
                                                        <option>--- Pilih Orang Tua ---</option>
                                                        @foreach ($parent as $prt)
                                                        <option value="{{$prt->id_parents}}">{{$prt->nama}}</option>
                                                        @endforeach
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

                        <!-- Modal Hapus Siswa -->

                        <div class="modal fade" id="hapusSiswa" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Siswa</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/dataSekolah/siswa/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_student">ID Siswa<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_student" name="id_student" class="form-control" readonly required>
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
                                <th>Orang Tua</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($siswa as $key => $std)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$std->nama}}</td>
                                <td>{{$std->orang_tua->nama}}</td>
                                <td>{{$std->kelas_siswa->nama_kelas}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahSiswa"
                                        data-toggle="modal"
                                        data-id_student ="{{$std->id_student}}"
                                        data-nama_siswa="{{$std->nama}}"
                                        data-id_parent="{{$std->orang_tua->id_parents}}"
                                        data-id_kelas="{{$std->kelas_siswa->id_kelas}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusSiswa"
                                        data-toggle="modal"
                                        data-id_student ="{{$std->id_student}}">
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
            $('#ubahSiswa').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_student = button.data('id_student');
            var nama_siswa = button.data('nama_siswa');
            var id_kelas = button.data('id_kelas');
            var id_parent = button.data('id_parent');
            var modal = $(this);
            modal.find('.modal-body #id_student').val(id_student);
            modal.find('.modal-body #nama_siswa').val(nama_siswa);
            modal.find('.modal-body #kelas').val(id_kelas);
            modal.find('.modal-body #orang_tua').val(id_parent);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusSiswa').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_student = button.data('id_student');
            var modal = $(this);
            modal.find('.modal-body #id_student').val(id_student);
            });
        });
    </script>
@endsection

