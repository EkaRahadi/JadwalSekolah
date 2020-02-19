@extends('admin/master/masterAdmin')

@section('title', 'Pemberitahuan | SPTK')

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
                        <strong class="card-title">Kirim Pemberitahuan</strong>
                    </div>
                    <div class="card-body">
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Kirim Pemberitahuan Lewat Email</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Kirim Pemberitahuan Lewat SMS</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form class="form-horizontal" role="form" method="post" action="/pemberitahuan/kirim/email/0">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div class="form-group">
                                            <label for="judul_pemberitahuan" class="control-label">Judul</label>
                                            <input class="form-control" name="judul_pemberitahuan" id="judul_pemberitahuan" placeholder="Masukkan judul" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi_pemberitahuan" class="control-label">Isi</label>
                                            <textarea class="form-control" name="isi_pemberitahuan" id="isi_pemberitahuan" placeholder="Masukkan isi" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengirim" class="control-label">Pengirim</label>
                                            <input class="form-control" name="pengirim" id="pengirim" placeholder="Masukkan pengirim" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ortu" class="control-label">Tujuan</label>
                                            <select class="js-example-basic-single" name="ortu[]" id="ortu" multiple="multiple" style="width: 100%;">
                                                    <option value="semua" selected>Semua</option>
                                                @foreach ($orangtua as $ortu)
                                                    <option value="{{$ortu->email}}">{{$ortu->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Kirim Pemberitahuan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form class="form-horizontal" role="form" method="post" action="/pemberitahuan/kirim/sms">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div class="form-group">
                                            <label for="judul_pemberitahuan" class="control-label">Judul</label>
                                            <input class="form-control" name="judul_pemberitahuan" id="judul_pemberitahuan" placeholder="Masukkan judul" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pesan" class="control-label">Pesan</label>
                                            <textarea class="form-control" name="pesan" id="pesan" placeholder="Masukkan pesan" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengirim" class="control-label">Pengirim</label>
                                            <input class="form-control" name="pengirim" id="pengirim" value="TK Flamboyan" required readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ortu" class="control-label">Tujuan</label>
                                            <select name="ortu[]" id="ortu2" multiple="multiple" style="width: 100%;">
                                                <option value="semua" selected>Semua</option>
                                                @foreach ($orangtua as $ortu)
                                                    <option value="{{$ortu->hp}}">{{$ortu->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Kirim Pemberitahuan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Riwayat Pemberitahuan</strong>
                    </div>
                    <div class="card-body">

                        <!-- Modal Info Pesan -->

                        <div class="modal fade" id="infoPesan" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Info Pesan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <p id="judul_pemberitahuan"></p>
                                            <p id="isi_pemberitahuan"></p>
                                            <p id="pengirim"></p>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus Pemberitahuan -->

                        <div class="modal fade" id="hapusPemberitahuan" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Pemberitahuan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/pemberitahuan/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_pemberitahuan">ID Pemberitahuan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_pemberitahuan" name="id_pemberitahuan" class="form-control" readonly required>
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
                                <th>Judul Pemberitahuan</th>
                                <th>Pengirim</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($pemberitahuan as $key => $pem)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$pem->judul_pemberitahuan}}</td>
                                <td>{{$pem->pengirim}}</td>
                                <td>{{$pem->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-target="#infoPesan"
                                        data-toggle="modal"
                                        data-judul ="{{$pem->judul_pemberitahuan}}"
                                        data-isi="{{$pem->isi_pemberitahuan}}"
                                        data-pengirim="{{$pem->pengirim}}">
                                        <i class="fa fa-info"></i>&nbsp;
                                        Info Pesan
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusPemberitahuan"
                                        data-toggle="modal"
                                        data-id_student ="{{$pem->id_pemberitahuan}}">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        $('#ortu').select2({
            theme: "classic",
        });
    </script>
    <script>
        $('#ortu2').select2({
            theme: "classic",
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#infoPesan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var judul = button.data('judul');
            var isi = button.data('isi');
            var pengirim = button.data('pengirim');

            console.log(judul);

            var modal = $(this);
            modal.find('.modal-body #judul_pemberitahuan').html(judul);
            modal.find('.modal-body #isi_pemberitahuan').html(isi);
            modal.find('.modal-body #pengirim').html(pengirim);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusPemberitahuan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_pemberitahuan = button.data('id_pemberitahuan');
            var modal = $(this);
            modal.find('.modal-body #id_pemberitahuan').val(id_pemberitahuan);
            });
        });
    </script>
@endsection

