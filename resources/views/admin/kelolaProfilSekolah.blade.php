@extends('admin/master/masterAdmin')

@section('feature', 'Profil Sekolah')

@section('title', 'Profil Sekolah | ABSS')

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
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="/admin/dataSekolah/profilSekolah/simpan">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group" hidden>
                                <label for="id_profile_sekolah" class="control-label">ID Profile Sekolah</label>
                                <input class="form-control" name="id_profile_sekolah" id="id_profile_sekolah" value="{{$profil->value('id_profile_sekolah')}}">
                            </div>
                            <div class="form-group">
                                <label for="nama_sekolah" class="control-label">Nama Sekolah</label>
                                <input class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Masukkan nama sekolah" value="{{$profil->value('nama_sekolah')}}"  required>
                            </div>
                            <div class="form-group">
                                <label for="kontak" class="control-label">Kontak</label>
                                <input class="form-control" name="kontak" id="kontak" placeholder="Masukkan kontak" value="{{$profil->value('kontak')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="control-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat"  required>{{$profil->value('alamat')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="link" class="control-label">Link</label>
                                <input class="form-control" name="link" id="link" placeholder="Masukkan link" value="{{$profil->value('link_website')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="visi_misi" class="control-label">Visi Misi</label>
                                <textarea class="form-control" name="visimisi" id="visi_misi" placeholder="Masukkan visi misi">{{$profil->value('visi_misi')}}</textarea>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
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
@endsection

