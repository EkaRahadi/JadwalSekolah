@extends('admin/master/masterAdmin')

@section('title', 'Jadwal Ujian | ABSS')

@section('feature', 'Jadwal Ujian')

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
                <div class="x_panel">

                    <div class="x_content table-responsive">
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fa fa-plus-square"></i>
                            Tambah Jadwal
                        </button>
                        <br>

                        <!-- Modal Tambah Jadwal -->

                        <div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Jadwal</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwal/ujian/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                                <label class="control-label col-md-3" for="event">Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="event" name="event" required>
                                                        <option>--- Pilih Event ---</option>
                                                        @foreach ($event as $ev)
                                                        <option value="{{$ev->id_event}}">{{$ev->event}}</option>
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
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="ringtone">Ringtone<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="ringtone" name="ringtone" required>
                                                        <option>--- Pilih Ringtone ---</option>
                                                        @foreach ($ringtone as $ring)
                                                        <option value="{{$ring->id_ringtone}}">{{$ring->nama_ringtone}} <audio controls preload="auto" src="https://res.cloudinary.com/harsoft-development/video/upload/{{$ring->ringtone}}.mp3"></audio></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="gelombang">Gelombang<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="gelombang" name="gelombang" required>
                                                        <option>--- Pilih Gelombang ---</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
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
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Jadwal</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/jadwal/ujian/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jadwal_exam">ID Jadwal<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jadwal_exam" name="id_jadwal_exam" class="form-control" readonly required>
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
                                                <label class="control-label col-md-3" for="event">Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="event" name="event" required>
                                                        <option>--- Pilih Event ---</option>
                                                        @foreach ($event as $ev)
                                                        <option value="{{$ev->id_event}}">{{$ev->event}}</option>
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
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="ringtone">Ringtone<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="ringtone" name="ringtone" required>
                                                        <option>--- Pilih Ringtone ---</option>
                                                        @foreach ($ringtone as $ring)
                                                            <option value="{{$ring->id_ringtone}}">{{$ring->nama_ringtone}} <audio controls preload="auto" src="https://res.cloudinary.com/harsoft-development/video/upload/{{$ring->ringtone}}.mp3"></audio></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="gelombang">Gelombang<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" id="gelombang" name="gelombang" required>
                                                        <option>--- Pilih Gelombang ---</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
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

                        <!-- Modal Hapus Jadwal -->

                        <div class="modal fade" id="hapusJadwal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Jadwal</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/admin/jadwal/ujian/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jadwal_exam">ID Jadwal<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jadwal_exam" name="id_jadwal_exam" class="form-control" readonly required>
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

                        <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Event</th>
                                <th>Gelombang</th>
                                <th>Ringtone</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($jadwal as $jdwl)
                              <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$jdwl->hari->nama_hari}}</td>
                                <td>{{$jdwl->jam}}</td>
                                <td>{{$jdwl->event->event}}</td>
                                <td>{{$jdwl->gelombang}}</td>
                                <td>
                                    <audio controls="controls" preload="metadata" >
                                        <source src="https://res.cloudinary.com/harsoft-development/video/upload/{{$jdwl->ringtone->ringtone}}.mp3"/>;
                                    </audio>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahJadwal"
                                        data-toggle="modal"
                                        data-id_jadwal ="{{$jdwl->id_jadwal_exam}}"
                                        data-id_hari ="{{$jdwl->id_hari}}"
                                        data-id_jam="{{$jdwl->jam}}"
                                        data-id_event="{{$jdwl->id_event}}"
                                        data-gelombang="{{$jdwl->gelombang}}"
                                        data-id_ringtone="{{$jdwl->id_ringtone}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusJadwal"
                                        data-toggle="modal"
                                        data-id_jadwal ="{{$jdwl->id_jadwal_exam}}">
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahJadwal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jadwal = button.data('id_jadwal');
            var id_hari = button.data('id_hari');
            var id_jam = button.data('id_jam');
            var id_event = button.data('id_event');
            var gelombang = button.data('gelombang');
            var id_ringtone = button.data('id_ringtone');
            var modal = $(this);
            modal.find('.modal-body #id_jadwal_exam').val(id_jadwal);
            modal.find('.modal-body #hari').val(id_hari);
            modal.find('.modal-body #jam').val(id_jam);
            modal.find('.modal-body #event').val(id_event);
            modal.find('.modal-body #gelombang').val(gelombang);
            modal.find('.modal-body #ringtone').val(id_ringtone);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusJadwal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jadwal = button.data('id_jadwal');
            var modal = $(this);
            modal.find('.modal-body #id_jadwal_exam').val(id_jadwal);
            });
        });
    </script>
@endsection

