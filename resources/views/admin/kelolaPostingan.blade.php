@extends('admin/master/masterAdmin')

@section('feature', 'Postingan')

@section('title', 'Postingan | ABSS')

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
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="/admin/postingan/posting">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group">
                                <label for="judul" class="control-label">Judul</label>
                                <input class="form-control" name="judul" id="judul" placeholder="Masukkan judul" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori" class="control-label">Kategori</label>
                                <select class="js-example-basic-single" name="kategori" id="kategori" style="width: 100%;">
                                        <option value="">--- Pilih kategori ---</option>
                                        <option value="berita">Berita</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        <option value="prestasi">Prestasi</option>
                                        <option value="serba-serbi">Serba-Serbi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="control-label">Gambar/Ilustrasi</label>
                                <input class="form-control" type="file" name="gambar" id="gambar" placeholder="Masukkan gambar" required>
                            </div>
                            <div class="form-group">
                                <label for="isi" class="control-label">Isi</label>
                                <textarea class="form-control" name="isi" id="isi" placeholder="Masukkan isi"></textarea>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <br>
            <div class="clearfix"></div>
            <br>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Postingan</strong>
                    </div>
                    <div class="card-body">

                        <!-- Modal Ubah Postingan -->

                        <div class="modal fade" id="ubahPostingan" role="dialog" tabindex="-1" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Postingan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/postingan/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="id_postingan">ID Postingan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_postingan" name="id_postingan" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="judul">Judul<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="judul" id="judul" placeholder="Masukkan judul" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="kategori">Kategori</label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="kategori" id="kategori" style="width: 100%;">
                                                        <option value="">--- Pilih kategori ---</option>
                                                        <option value="berita">Berita</option>
                                                        <option value="pengumuman">Pengumuman</option>
                                                        <option value="prestasi">Prestasi</option>
                                                        <option value="serba-serbi">Serba-Serbi</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="gambar">Gambar/Ilustrasi<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="file" name="gambar" id="gambar" placeholder="Masukkan gambar">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="isi">Isi<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" name="isi" id="isi" placeholder="Masukkan isi" ></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus Postingan -->

                        <div class="modal fade" id="hapusPostingan" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Postingan</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/postingan/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_postingan">ID Postingan<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_postingan" name="id_postingan" class="form-control" readonly required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($postingan as $key => $pos)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$pos->judul}}</td>
                                <td>{{$pos->kategori}}</td>
                                <td>{{$pos->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahPostingan"
                                        data-toggle="modal"
                                        data-id_postingan="{{$pos->id_postingan}}"
                                        data-judul ="{{$pos->judul}}"
                                        data-isi="{{$pos->isi}}"
                                        data-kategori="{{$pos->kategori}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusPostingan"
                                        data-toggle="modal"
                                        data-id_postingan="{{$pos->id_postingan}}">
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
    <script src="https://cdn.tiny.cloud/1/cn0rsfqf5862dtcrgnngsfyi4vmj1ketcg7q1gtaw5w115xh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea', height: 300});</script>

    <script>
        $('#kategori').select2({
            theme: "classic",
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahPostingan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_postingan = button.data('id_postingan');
            var judul = button.data('judul');
            var isi = button.data('isi');
            var kategori = button.data('kategori');
            var modal = $(this);

            console.log(id_postingan)

            tinymce.activeEditor.setContent(isi)

            modal.find('.modal-body #id_postingan').val(id_postingan);
            modal.find('.modal-body #judul').val(judul);
            modal.find('.modal-body #kategori').val(kategori);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusPostingan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_postingan = button.data('id_postingan');
            var modal = $(this);
            modal.find('.modal-body #id_postingan').val(id_postingan);
            });
        });
    </script>
@endsection

