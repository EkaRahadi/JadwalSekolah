<?php

namespace App\Http\Controllers;

use App\OrangTua;
use App\Pemberitahuan;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PemberitahuanController extends Controller
{
    public function pemberitahuan(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $orangtua = OrangTua::orderBy('nama', 'asc')->get();
            $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaPemberitahuan', compact('orangtua', 'pemberitahuan'));
        }
    }

    public function kirim_email(Request $request, $i){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            if($request->ortu!=null){
                if($request->ortu[0] == "semua"){
                    $orangtua = OrangTua::all();
                    $pemberitahuan = new Pemberitahuan();
                    for($i=0; $i<$orangtua->count(); $i++){
                        $pesan = $request->isi_pemberitahuan;
                        $pengirim = $request->pengirim;
                        $id_ortu = OrangTua::where('email', $request->ortu[$i])->value('id_parents');
                        $nama = Students::where('id_parents', $id_ortu)->value('nama');
                        $email = $orangtua[$i]->email;
                        $judul = $request->judul_pemberitahuan;
                        $send = Mail::send('admin/emailPemberitahuan', ['nama' => $nama, 'pesan' => $pesan, 'pengirim'=>$pengirim, 'judul'=>$judul], function ($message) use ($request, $email)
                        {
                            $message->subject('Pemberitahuan Kepada Orang Tua Siswa');
                            $message->from('harsoftdev@gmail.com', 'Taman Kanak-Kanak Flamboyan');
                            $message->to($email);
                        });
                    }
                    $pemberitahuan->judul_pemberitahuan = $request->judul_pemberitahuan;
                    $pemberitahuan->isi_pemberitahuan = $request->isi_pemberitahuan;
                    $pemberitahuan->pengirim = $request->pengirim;
                    $pemberitahuan->save();
                    return redirect('/pemberitahuan')->with('alert success', 'Email berhasil dikirim!');
                }else{
                    $pemberitahuan = new Pemberitahuan();
                    for($i=0; $i<count($request->ortu); $i++){
                        $pesan = $request->isi_pemberitahuan;
                        $pengirim = $request->pengirim;
                        $id_ortu = OrangTua::where('email', $request->ortu[$i])->value('id_parents');
                        $nama = Students::where('id_parents', $id_ortu)->value('nama');
                        $email = $request->ortu[$i];
                        $judul = $request->judul_pemberitahuan;
                        Mail::send('admin/emailPemberitahuan', ['nama' => $nama, 'pesan' => $pesan, 'pengirim'=>$pengirim, 'judul'=>$judul], function ($message) use ($request, $email)
                        {
                            $message->subject('Pemberitahuan Kepada Orang Tua Siswa');
                            $message->from('harsoftdev@gmail.com', 'Taman Kanak-Kanak Flamboyan');
                            $message->to($email);
                        });
                        $pemberitahuan->judul_pemberitahuan = $request->judul_pemberitahuan;
                        $pemberitahuan->isi_pemberitahuan = $request->isi_pemberitahuan;
                        $pemberitahuan->pengirim = $request->pengirim;
                    }
                    return redirect('/pemberitahuan')->with('alert success', 'Email berhasil dikirim!');
                }
            }else{
                return redirect('/pemberitahuan')->with('alert danger', 'Tujuan harus diisi terlebih dahulu!');
            }
        }
    }
}
