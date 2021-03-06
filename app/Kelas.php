<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    protected $fillable = ['nama_kelas'];

    public function jadwal(){
        // return $this->hasMany('App\Jadwal', 'id_jadwal', 'id_kelas');
        return $this->hasMany('App\Jadwal', 'id_kelas');
    }

    public function student(){
        return $this->hasMany('App\Student', 'id_kelas');
    }

    public function jadwalPelajaran() {
        return $this->hasMany('App\JadwalPelajaran', 'id_kelas');
    }
}
