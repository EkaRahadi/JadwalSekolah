@extends('admin/master/masterAdmin')

@section('title', 'Event | SPTK')

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
                        <strong class="card-title">Kelola Event</strong>
                    </div>

                    <div class="card-body">

                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahEvent"><i class="fa fa-plus-square"></i>
                            Tambah Event
                        </button>

                        <br>

                        <!-- Modal Tambah Event -->

                        <div class="modal fade" id="tambahEvent" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Event</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/jadwal/event/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="event">Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="event" name="event" placeholder="Masukkan Event" class="form-control" required>
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

                        <!-- Modal Ubah Event -->

                        <div class="modal fade" id="ubahEvent" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Event</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/jadwal/event/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="event">ID Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_event" name="id_event" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="event">Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="event" name="event" placeholder="Masukkan Event" class="form-control" required>
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

                        <!-- Modal Hapus Event -->

                        <div class="modal fade" id="hapusEvent" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Event</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/jadwal/event/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="event">ID Event<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_event" name="id_event" class="form-control" readonly required>
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
                                <th>Event</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($event as $ev)
                              <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$ev->event}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahEvent"
                                        data-toggle="modal"
                                        data-id_event ="{{$ev->id_event}}"
                                        data-event="{{$ev->event}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusEvent"
                                        data-toggle="modal"
                                        data-id_event ="{{$ev->id_event}}">
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
          $('#ubahEvent').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id_event= button.data('id_event');
          var event = button.data('event');
            console.log(event);
          var modal = $(this);
          modal.find('.modal-body #id_event').val(id_event);
          modal.find('.modal-body #event').val(event);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
          $('#hapusEvent').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id_event= button.data('id_event');
            console.log(event);
          var modal = $(this);
          modal.find('.modal-body #id_event').val(id_event);
        });
    });
</script>
@endsection

