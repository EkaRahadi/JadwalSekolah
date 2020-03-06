<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'tb_option';

    protected $primaryKey = 'id_option';

    protected $fillable = ['nama_option', 'aktif'];
}
