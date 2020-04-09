<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $table = 'postingan';

    protected $primaryKey = 'id_postingan';

    protected $fillable = ['judul', 'isi', 'kategori', 'gambar'];
}
