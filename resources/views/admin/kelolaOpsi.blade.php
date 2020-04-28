@extends('admin/master/masterAdmin')

@section('feature', 'Pengaturan')

@section('title', 'Pengaturan| ABSS')

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
                        <div class="form-group">
                            <label for="jdwl_reguler" class="control-label">Jadwal Reguler</label>
                            <input type="checkbox" data-id_option="{{$opsiReguler->value('id_option')}}" data-on="On" data-off="Off" class="js-switch" id="jdwl_reguler"name="jdwl_reguler"
                            {{ $opsiReguler->value('aktif') ? 'checked' : '' }}
                            />
                        </div>

                        <div class="form-group">
                            <label for="jdwl_exam" class="control-label">Jadwal Ujian</label>
                            <input type="checkbox" data-id_option="{{$opsiExam->value('id_option')}}" data-on="On" data-off="Off" class="js-switch" id="jdwl_exam" name="jdwl_exam"
                            {{ $opsiExam->value('aktif') ? 'checked' : '' }}
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
  <!-- /page content -->
@endsection

@section('script')
    @include('admin/master/scriptTables')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/cn0rsfqf5862dtcrgnngsfyi4vmj1ketcg7q1gtaw5w115xh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'#visi_misi', height: 300});</script>

    <script>
        $(function() {
          $('#jdwl_reguler').change(function() {
              var aktif = $(this).prop('checked') == true ? 1 : 0;
              var id_option = $(this).data('id_option');

              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/admin/opsi/reguler/simpan',
                  data: {'aktif': aktif, 'id_option': id_option},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
        })
    </script>

    <script>
        $(function() {
        $('#jdwl_exam').change(function() {
            var aktif = $(this).prop('checked') == true ? 1 : 0;
            var id_option = $(this).data('id_option');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/admin/opsi/exam/simpan',
                data: {'aktif': aktif, 'id_option': id_option},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
        })
    </script>

@endsection

