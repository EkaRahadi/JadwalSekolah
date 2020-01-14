<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;
use Illuminate\Support\Facades\Session;

class OrangTuaController extends Controller
{
    public function index() {
        
        $parent = Parents::all();
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            return view('admin.kelolaOrangTua', compact('parent'));
        }
    }

    public function tambahOrangTua(Request $request) {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => 'max:255',
                'email' => 'unique:parents|max:255',
                'hp' => 'max:13'
            ]);

            if($validatedData){
                Parents::create($request->all());
                return redirect('/orangtua')->with('alert success', 'Orang Tua berhasil ditambahkan!');
            }else{
                return redirect('/orangtua')->with('alert danger', 'Orang Tua sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubahOrangTua(Request $request) {
        
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama' => '|max:255',
                'hp' => 'max:13'
            ]);

            if($validatedData){
                $parents = Parents::findOrFail($request->id_parent);
                $parents->nama= $request->nama;
                $parents->hp = $request->hp;
                $parents->email = $request->email;
                $parents->alamat = $request->alamat;
                $parents->save();
                return redirect('/orangtua')->with('alert success', 'Orang Tua berhasil diubah!');
            }else{
                return redirect('/orangtua')->with('alert danger', 'Orang Tua sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapusOrangTua(Request $request) {
        
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $parent = Parents::findOrFail($request->id_parent);
            $parent->delete();
            return redirect('/orangtua')->with('alert danger', 'Orang Tua berhasil dihapus!');
        }
    }
}
