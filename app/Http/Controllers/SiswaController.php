<?php

namespace App\Http\Controllers;

use App\Students;
use App\Kelas;
use App\Parents;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index() {
        
        $siswa = Students::all();
        $parent = Parents::all();
        $kelas = Kelas::all();
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            return view('admin.kelolaSiswa', compact(['siswa','parent', 'kelas']));
            // dd($siswa->parent->nama);
        }
    }

    public function tambahSiswa(Request $request) {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => 'max:255',
            ]);

            if($validatedData){
                Students::create([
                    'nama' => $request->nama,
                    'parent' => $request->parent,
                    'kelas' => $request->kelas
                ]);
                return redirect('/dataSekolah/siswa')->with('alert success', 'Siswa berhasil ditambahkan!');
            }else{
                return redirect('/dataSekolah/siswa')->with('alert danger', 'Siswa sudah ada / melebihi 255 karakter!');
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
                $student->save($request->all());
                return redirect('/dataSekolah/siswa')->with('alert success', 'Siswa berhasil diubah!');
            }else{
                return redirect('/dataSekolah/siswa')->with('alert danger', 'Siswa sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapusSiswa(Request $request) {
        
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $student = Students::findOrFail($request->id_student);
            $student->delete();
            return redirect('/dataSekolah/siswa')->with('alert danger', 'Siswa berhasil dihapus!');
        }
    }
}
