<?php

namespace App\Http\Controllers;

use App\DetailPelajaran;
use App\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JadwalPelajaranController extends Controller
{
    public function detail(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $detail = DetailPelajaran::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaDetailPelajaran', compact('detail'));
        }
    }

    public function tambah_detail(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'perlengkapan' => 'unique:detail_pelajaran|max:255',
            ]);

            if($validatedData){
                $detail = new DetailPelajaran();
                $detail->perlengkapan = $request->perlengkapan;
                $detail->save();
                return redirect('admin/jadwalPelajaran/detail')->with('alert success', 'Perlengkapan berhasil ditambahkan!');
            }else{
                return redirect('admin/jadwalPelajaran/detail')->with('alert danger', 'Perlengkapan sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_detail(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'perlengkapan' => 'unique:detail_pelajaran|max:255',
            ]);

            if($validatedData){
                $detail = DetailPelajaran::findOrFail($request->id_detail_pelajaran);
                $detail->perlengkapan = $request->perlengkapan;
                $detail->save();
                return redirect('admin/jadwalPelajaran/detail')->with('alert success', 'Perlengkapan berhasil diubah!');
            }else{
                return redirect('admin/jadwalPelajaran/detail')->with('alert danger', 'Perlengkapan sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function hapus_detail(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $detail = DetailPelajaran::findOrFail($request->id_detail_pelajaran);
            $jadwal = JadwalPelajaran::where('id_detail_pelajaran', $request->id_detail_pelajaran)->get();
            if($jadwal->count()>0){
                return redirect('admin/jadwalPelajaran/detail')->with('alert danger', 'Perlengkapan tidak bisa dihapus, sedang digunakan!');
            }else{
                $detail->delete();
                return redirect('admin/jadwalPelajaran/detail')->with('alert danger', 'Perlengkapan berhasil dihapus!');
            }
        }
    }
}
