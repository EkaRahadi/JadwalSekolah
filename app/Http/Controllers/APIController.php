<?php

namespace App\Http\Controllers;

use App\DetailPelajaran;
use App\JadwalPelajaran;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getJadwalPelajaran(Request $request){
        $id_kelas = $request->id_kelas;

        $jadwal_pelajaran = JadwalPelajaran::where('id_kelas', $id_kelas)->get();

        $data = [];

        if(!empty($jadwal_pelajaran)){

            foreach($jadwal_pelajaran as $jdwl){
                $perlengkapan = DetailPelajaran::where('id_jadwal_pelajaran', $jdwl->id_jadwal_pelajaran)->get();

                $data2 = [];

                foreach($perlengkapan as $perl){
                    $data2[]= $perl->perlengkapan->perlengkapan;
                }

                $data[] = [
                    'hari' => $jdwl->nama_hari,
                    'kelas' => $jdwl->nama_kelas,
                    'pelajaran' => $jdwl->pelajaran->pelajaran,
                    'perlengkapan' => $data2
                ];
            }

            return response()->json([
                'status' => 1,
                'message' => "Success!",
                'jadwal_pelajaran' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => "Jadwal Pelajaran Not Found!",
                'jadwal_pelajaran' => $data
            ], 200);
        }
    }
}
