@extends('admin/master/masterAdmin')

@section('title', 'Jadwal Pelajaran | ABSS')

@section('feature', 'Jadwal Pelajaran')

@section('content')

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
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fa fa-plus-square"></i>
                            Tambah Jadwal Pelajaran
                        </button>
                        <br>

                        <!-- Modal Tambah Jadwal -->

                        <div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Jadwal Pelajaran</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwalPelajaran/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="hari">Hari<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="hari" name="hari" required>
                                                        <option>--- Pilih hari ---</option>
                                                        @foreach ($hari as $hr)
                                                        <option value="{{$hr->id_hari}}">{{$hr->nama_hari}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="kelas">Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="kelas" name="kelas" required>
                                                        <option>--- Pilih Kelas ---</option>
                                                        @foreach ($kelas as $kls)
                                                        <option value="{{$kls->id_kelas}}">{{$kls->nama_kelas}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="pelajaran">Pelajaran<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="pelajaran" name="pelajaran" required>
                                                        <option>--- Pilih Pelajaran ---</option>
                                                        @foreach ($pelajaran as $pljr)
                                                        <option value="{{$pljr->id_pelajaran}}">{{$pljr->pelajaran}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="perlengkapan">Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="perlengkapan" name="perlengkapan[]" multiple="multiple" style="width:100%" required>
                                                        <option value="">--- Pilih Perlengkapan ---</option>
                                                        @foreach ($perlengkapan as $prl)
                                                        <option value="{{$prl->id_perlengkapan}}">{{$prl->perlengkapan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="jam">Jam<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <div class='input-group date myDatepicker3' id='myDatepicker3'>
                                                        <input type='text' class="form-control" id="jam" name="jam" placeholder="Masukkan jam" required/>
                                                        <span class="input-group-addon">
                                                           <span class="fa fa-clock-o"></span>
                                                        </span>
                                                    </div>
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

                        <!-- Modal Ubah Jadwal -->

                        <div class="modal fade" id="ubahJadwal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Jadwal Pelajaran</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwalPelajaran/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jadwal_pelajaran">ID Jadwal<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jadwal_pelajaran" name="id_jadwal_pelajaran" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="hari">Hari<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="hari" name="hari" required>
                                                        <option>--- Pilih hari ---</option>
                                                        @foreach ($hari as $hr)
                                                        <option value="{{$hr->id_hari}}">{{$hr->nama_hari}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="kelas">Kelas<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="kelas" name="kelas" required>
                                                        <option>--- Pilih Kelas ---</option>
                                                        @foreach ($kelas as $kls)
                                                        <option value="{{$kls->id_kelas}}">{{$kls->nama_kelas}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="pelajaran">Pelajaran<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="pelajaran" name="pelajaran" required>
                                                        <option>--- Pilih Pelajaran ---</option>
                                                        @foreach ($pelajaran as $pljr)
                                                        <option value="{{$pljr->id_pelajaran}}">{{$pljr->pelajaran}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="perlengkapan">Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <div class="col-6" id="prl">

                                                    </div>
                                                    <select class="form-control" id="perlengkapan2" name="perlengkapan[]" multiple="multiple" placeholder="Ubah perlengkapan" style="width:100%" required>
                                                        <option>--- Pilih Perlengkapan ---</option>
                                                        @foreach ($perlengkapan as $prl)
                                                        <option value="{{$prl->id_perlengkapan}}">{{$prl->perlengkapan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="jam">Jam<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <div class='input-group date myDatepicker3' id='myDatepicker3'>
                                                        <input type='text' class="form-control" id="jam" name="jam" placeholder="Masukkan jam" required/>
                                                        <span class="input-group-addon">
                                                           <span class="fa fa-clock-o"></span>
                                                        </span>
                                                    </div>
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

                        <!-- Modal Hapus Jadwal -->

                        <div class="modal fade" id="hapusJadwal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Jadwal Pelajaran</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/jadwalPelajaran/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jadwal_pelajaran">ID Jadwal<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jadwal_pelajaran" name="id_jadwal_pelajaran" class="form-control" readonly required>
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
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Kelas</th>
                                <th>Pelajaran</th>
                                <th>Perlengkapan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($jadwal as $jdwl)
                              <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$jdwl->hari->nama_hari}}</td>
                                <td>{{$jdwl->jam}}</td>
                                <td>{{$jdwl->kelas->nama_kelas}}</td>
                                <td>{{$jdwl->pelajaran->pelajaran}}</td>
                                <td>
                                    <ul>
                                        @foreach ($detail as $det)
                                            @if($det->id_jadwal_pelajaran == $jdwl->id_jadwal_pelajaran)
                                                <li>{{$det->perlengkapan->perlengkapan}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahJadwal"
                                        data-toggle="modal"
                                        data-id_jadwal ="{{$jdwl->id_jadwal_pelajaran}}"
                                        data-id_hari ="{{$jdwl->id_hari}}"
                                        data-id_kelas ="{{$jdwl->id_kelas}}"
                                        data-jam="{{$jdwl->jam}}"
                                        data-id_pelajaran="{{$jdwl->id_pelajaran}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusJadwal"
                                        data-toggle="modal"
                                        data-id_jadwal ="{{$jdwl->id_jadwal_pelajaran}}">
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
        $('.myDatepicker3').datetimepicker({
            format: 'HH:mm'
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
        $('#perlengkapan').select2({
            theme: 'classic',
        });
    </script>

    <script>
        $('#perlengkapan2').select2({
            theme: 'classic',
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahJadwal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jadwal = button.data('id_jadwal');
            var id_hari = button.data('id_hari');
            var id_kelas = button.data('id_kelas');
            var jam = button.data('jam');
            var id_pelajaran = button.data('id_pelajaran');
            var modal = $(this);
            modal.find('.modal-body #id_jadwal_pelajaran').val(id_jadwal);
            modal.find('.modal-body #hari').val(id_hari);
            modal.find('.modal-body #kelas').val(id_kelas);
            modal.find('.modal-body #jam').val(jam);
            modal.find('.modal-body #pelajaran').val(id_pelajaran);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusJadwal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jadwal = button.data('id_jadwal');
            var modal = $(this);
            modal.find('.modal-body #id_jadwal_pelajaran').val(id_jadwal);
            });
        });
    </script>
@endsection

