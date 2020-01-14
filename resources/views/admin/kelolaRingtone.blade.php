@extends('admin/master/masterAdmin')

@section('title', 'Dashboard | SPTK')

@section('active_menu_kelola_konten', 'active')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Ringtone List
                            <a onclick="#" class="btn btn-primary pull-right" style="margin-top: -8px;"> Add Ringtone</a>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <table id="ringtone-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ringtones as $key => $item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->nama_ringtone}}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="glyphicom glymphicom-eye-open"></i>Play</a>
                                            <a onclick="editRingtone($item->id_ringtone);" class="btn btn-primary btn-xs"><i class="glyphicom glyphicom-edit"></i>Edit</a>
                                            <a onclick="deleteRingtone($item->id_ringtone);" class="btn btn-danger btn-xs"><i class="glyphicom glyphicom-trash"></i>Delete</a>
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
<!-- /top tiles -->
@endsection

@include('admin/master/scriptDashboard')
@push('dashboard_script')
        <script type="text/javascript">
            // $('#ringtone-table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{{route('api.ringtone')}}",
            //     // columns: [
            //     //     {data: 'nama_ringtone', name: 'nama_ringtone'},
            //     //     {data: 'action', name: 'action', orderable: false, searchable: false}
            //     // ]
            //     columns: [
            //         {"data": "nama_ringtone"},
            //         {"data": "action"}
            //     ]
            // });
            function editRingtone(id) {
                confirm("Ini Alert");
            }
        </script>
@endpush
