<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Admin;
use App\Civitas;
use App\Hari;
use App\Jadwal;
use App\JadwalExam;
use App\Kelas;
use App\Option;
use App\Students;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login_index(){
        if(!Session::get('loginAdmin')){

            $admin = Admin::get();
            $hari = Hari::get();

            if($admin->count()<1){
                $adm = new Admin();
                $adm->username = "admin";
                $adm->password = "admin123";
                $adm->nama = "Default Admin";
                $adm->save();
            }

            if($hari->count()<1){
                for($i=1; $i<=5; $i++){
                    $hr = new Hari();
                    $hr->id_hari = $i;

                    if($i == 1){
                        $hr->nama_hari = "Senin";
                    }elseif($i == 2){
                        $hr->nama_hari = "Selasa";
                    }elseif($i == 3){
                        $hr->nama_hari = "Rabu";
                    }elseif($i == 4){
                        $hr->nama_hari = "Kamis";
                    }elseif($i == 5){
                        $hr->nama_hari = "Jumat";
                    }

                    $hr->save();
                }
            }

            return view('admin/loginAdmin');
        }else{
            return redirect('admin/dashboard');
        }
    }

    public function login_proses(Request $request){
        $admin = Admin::where('username', $request->username)->first();

        if($admin){
            if(Hash::check($request->password, $admin->password)){
                Session::put('loginAdmin', true);
                Session::put('username', $admin->username);
                return redirect('admin/dashboard')->with('alert success', 'Anda berhasil login');
            }else{
                return redirect('admin/login')->with('alert danger', 'Password salah!');
            }
        }else{
            return redirect('admin/login')->with('alert danger', 'Username salah!');
        }
    }

    public function dashboard(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            $siswa_count = Students::get()->count();
            $jadwal_count = Jadwal::get()->count();
            $ujian_count = JadwalExam::get()->count();
            $guru_count = Civitas::where('tipe_civitas', 'Guru')->get()->count();
            $kelas_count = Kelas::get()->count();

            $jadwal_reguler = null;
            $jadwal_exam = null;

            $hari_now = Carbon::now()->format('l');
            $jam_now = Carbon::now()->format('H:i');

            // var_dump($hari_now);

            if($hari_now == "Monday"){
                $jadwal_reguler = Jadwal::where('id_hari', 1)->get();
                $jadwal_exam = JadwalExam::where('id_hari', 1)->get();
            }elseif($hari_now == "Tuesday"){
                $jadwal_reguler = Jadwal::where('id_hari', 2)->get();
                $jadwal_exam = JadwalExam::where('id_hari', 2)->get();
            }elseif($hari_now == "Wednesday"){
                $jadwal_reguler = Jadwal::where('id_hari', 3)->get();
                $jadwal_exam = JadwalExam::where('id_hari', 3)->get();
            }elseif($hari_now == "Thursday"){
                $jadwal_reguler = Jadwal::where('id_hari', 4)->get();
                $jadwal_exam = JadwalExam::where('id_hari', 4)->get();
            }elseif($hari_now == "Friday"){
                $jadwal_reguler = Jadwal::where('id_hari', 5)->get();
                $jadwal_exam = JadwalExam::where('id_hari', 5)->get();
            }else{
                $jadwal_reguler = [];
                $jadwal_exam = [];
            }

            $opsi_reguler = Option::where('nama_option', "Jadwal Reguler")->value('aktif');
            $opsi_ujian = Option::where('nama_option', "Jadwal Ujian")->value('aktif');

            return view('admin/dashboardAdmin', compact('siswa_count', 'jadwal_count', 'guru_count', 'kelas_count', 'ujian_count', 'jadwal_reguler', 'jadwal_exam', 'hari_now', 'jam_now', 'opsi_reguler', 'opsi_ujian'));
        }
    }

    public function logout(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            Session()->forget('loginAdmin');
            return redirect('admin/login')->with('alert danger','Anda sudah logout');
        }
    }

    public function opsi(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{

            $pengaturan = Option::get();

            if($pengaturan->count()<1){
                $opsi = new Option();
                $opsi->nama_option = "Jadwal Reguler";
                $opsi->aktif = 0;
                $opsi->save();

                $opsi = new Option();
                $opsi->nama_option = "Jadwal Ujian";
                $opsi->aktif = 0;
                $opsi->save();
            }

            $opsiReguler = Option::where('nama_option', "Jadwal Reguler");
            $opsiExam = Option::where('nama_option', "Jadwal Ujian");

            return view('admin/kelolaOpsi', compact('opsiReguler', 'opsiExam'));
        }
    }

    public function simpan_opsi_reguler(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            $opsi = Option::find($request->id_option);
            $opsi->aktif = $request->aktif;
            $opsi->save();

            return response()->json(['success'=>'Opsi jadwal bel reguler berhasih diubah!']);
        }
    }

    public function simpan_opsi_exam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            $opsi = Option::find($request->id_option);
            $opsi->aktif = $request->aktif;
            $opsi->save();

            return response()->json(['success'=>'Opsi jadwal bel ujian berhasih diubah!']);
        }
    }

    public function ganti_password(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            return view('admin/gantiPassword');
        }
    }

    public function ganti_password_proses(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            $admin = Admin::orderBy('username', 'desc');

            if(Hash::check($request->password_lama, $admin->value('password'))){
                if($request->password_baru == $request->password_baru_ulang){
                    $admin = Admin::first();
                    $admin->password = $request->password_baru;
                    $admin->save();
                    return redirect('admin/dashboard')->with('alert success', 'Password berhasil diubah!');
                }else{
                    return redirect('admin/gantiPassword')->with('alert danger', 'Konfirmasi password baru salah!');
                }
            }else{
                return redirect('admin/gantiPassword')->with('alert danger', 'Password lama salah!');
            }
        }
    }
}
