<?php

namespace App\Http\Controllers;

use App\Civitas;
use App\Jadwal;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataSekolahController extends Controller
{
    public function kelas(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $kelas = Kelas::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaKelas', compact('i', 'kelas'));
        }
    }

    public function tambah_kelas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_kelas' => 'unique:kelas|max:255',
            ]);

            if($validatedData){
                $kelas = new Kelas();
                $kelas->nama_kelas = $request->nama_kelas;
                $kelas->save();
                return redirect('admin/dataSekolah/kelas')->with('alert success', 'Kelas berhasil ditambahkan!');
            }else{
                return redirect('admin/dataSekolah/kelas')->with('alert danger', 'Nama Kelas sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_kelas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_kelas' => '|max:255',
            ]);

            if($validatedData){
                $kelas = Kelas::findOrFail($request->id_kelas);
                $kelas->nama_kelas = $request->nama_kelas;
                $kelas->save();
                return redirect('admin/dataSekolah/kelas')->with('alert success', 'Kelas berhasil diubah!');
            }else{
                return redirect('admin/dataSekolah/kelas')->with('alert danger', 'Nama Kelas sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_kelas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $kelas = Kelas::findOrFail($request->id_kelas);
            $jadwal = Jadwal::where('kelas', $request->id_kelas)->get();
            if($jadwal->count()>0){
                return redirect('admin/dataSekolah/kelas')->with('alert danger', ''.$kelas->nama_kelas.' sedang dipakai!');
            }else{
                $kelas->delete();
                return redirect('admin/dataSekolah/kelas')->with('alert danger', 'Kelas berhasil dihapus!');
            }
        }
    }

    public function civitas(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $civitas = Civitas::orderBy('tipe_civitas', 'asc')->get();
            return view('admin/kelolaCivitas', compact('civitas'));
        }
    }

    public function tambah_civitas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => 'unique:civitas|max:255',
                'email' => 'unique:civitas|email|max:255',
                'hp' => '|max:20',
            ]);

            if($validatedData){
                $civitas = new Civitas();
                $civitas->nama = $request->nama;
                $civitas->email = $request->email;
                $civitas->hp = $request->hp;
                $civitas->tipe_civitas = $request->tipe_civitas;
                $civitas->save();
                return redirect('admin/dataSekolah/civitas')->with('alert success', 'Civitas berhasil ditambahkan!');
            }else{
                return redirect('admin/dataSekolah/civitas')->with('alert danger', $validatedData);
            }
        }
    }

    public function ubah_civitas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => '|max:255',
                'email' => '|email|max:255',
                'hp' => '|max:20',
            ]);

            if($validatedData){
                $civitas = Civitas::findOrFail($request->id_civitas);
                $civitas->nama = $request->nama;
                $civitas->email = $request->email;
                $civitas->hp = $request->hp;
                $civitas->tipe_civitas = $request->tipe_civitas;
                $civitas->save();
                return redirect('admin/dataSekolah/civitas')->with('alert success', 'Civitas berhasil diubah!');
            }else{
                return redirect('admin/dataSekolah/civitas')->with('alert danger', $validatedData);
            }
        }
    }

    public function hapus_civitas(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $civitas = Civitas::findOrFail($request->id_civitas);
            $civitas->delete($civitas);
            return redirect('admin/dataSekolah/civitas')->with('alert danger', 'Civitas berhasil dihapus!');
        }
    }
}
