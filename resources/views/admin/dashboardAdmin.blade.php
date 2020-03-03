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
            <div>{{Session::get('alert-\ success')}}</div>
        </div>
    @endif

      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Siswa</span>
        <div class="count">2500</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Jadwal Terdaftar</span>
        <div class="count">123.50</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Kelas</span>
        <div class="count green">2,500</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Jumlah Guru</span>
        <div class="count">4,567</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Waktu Delay Jadwal</span>
        <div class="count">3 s</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Ketepatan Waktu Jadwal</span>
        <div class="count">99,7%</div>
      </div>
    </div>
</div>
<!-- /top tiles -->
@endsection

@section('script')
    @include('admin/master/scriptDashboard')
    @push('dashboard_script')

    @endpush
@endsection
