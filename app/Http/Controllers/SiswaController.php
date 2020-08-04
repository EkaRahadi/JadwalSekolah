<?php

namespace App\Http\Controllers;

use App\Students;
use App\OrangTua;
use App\Kelas;
use App\Jadwal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Students::with('orang_tua','kelas_siswa' )->get();
        $parent = OrangTua::get();
        $class = Kelas::all();
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            return view('admin.kelolaSiswa', compact(['siswa', 'class', 'parent']));
        }
    }

    public function tambahSiswa(Request $request) {
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => 'max:255',
            ]);

            if($validatedData){
                Students::create([
                    'nama' => $request->nama,
                    'id_parents' => $request->id_parents,
                    'id_kelas' => $request->kelas
                ]);
                return redirect('admin/dataSekolah/siswa')->with('alert success', 'Siswa berhasil ditambahkan!');
            }else{
                return redirect('admin/dataSekolah/siswa')->with('alert danger', 'Siswa sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubahSiswa(Request $request) {

        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => '|max:255',
            ]);

            if($validatedData){
                $student = Students::findOrFail($request->id_student);
                $student->nama = $request->nama;
                $student->id_parents = $request->id_parents;
                $student->id_kelas = $request->id_kelas;
                $student->save();
                return redirect('admin/dataSekolah/siswa')->with('alert success', 'Siswa berhasil diubah!');
            }else{
                return redirect('admin/dataSekolah/siswa')->with('alert danger', 'Siswa sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapusSiswa(Request $request) {

        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $student = Students::findOrFail($request->id_student);
            $student->delete();
            return redirect('admin/dataSekolah/siswa')->with('alert danger', 'Siswa berhasil dihapus!');
        }
    }
}
