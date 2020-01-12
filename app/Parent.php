<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';

    protected $primaryKey = 'id_parents';

    protected $fillable = ['nama', 'hp', 'email', 'alamat'];

    public function student() {

        return $this->hasMany('App\Student');
    }
}
