<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPelajaran extends Model
{
    protected $table = 'tb_detail_pelajaran';

    protected $primaryKey = 'id_detail_pelajaran';

    protected $fillable = ['perlengkapan'];

    public function jadwalPelajaran() {
        return $this->hasMany('App\JadwalPelajaran', 'id_detail_pelajaran');
    }
}
