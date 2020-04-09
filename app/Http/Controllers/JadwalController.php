<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Event;
use App\Hari;
use App\Jadwal;
use App\JadwalExam;
use App\Kelas;
use App\Ringtone;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function event(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $event = Event::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaEvent', compact('i', 'event'));
        }
    }

    public function tambah_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'event' => 'unique:event|max:255',
            ]);

            if($validatedData){
                $event = new Event();
                $event->event = $request->event;
                $event->save();
                return redirect('admin/jadwal/event')->with('alert success', 'Event berhasil ditambahkan!');
            }else{
                return redirect('admin/jadwal/event')->with('alert danger', 'Event sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'event' => '|max:255',
            ]);

            if($validatedData){
                $event = Event::findOrFail($request->id_event);
                $event->event = $request->event;
                $event->save();
                return redirect('admin/jadwal/event')->with('alert success', 'Event berhasil diubah!');
            }else{
                return redirect('admin/jadwal/event')->with('alert danger', 'Event sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_event(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $event = Event::findOrFail($request->id_event);
            $jadwal = Jadwal::where('id_event', $request->id_event)->get();
            if($jadwal->count()>0){
                return redirect('admin/jadwal/event')->with('alert danger', 'Event'.$event->event.' tidak bisa dihapus, sedang digunakan!');
            }else{
                $event->delete();
                return redirect('admin/jadwal/event')->with('alert danger', 'Event berhasil dihapus!');
            }
        }
    }

    public function hari(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $hari = Hari::orderBy('created_at', 'asc')->get();
            return view('admin/kelolaHari', compact('i', 'hari'));
        }
    }

    public function tambah_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_hari' => 'unique:hari|max:255',
            ]);

            if($validatedData){
                $hari = new Hari();
                $hari->nama_hari = $request->nama_hari;
                $hari->save();
                return redirect('admin/jadwal/hari')->with('alert success', 'Hari berhasil ditambahkan!');
            }else{
                return redirect('admin/jadwal/hari')->with('alert danger', 'Nama Hari sudah ada / melebihi 255 karakter!');
            }
        }
    }

    public function ubah_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $validatedData = $request->validate([
                'nama_hari' => '|max:255',
            ]);

            if($validatedData){
                $hari = Hari::findOrFail($request->id_hari);
                $hari->nama_hari = $request->nama_hari;
                $hari->save();
                return redirect('admin/jadwal/hari')->with('alert success', 'Hari berhasil diubah!');
            }else{
                return redirect('admin/jadwal/hari')->with('alert danger', 'Nama Hari sudah melebihi 255 karakter!');
            }
        }
    }

    public function hapus_hari(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $hari = Hari::findOrFail($request->id_hari);
            $hari->delete();
            return redirect('admin/jadwal/hari')->with('alert danger', 'Hari berhasil dihapus!');
        }
    }

    public function jadwal(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $jadwal = Jadwal::orderBy('created_at', 'desc')->get();
            $hari = Hari::all();
            $event = Event::all();
            $kelas = Kelas::all();
            $ringtone = Ringtone::all();
            return view('admin/kelolaJadwal', compact('i', 'jadwal', 'hari', 'event', 'kelas', 'ringtone'));
        }
    }

    public function tambah_jadwal(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = new Jadwal();
            $jadwal->id_hari = $request->hari;
            $jadwal->id_event = $request->event;
            $jadwal->jam = $request->jam;
            $jadwal->id_kelas = $request->kelas;
            $jadwal->id_ringtone = $request->ringtone;
            $jadwal->save();
            return redirect('admin/jadwal')->with('alert success', 'Jadwal berhasil ditambahkan!');
        }
    }

    public function ubah_jadwal(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = Jadwal::findOrFail($request->id_jadwal);
            $jadwal->id_hari = $request->hari;
            $jadwal->id_event = $request->event;
            $jadwal->jam = $request->jam;
            $jadwal->id_kelas = $request->kelas;
            $jadwal->id_ringtone = $request->ringtone;
            $jadwal->save();
            return redirect('admin/jadwal')->with('alert success', 'Jadwal berhasil diubah!');
        }
    }

    public function hapus_jadwal(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = Jadwal::findOrFail($request->id_jadwal);
            $jadwal->delete();
            return redirect('admin/jadwal')->with('alert danger', 'Jadwal berhasil dihapus!');
        }
    }

    public function jadwal_exam(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $i=0;
            $jadwal = JadwalExam::orderBy('created_at', 'desc')->get();
            $hari = Hari::all();
            $event = Event::all();
            $ringtone = Ringtone::all();
            return view('admin/kelolaJadwalExam', compact('i', 'jadwal', 'hari', 'event', 'ringtone'));
        }
    }

    public function tambah_jadwal_exam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = new JadwalExam();
            $jadwal->id_hari = $request->hari;
            $jadwal->id_event = $request->event;
            $jadwal->jam = $request->jam;
            $jadwal->gelombang = $request->gelombang;
            $jadwal->id_ringtone = $request->ringtone;
            $jadwal->save();
            return redirect('admin/jadwal/ujian')->with('alert success', 'Jadwal berhasil ditambahkan!');
        }
    }

    public function ubah_jadwal_exam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = JadwalExam::findOrFail($request->id_jadwal_exam);
            $jadwal->id_hari = $request->hari;
            $jadwal->id_event = $request->event;
            $jadwal->jam = $request->jam;
            $jadwal->gelombang = $request->gelombang;
            $jadwal->id_ringtone = $request->ringtone;
            $jadwal->save();
            return redirect('admin/jadwal/ujian')->with('alert success', 'Jadwal berhasil diubah!');
        }
    }

    public function hapus_jadwal_exam(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $jadwal = JadwalExam::findOrFail($request->id_jadwal_exam);
            $jadwal->delete();
            return redirect('admin/jadwal/ujian')->with('alert danger', 'Jadwal berhasil dihapus!');
        }
    }
}
