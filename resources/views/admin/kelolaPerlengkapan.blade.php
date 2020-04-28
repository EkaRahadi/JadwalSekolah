@extends('admin/master/masterAdmin')

@section('title', 'Perlengkapan | ABSS')

@section('feature', 'Perlengkapan')

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

                    <div class="card-body">

                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahDetail"><i class="fa fa-plus-square"></i>
                            Tambah Perlengkapan
                        </button>

                        <br>

                        <!-- Modal Tambah Detail -->

                        <div class="modal fade" id="tambahDetail" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Perlengkapan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwalPelajaran/perlengkapan/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="perlengkapan">Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="perlengkapan" name="perlengkapan" placeholder="Masukkan Perlengkapan" class="form-control" required>
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

                        <!-- Modal Ubah Detail -->

                        <div class="modal fade" id="ubahDetail" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Perlengkapan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwalPelajaran/perlengkapan/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_perlengkapan">ID Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_perlengkapan" name="id_perlengkapan" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="perlengkapan">Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="perlengkapan" name="perlengkapan" placeholder="Masukkan Perlengkapan" class="form-control" required>
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

                        <!-- Modal Hapus Detail -->

                        <div class="modal fade" id="hapusDetail" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Perlengkapan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/jadwalPelajaran/perlengkapan/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_perlengkapan">ID Perlengkapan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_perlengkapan" name="id_perlengkapan" class="form-control" readonly required>
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
                                <th>Perlengkapan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($perlengkapan as $key=>$det)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$det->perlengkapan}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahDetail"
                                        data-toggle="modal"
                                        data-id_perlengkapan="{{$det->id_perlengkapan}}"
                                        data-perlengkapan="{{$det->perlengkapan}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusDetail"
                                        data-toggle="modal"
                                        data-id_perlengkapan="{{$det->id_perlengkapan}}">
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
          $('#ubahDetail').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id_perlengkapan= button.data('id_perlengkapan');
          var perlengkapan = button.data('perlengkapan');
          var modal = $(this);
          modal.find('.modal-body #id_perlengkapan').val(id_perlengkapan);
          modal.find('.modal-body #perlengkapan').val(perlengkapan);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
          $('#hapusDetail').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id_perlengkapan= button.data('id_perlengkapan');
          var modal = $(this);
          modal.find('.modal-body #id_pelengkapan').val(id_perlengkapan);
        });
    });
</script>

@endsection

