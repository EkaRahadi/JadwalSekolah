<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'parents';

    protected $primaryKey = 'id_parents';

    protected $fillable = ['nama', 'hp', 'email', 'alamat'];

    public function student(){

        return $this->hasMany('App\Student','id_parents','id_student');
        // return $this->hasMany('App\Student','id_student','id_parents');
    }
}
