@extends('admin/master/masterAdmin')

@section('title', 'Jam | SPTK')

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
                        <strong class="card-title">Kelola Jam</strong>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahJam"><i class="fa fa-plus-square"></i>
                            Tambah Jam
                        </button>
                        <br>

                        <!-- Modal Tambah Jam -->

                        <div class="modal fade" id="tambahJam" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Jam</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/jadwal/jam/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="pukul">Pukul<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <div class='input-group date myDatepicker3' id='myDatepicker3'>
                                                        <input type='text' class="form-control" id="pukul" name="pukul" placeholder="Masukkan jam" required/>
                                                        <span class="input-group-addon">
                                                           <span class="fa fa-calendar"></span>
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

                        <!-- Modal Ubah Jam -->

                        <div class="modal fade" id="ubahJam" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Jam</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/jadwal/jam/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jam">ID Jam<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jam" name="id_jam" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="control-label col-md-3" for="pukul">Pukul<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <div class='input-group date myDatepicker3' id='myDatepicker3'>
                                                        <input type='text' class="form-control" id="pukul" name="pukul" placeholder="Masukkan jam" required />
                                                        <span class="input-group-addon">
                                                           <span class="fa fa-calendar"></span>
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

                        <!-- Modal Hapus Jam -->

                        <div class="modal fade" id="hapusJam" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Jam</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Apakah anda yakin?</h5>
                                        <form action="/jadwal/jam/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field()}}
                                            <div class="row form-group" hidden>
                                                <label class="control-label col-md-3" for="id_jam">ID Jam<span class="required">*</span>
                                                </label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_jam" name="id_jam" class="form-control" readonly required>
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
                                <th>Jam</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($pukul as $pkl)
                              <tr>
                                <td>{{$i+=1}}</td>
                                <td>{{$pkl->pukul}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm"
                                        data-target="#ubahJam"
                                        data-toggle="modal"
                                        data-id_jam ="{{$pkl->id_jam}}"
                                        data-pukul="{{$pkl->pukul}}">
                                        <i class="fa fa-edit"></i>&nbsp;
                                            Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-target="#hapusJam"
                                        data-toggle="modal"
                                        data-id_jam ="{{$pkl->id_jam}}">
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
    $('.myDatepicker3').datetimepicker({
        format: 'HH:mm'
    });
</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahJam').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jam = button.data('id_jam');
            var pukul = button.data('pukul');
                console.log(pukul);
            var modal = $(this);
            modal.find('.modal-body #id_jam').val(id_jam);
            modal.find('.modal-body #pukul').val(pukul);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#hapusJam').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_jam = button.data('id_jam');
                console.log(id_jam);
            var modal = $(this);
            modal.find('.modal-body #id_jam').val(id_jam);
            });
        });
    </script>
@endsection

