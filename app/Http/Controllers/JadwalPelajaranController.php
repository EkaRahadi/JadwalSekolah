<?php

namespace App\Http\Controllers;

use App\DetailPelajaran;
use App\Hari;
use App\Jadwal;
use App\JadwalPelajaran;
use App\Kelas;
use App\Pelajaran;
use App\Perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JadwalPelajaranController extends Controller
{
    public function perlengkapan(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $perlengkapan = Perlengkapan::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaPerlengkapan', compact('perlengkapan'));
        }
    }

    public function tambah_perlengkapan(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'perlengkapan' => 'unique:perlengkapan|max:255',
            ]);

            if($validatedData){
                $perlengkapan = new Perlengkapan();
                $perlengkapan->perlengkapan = $request->perlengkapan;
                $perlengkapan->save();
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert success', 'Perlengkapan berhasil ditambahkan!');
            }else{
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert danger', 'Perlengkapan sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_perlengkapan(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'perlengkapan' => 'unique:perlengkapan|max:255',
            ]);

            if($validatedData){
                $perlengkapan = Perlengkapan::findOrFail($request->id_perlengkapan);
                $perlengkapan->perlengkapan = $request->perlengkapan;
                $perlengkapan->save();
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert success', 'Perlengkapan berhasil diubah!');
            }else{
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert danger', 'Perlengkapan sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function hapus_perlengkapan(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $perlengkapan = Perlengkapan::findOrFail($request->id_perlengkapan);
            $detail = DetailPelajaran::where('id_perlengkapan', $request->id_perlengkapan)->get();
            if($detail->count()>0){
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert danger', 'Perlengkapan tidak bisa dihapus, sedang digunakan!');
            }else{
                $perlengkapan->delete();
                return redirect('admin/jadwalPelajaran/perlengkapan')->with('alert danger', 'Perlengkapan berhasil dihapus!');
            }
        }
    }

    public function pelajaran(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $pelajaran = Pelajaran::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaPelajaran', compact('pelajaran'));
        }
    }

    public function tambah_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'pelajaran' => 'unique:pelajaran|max:255',
            ]);

            if($validatedData){
                Pelajaran::create($request->all());
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert success', 'Pelajaran berhasil ditambahkan!');
            }else{
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert danger', 'Pelajaran sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'pelajaran' => '|max:255',
            ]);

            if($validatedData){
                $pelajaran = Pelajaran::findOrFail($request->id_pelajaran);
                $pelajaran->pelajaran = $request->pelajaran;
                $pelajaran->save();
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert success', 'Pelajaran berhasil diubah!');
            }else{
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert danger', 'Pelajaran sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function hapus_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $pelajaran= Pelajaran::findOrFail($request->id_pelajaran);
            $jadwal = JadwalPelajaran::where('id_pelajaran', $request->id_pelajaran)->get();
            if($jadwal->count()>0){
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert danger', 'Pelajaran tidak bisa dihapus, sedang digunakan!');
            }else{
                $pelajaran->delete();
                return redirect('admin/jadwalPelajaran/pelajaran')->with('alert danger', 'Pelajaran berhasil dihapus!');
            }
        }
    }

    public function jadwal_pelajaran(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $jadwal = JadwalPelajaran::orderBy('created_at', 'desc')->get();
            $hari = Hari::get();
            $kelas = Kelas::get();
            $pelajaran = Pelajaran::get();
            $perlengkapan = Perlengkapan::get();
            $detail = DetailPelajaran::get();

            return view('admin/kelolaJadwalPelajaran', compact('i', 'jadwal', 'hari', 'kelas', 'pelajaran', 'perlengkapan', 'detail'));
        }
    }

    public function tambah_jadwal_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = new JadwalPelajaran();
            $jadwal->id_hari = $request->hari;
            $jadwal->id_pelajaran = $request->pelajaran;
            $jadwal->jam = $request->jam;
            $jadwal->id_kelas = $request->kelas;
            $jadwal->save();

            if($request->perlengkapan != null){
                for($i=0; $i<count($request->perlengkapan); $i++){
                    $id_jadwal_pelajaran = JadwalPelajaran::orderBy('created_at', 'desc')->value('id_jadwal_pelajaran');
                    $detail = new DetailPelajaran();
                    $detail->id_jadwal_pelajaran = $id_jadwal_pelajaran;
                    $detail->id_perlengkapan = $request->perlengkapan[$i];
                    $detail->save();
                }
            }
            return redirect('admin/jadwalPelajaran')->with('alert success', 'Jadwal pelajaran berhasil ditambahkan!');
        }
    }

    public function ubah_jadwal_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = JadwalPelajaran::findOrFail($request->id_jadwal_pelajaran);
            $jadwal->id_hari = $request->hari;
            $jadwal->id_pelajaran = $request->pelajaran;
            $jadwal->jam = $request->jam;
            $jadwal->id_kelas = $request->kelas;
            $jadwal->save();

            if($request->perlengkapan != null){
                $detail = DetailPelajaran::where('id_jadwal_pelajaran', $request->id_jadwal_pelajaran);
                $detail->delete($detail);

                for($i=0; $i<count($request->perlengkapan); $i++){
                    $id_jadwal_pelajaran = JadwalPelajaran::orderBy('created_at', 'desc')->value('id_jadwal_pelajaran');
                    $detail = new DetailPelajaran();
                    $detail->id_jadwal_pelajaran = $id_jadwal_pelajaran;
                    $detail->id_perlengkapan = $request->perlengkapan[$i];
                    $detail->save();
                }
            }

            return redirect('admin/jadwalPelajaran')->with('alert success', 'Jadwal pelajaran berhasil diubah!');
        }
    }

    public function hapus_jadwal_pelajaran(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $detail = DetailPelajaran::where('id_jadwal_pelajaran', $request->id_jadwal_pelajaran);

            if($detail!=null){
                $detail->delete($detail);
            }

            $jadwal = JadwalPelajaran::findOrFail($request->id_jadwal_pelajaran);
            $jadwal->delete($jadwal);

            return redirect('admin/jadwalPelajaran')->with('alert danger', 'Jadwal pelajaran berhasil dihapus!');
        }
    }
}
