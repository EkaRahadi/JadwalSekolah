<?php

namespace App\Http\Controllers;

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
}
