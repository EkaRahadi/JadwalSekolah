@extends('admin/master/masterAdmin')

@section('title', 'Dashboard | ABSS')

@section('feature', 'Dashboard')

@section('active_menu_kelola_konten', 'active')

@section('content')

    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
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

      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Siswa</span>
        <div class="count">{{$siswa_count}}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Jadwal Terdaftar</span>
        <div class="count">{{$jadwal_count}}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Jadwal Ujian Terdaftar</span>
        <div class="count">{{$ujian_count}}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Kelas</span>
        <div class="count green">{{$kelas_count}}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Guru</span>
        <div class="count">{{$guru_count}}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Waktu Delay Jadwal</span>
        <div class="count">3 s</div>
      </div>
    </div>
</div>

@if($opsi_reguler == 1)
<hr>
<div class="row">
    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>Jadwal bel yang akan datang</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if($jadwal_reguler->count()!=0)
            @foreach($jadwal_reguler as $reg)
            @if(\Carbon\Carbon::parse($reg->jam)->format('H:i') >= \Carbon\Carbon::now()->format('H:i'))
            <article class="media event">
                <a class="pull-left date">
                <p class="month">{{$reg->hari->nama_hari}}</p>
                </a>
                <div class="media-body">
                <p><b>{{\Carbon\Carbon::parse($reg->jam)->format('H:i')}}</b></p>
                <p>{{$reg->event->event}} - Kelas {{$reg->kelas->nama_kelas}}</p>
                </div>
            </article>
            @else
            <center><p><h3>Tidak ada jadwal</h3></p></center>
            @break
            @endif
            @endforeach
        @else
        <center><p><h3>Tidak ada jadwal</h3></p></center>
        @endif
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>Jadwal bel yang sudah lewat</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if($jadwal_reguler->count()!=0)
            @foreach($jadwal_reguler as $reg)
            @if(\Carbon\Carbon::parse($reg->jam)->format('H:i') < \Carbon\Carbon::now()->format('H:i'))
            <article class="media event">
                <a class="pull-left date">
                <p class="month">{{$reg->hari->nama_hari}}</p>
                </a>
                <div class="media-body">
                <p><b>{{\Carbon\Carbon::parse($reg->jam)->format('H:i')}}</b></p>
                <p>{{$reg->event->event}} - Kelas {{$reg->kelas->nama_kelas}}</p>
                </div>
            </article>
            @else
            <center><p><h3>Tidak ada jadwal</h3></p></center>
            @break
            @endif
            @endforeach
        @else
        <center><p><h3>Tidak ada jadwal</h3></p></center>
        @endif
        </div>
      </div>
    </div>
</div>
@endif

@if($opsi_ujian == 1)
<hr>
<div class="row">
    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>Jadwal bel ujian yang akan datang</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if($jadwal_exam->count()!=0)
            @foreach($jadwal_exam as $reg)
            @if(\Carbon\Carbon::parse($reg->jam)->format('H:i') >= \Carbon\Carbon::now()->format('H:i'))
            <article class="media event">
                <a class="pull-left date">
                <p class="month">{{$reg->hari->nama_hari}}</p>
                <p class="day">{{$reg->gelombang}}</p>
                </a>
                <div class="media-body">
                <p><b>{{\Carbon\Carbon::parse($reg->jam)->format('H:i')}}</b></p>
                <p>{{$reg->event->event}}</p>
                </div>
            </article>
            @else
            <center><p><h3>Tidak ada jadwal</h3></p></center>
            @break
            @endif
            @endforeach
        @else
        <center><p><h3>Tidak ada jadwal</h3></p></center>
        @endif
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>Jadwal bel ujian yang sudah lewat</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if($jadwal_exam->count()!=0)
            @foreach($jadwal_exam as $reg)
            @if(\Carbon\Carbon::parse($reg->jam)->format('H:i') < \Carbon\Carbon::now()->format('H:i'))
            <article class="media event">
                <a class="pull-left date">
                <p class="month">{{$reg->hari->nama_hari}}</p>
                <p class="day">{{$reg->gelombang}}</p>
                </a>
                <div class="media-body">
                <p><b>{{\Carbon\Carbon::parse($reg->jam)->format('H:i')}}</b></p>
                <p>{{$reg->event->event}}</p>
                </div>
            </article>
            @else
            <center><p><h3>Tidak ada jadwal</h3></p></center>
            @break
            @endif
            @endforeach
        @else
        <center><p><h3>Tidak ada jadwal</h3></p></center>
        @endif
        </div>
      </div>
    </div>
</div>
@endif
<!-- /top tiles -->
@endsection

@section('script')
    @include('admin/master/scriptDashboard')
@endsection
