@extends('admin/master/masterAdmin')

@section('title', 'Ringtone | ABSS')

@section('active_menu_kelola_konten', 'active')

@section('feature', 'Ringtone')

@section('content')

    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
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
                    <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload Ringtone</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Konversi Ke MP3</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahRingtone"><i class="fa fa-plus-square"></i>
                                        Tambah Ringtone
                                    </button>
                                    <br>

                                    <!-- Modal Tambah Ringtone -->

                                    <div class="modal fade" id="tambahRingtone" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Ringtone</strong></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/ringtone/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field()}}
                                                        <div class="row form-group">
                                                            <label class="control-label col-md-3" for="nama_ringtone">Nama Ringtone<span class="required">*</span>
                                                            </label>
                                                            <div class="col-12 col-md-9">
                                                                <div class='input-group '>
                                                                    <input type='text' class="form-control" id="nama_ringtone" name="nama_ringtone" placeholder="Masukkan Nama Ringtone" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="control-label col-md-3" for="file_ringtone">Ringtone<span class="required">*</span>
                                                            </label>
                                                            <div class="col-12 col-md-9">
                                                                <div class='input-group'>
                                                                    <input type="file" accept=".mp3" class="form-control" id="ringtone" name="ringtone" required/>
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

                                    <!-- Modal Ubah Ringtone -->

                                    <div class="modal fade" id="ubahRingtone" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Ringtone</strong></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/ringtone/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field()}}
                                                        <div class="row form-group" hidden>
                                                            <label class="control-label col-md-3" for="id_ringtone">ID Ringtone<span class="required">*</span>
                                                            </label>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="id_ringtone" name="id_ringtone" class="form-control" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <label class="control-label col-md-3" for="nama_ringtone">Nama Ringtone<span class="required">*</span>
                                                            </label>
                                                            <div class="col-12 col-md-9">
                                                                <div class='input-group '>
                                                                    <input type='text' class="form-control" id="nama_ringtone" name="nama_ringtone" placeholder="Masukkan Nama Ringtone" required/>
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

                                    <!-- Modal Hapus Ringtone -->

                                    <div class="modal fade" id="hapusRingtone" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Ringtone</strong></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Apakah anda yakin?</h5>
                                                    <form action="/admin/ringtone/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field()}}
                                                        <div class="row form-group" hidden>
                                                            <label class="control-label col-md-3" for="id_ringtone">ID Ringtone<span class="required">*</span>
                                                            </label>
                                                            <div class="col-12 col-md-9">
                                                                <input type="text" id="id_ringtone" name="id_ringtone" class="form-control" readonly required>
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
                                            <th>Ringtone</th>
                                            <th>Play</th>
                                            <th>Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ringtones as $key => $item)
                                          <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->nama_ringtone}}</td>
                                            <td>
                                                <audio controls="controls" preload="metadata" >
                                                    <source src="https://res.cloudinary.com/harsoft-development/video/upload/{{$item->ringtone}}.mp3"/>;
                                                </audio>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-target="#ubahRingtone"
                                                    data-toggle="modal"
                                                    data-id_ringtone ="{{$item->id_ringtone}}"
                                                    data-nama_ringtone="{{$item->nama_ringtone}}">
                                                    <i class="fa fa-edit"></i>&nbsp;
                                                        Ubah
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-target="#hapusRingtone"
                                                    data-toggle="modal"
                                                    data-id_ringtone ="{{$item->id_ringtone}}">
                                                    <i class="fa fa-trash"></i>&nbsp;
                                                        Hapus
                                                </button>
                                            </td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form class="form-horizontal" role="form" method="post" action="/admin/ringtone/konversi" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div class="form-group">
                                            <label for="file_sound" class="control-label">Upload Sound</label>
                                            <input class="form-control" type="file" name="file_sound" id="file_sound" placeholder="Masukkan sound yang akan dikonversi" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ortu" class="control-label">Format</label>
                                            <select name="format" id="format">
                                                <option value="wav" selected>WAV</option>
                                                <option value="mp3" selected>MP3</option>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Konversi Media
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
        </div>
    </div>
<!-- /top tiles -->
@endsection

@section('script')
    @include('admin/master/scriptTables')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahRingtone').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_ringtone = button.data('id_ringtone');
            var nama_ringtone = button.data('nama_ringtone');
            var modal = $(this);
            modal.find('.modal-body #id_ringtone').val(id_ringtone);
            modal.find('.modal-body #nama_ringtone').val(nama_ringtone);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusRingtone').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_ringtone = button.data('id_ringtone');
            var modal = $(this);
            modal.find('.modal-body #id_ringtone').val(id_ringtone);
            });
        });
    </script>
@endsection
