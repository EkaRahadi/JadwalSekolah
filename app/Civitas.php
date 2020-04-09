<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civitas extends Model
{
    protected $table = 'civitas';

    protected $primaryKey = 'id_civitas';

    protected $fillable = ['nama', 'email', 'hp', 'tipe_civitas'];
}
