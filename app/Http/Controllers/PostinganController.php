<?php

namespace App\Http\Controllers;

use App\Postingan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JD\Cloudder\Facades\Cloudder;

class PostinganController extends Controller
{
    public function postingan()
    {
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $postingan = Postingan::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaPostingan', compact('postingan'));
        }
    }

    public function tambah_postingan(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $this->validate($request, [
                'judul' => '|unique:postingan',
            ]);

            $postingan = new Postingan();
            $postingan->judul = $request->judul;
            $postingan->kategori = $request->kategori;
            $postingan->isi = $request->isi;
            try{
                //Upload gambar ke cloudinary
                $file = $request->gambar;
                Cloudder::upload($file);
                $url_file = Cloudder::getPublicId();
            }catch(Exception $e){
                return redirect('admin/postingan')->with('alert danger', 'Terjadi Kesalahan dalam mengupload gambarQ!');
            }
            $postingan->gambar = $url_file;
            $postingan->save();
            return redirect('admin/postingan')->with('alert success', 'Postingan berhasil ditambahkan!');
        }
    }

    public function ubah_postingan(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{



            if($request->gambar != null){

                try{
                    $gambar = Postingan::where('gambar', $request->id_postingan)->value('gambar');
                    Cloudder::destroy($gambar);
                    //Upload gambar ke cloudinary
                    $file = $request->gambar;
                    Cloudder::upload($file);
                    $url_file = Cloudder::getPublicId();

                }catch(Exception $e){
                    return redirect('admin/postingan')->with('alert danger', 'Terjadi Kesalahan dalam mengupload gambar!');
                }

                $postingan = Postingan::where('id_postingan', $request->id_postingan)->first();
                $postingan->judul = $request->judul;
                $postingan->kategori = $request->kategori;
                $postingan->isi = $request->isi;
                $postingan->gambar = $url_file;
                $postingan->save();
                return redirect('admin/postingan')->with('alert success', 'Postingan berhasil diubah!');

            }else{
                $postingan = Postingan::where('id_postingan', $request->id_postingan)->first();;
                $postingan->judul = $request->judul;
                $postingan->kategori = $request->kategori;
                $postingan->isi = $request->isi;
                $postingan->save();
                return redirect('admin/postingan')->with('alert success', 'Postingan berhasil diubah!');
            }
        }
    }

    public function hapus_postingan(Request $request)
    {
        if(!Session::get('loginAdmin')){
            return redirect('admin/login')->with('alert danger', 'Anda harus login terlebih dahulu!');
        }else{
            $postingan = Postingan::findOrFail($request->id_postingan);
            $gambar = $postingan->value('gambar');
            Cloudder::destroy($gambar);
            $postingan->delete($postingan);
            return redirect('admin/postingan')->with('alert danger', 'Postingan berhasil dihapus!');
        }
    }
}
