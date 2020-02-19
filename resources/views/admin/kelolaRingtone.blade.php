@extends('admin/master/masterAdmin')

@section('title', 'Ringtone | SPTK')

@section('active_menu_kelola_konten', 'active')

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
                        <strong class="card-title">Kelola Ringtone</strong>
                    </div>
                    <div class="card-body">
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
                                        <form action="/ringtone/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                                        <input onclick="startRecording()" type="button" value="start recording" />
    		                                            <input onclick="stopRecording()" type="button" value="stop recording and play" />
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
                                        <form action="/ringtone/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                        <form action="/ringtone/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /top tiles -->
@endsection

@section('script')
  @include('admin/master/scriptTables')
  @push('table_script')

  @endpush
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
    <script>
        var onFail = function(e) {
    				console.log('Rejected!', e);
    			};

    			var onSuccess = function(s) {
    				var context = new webkitAudioContext();
    				var mediaStreamSource = context.createMediaStreamSource(s);
    				recorder = new Recorder(mediaStreamSource);
    				recorder.record();

    				// audio loopback
    				// mediaStreamSource.connect(context.destination);
    			}

    			window.URL = window.URL || window.webkitURL;
    			navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

    			var recorder;
    			var audio = document.querySelector('audio');

    			function startRecording() {
    				if (navigator.getUserMedia) {
    					navigator.getUserMedia({audio: true}, onSuccess, onFail);
    				} else {
    					console.log('navigator.getUserMedia not present');
    				}
    			}

    			function stopRecording() {
    				recorder.stop();
    				recorder.exportWAV(function(s) {
                        audio.src = window.URL.createObjectURL(s);
    				});
    			}
    </script>
@endsection
