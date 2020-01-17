<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Ringtone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JD\Cloudder\Facades\Cloudder;


class RingtoneController extends Controller
{
    public function ringtone()
    {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $ringtones = Ringtone::all();
            return view('admin/kelolaRingtone', compact('ringtones'));
        }
    }

    public function tambah_ringtone(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_ringtone' => 'unique:ringtone|max:255',
            ]);

            if($validatedData){
                $ringtone = new Ringtone();
                $ringtone->nama_ringtone = $request->nama_ringtone;
                try{
                    //Upload music ke cloudinary
                    $file = $request->file('ringtone');
                    Cloudder::uploadVideo($file);
                    $url_file = Cloudder::getPublicId();
                }catch(Exception $e){
                    return redirect('ringtone')->with('alert danger', 'Terjadi Kesalahan dalam mengupload mp3');
                }
                $ringtone->ringtone = $url_file;
                $ringtone->save();
                return redirect('ringtone')->with('alert success', 'Ringtone berhasil ditambahkan!');
            }else{
                return redirect('ringtone')->with('alert danger', 'Ringtone sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_ringtone(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_ringtone' => '|max:255',
            ]);

            if($validatedData){
                $ringtone = Ringtone::findOrFail($request->id_ringtone);
                $ringtone->nama_ringtone = $request->nama_ringtone;
                $ringtone->save();
                return redirect('ringtone')->with('alert success', 'Ringtone berhasil diubah!');
            }else{
                return redirect('ringtone')->with('alert danger', 'Ringtone sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function hapus_ringtone(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $ringtone = Ringtone::findOrFail($request->id_ringtone);
            Cloudder::delete($ringtone->ringtone);
            $ringtone->delete();
            return redirect('ringtone')->with('alert danger', 'Ringtone berhasil dihapus!');
        }
    }

    public function getJadwal(){
        $jadwal = Jadwal::orderBy('jam', 'asc')->get();
        return response()->json($jadwal);
    }
}
