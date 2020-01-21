<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'parents';

    protected $primaryKey = 'id_parents';

    protected $fillable = ['nama', 'hp', 'email','alamat'];
    
    public function siswa()
    {
        // $this->hasMany('App\Student', 'id_parents', 'id_student');
        $this->hasMany('App\Student', 'id_parents');
    }
}
