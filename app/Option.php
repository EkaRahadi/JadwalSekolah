<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';

    protected $primaryKey = 'id_option';

    protected $fillable = ['nama_option', 'aktif'];
}
