<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Event;
use App\Hari;
use App\Jam;

class JadwalController extends Controller
{
    public function event(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $event = Event::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaEvent', compact('i', 'event'));
        }
    }

    public function tambah_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'event' => 'unique:event|max:255',
            ]);

            if($validatedData){
                $event = new Event();
                $event->event = $request->event;
                $event->save();
                return redirect('jadwal/event')->with('alert success', 'Event berhasil ditambahkan!');
            }else{
                return redirect('jadwal/event')->with('alert danger', 'Event sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'event' => '|max:255',
            ]);

            if($validatedData){
                $event = Event::findOrFail($request->id_event);
                $event->event = $request->event;
                $event->save();
                return redirect('jadwal/event')->with('alert success', 'Event berhasil diubah!');
            }else{
                return redirect('jadwal/event')->with('alert danger', 'Event sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $event = Event::findOrFail($request->id_event);
            $event->delete();
            return redirect('jadwal/event')->with('alert danger', 'Event berhasil dihapus!');
        }
    }

    public function hari(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $hari = Hari::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaHari', compact('i', 'hari'));
        }
    }

    public function tambah_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_hari' => 'unique:hari|max:255',
            ]);

            if($validatedData){
                $hari = new Hari();
                $hari->nama_hari = $request->nama_hari;
                $hari->save();
                return redirect('jadwal/hari')->with('alert success', 'Hari berhasil ditambahkan!');
            }else{
                return redirect('jadwal/hari')->with('alert danger', 'Nama Hari sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_hari' => '|max:255',
            ]);

            if($validatedData){
                $hari = Hari::findOrFail($request->id_hari);
                $hari->nama_hari = $request->nama_hari;
                $hari->save();
                return redirect('jadwal/hari')->with('alert success', 'Hari berhasil diubah!');
            }else{
                return redirect('jadwal/hari')->with('alert danger', 'Nama Hari sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $hari = Hari::findOrFail($request->id_hari);
            $hari->delete();
            return redirect('jadwal/hari')->with('alert danger', 'Hari berhasil dihapus!');
        }
    }

    public function jam(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $pukul = Jam::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaJam', compact('i', 'pukul'));
        }
    }

    public function tambah_jam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'pukul' => 'unique:jam|date_format:H:i',
            ]);

            if($validatedData){
                $jam = new Jam();
                $jam->pukul = $request->pukul;
                $jam->save();
                return redirect('jadwal/jam')->with('alert success', 'Jam berhasil ditambahkan!');
            }else{
                return redirect('jadwal/jam')->with('alert danger', 'Jam sudah ada!');
            }
        }
    }

    public function ubah_jam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'pukul' => '|date_format:H:i',
            ]);

            if($validatedData){
                $jam = Jam::findOrFail($request->id_jam);
                $jam->pukul = $request->pukul;
                $jam->save();
                return redirect('jadwal/jam')->with('alert success', 'Jam berhasil diubah!');
            }else{
                return redirect('jadwal/jam')->with('alert danger', 'Jam Hari sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_jam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jam = Jam::findOrFail($request->id_jam);
            $jam->delete();
            return redirect('jadwal/jam')->with('alert danger', 'Jam berhasil dihapus!');
        }
    }
}
