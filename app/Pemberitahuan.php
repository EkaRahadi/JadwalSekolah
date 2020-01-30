<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    protected $table = 'pemberitahuan';

    protected $primaryKey = 'id_pemberitahuan';

    protected $fillable = ['judul_pemberitahuan', 'isi_pemberitahuan', 'pengirim'];
}
