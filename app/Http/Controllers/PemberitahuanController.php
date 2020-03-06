<?php

namespace App\Http\Controllers;

use App\OrangTua;
use App\Outbox;
use App\Pemberitahuan;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PemberitahuanController extends Controller
{
    public function pemberitahuan(){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $orangtua = OrangTua::orderBy('nama', 'asc')->get();
            $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaPemberitahuan', compact('orangtua', 'pemberitahuan'));
        }
    }

    public function kirim_email(Request $request, $i){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
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
                    return redirect('admin/pemberitahuan')->with('alert success', 'Email berhasil dikirim!');
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
                    return redirect('admin/pemberitahuan')->with('alert success', 'Email berhasil dikirim!');
                }
            }else{
                return redirect('admin/pemberitahuan')->with('alert danger', 'Tujuan harus diisi terlebih dahulu!');
            }
        }
    }

    public function kirim_sms(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            if($request->ortu!=null){
                if($request->ortu[0] == "semua"){
                    $orangtua = OrangTua::all();
                    $pemberitahuan = new Pemberitahuan();
                    $send = false;
                    for($i=0; $i<$orangtua->count(); $i++){
                        $noHP = $orangtua[$i]->hp;

                        if(!preg_match('/[^+0-9]/',trim($noHP))){
                            // cek apakah no hp karakter 1-3 adalah +62
                            if(substr(trim($noHP), 0, 3)=='+62'){
                                $hp = trim($noHP);
                            }
                            // cek apakah no hp karakter 1 adalah 0
                            elseif(substr(trim($noHP), 0, 1)=='0'){
                                $hp = '62'.substr(trim($noHP), 1);
                            }
                        }

                        $pengirim = $request->pengirim;
                        $pesan = $request->pesan;

                        $send = new Outbox();
                        $send->DestinationNumber = $hp;
                        $send->TextDecoded = $pesan;
                        $send->CreatorID = $pengirim;
                        $send->save();
                    }

                    if($send){
                        $pemberitahuan->judul_pemberitahuan = $request->judul_pemberitahuan;
                        $pemberitahuan->isi_pemberitahuan = $request->pesan;
                        $pemberitahuan->pengirim = $request->pengirim;
                        $pemberitahuan->save();
                        return redirect('admin/pemberitahuan')->with('alert success', 'SMS berhasil dikirim!');
                    }
                }else{
                    $pemberitahuan = new Pemberitahuan();
                    $send = false;
                    for($i=0; $i<count($request->ortu); $i++){
                        $noHP = $request->ortu[$i];

                        if(!preg_match('/[^+0-9]/',trim($noHP))){
                            // cek apakah no hp karakter 1-3 adalah +62
                            if(substr(trim($noHP), 0, 3)=='+62'){
                                $hp = trim($noHP);
                            }
                            // cek apakah no hp karakter 1 adalah 0
                            elseif(substr(trim($noHP), 0, 1)=='0'){
                                $hp = '62'.substr(trim($noHP), 1);
                            }
                        }

                        $pengirim = $request->pengirim;
                        $pesan = $request->pesan;

                        $send = new Outbox();
                        $send->DestinationNumber = $hp;
                        $send->TextDecoded = $pesan;
                        $send->CreatorID = $pengirim;
                        $send->save();
                    }

                    if($send){
                        $pemberitahuan->judul_pemberitahuan = $request->judul_pemberitahuan;
                        $pemberitahuan->isi_pemberitahuan = $request->pesan;
                        $pemberitahuan->pengirim = $request->pengirim;
                        $pemberitahuan->save();
                        return redirect('admin/pemberitahuan')->with('alert success', 'SMS berhasil dikirim!');
                    }
                }
            }else{
                return redirect('admin/pemberitahuan')->with('alert danger', 'Tujuan harus diisi terlebih dahulu!');
            }
        }
    }
}
