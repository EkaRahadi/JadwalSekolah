<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    protected $fillable = ['nama_kelas'];

    public function kelas() {

        return $this->hasMany('App\Jadwal');
    }

    public function student() {

        return $this->hasMany('App\Student');
    }
}
