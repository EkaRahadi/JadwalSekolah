<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    protected $table = 'perlengkapan';

    protected $primaryKey = 'id_perlengkapan';

    protected $fillable = ['perlengkapan'];

    public function detailPelajaran() {
        return $this->hasMany('App\DetailPelajaran', 'id_perlengkapan');
    }
}
