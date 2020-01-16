<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id_student';

    protected $fillable = ['nama', 'parent','kelas'];

    public function kelas_siswa(){
        return $this->belongsTo('App\Kelas', 'id_student', 'id_kelas');
    }

    // public function orang_tua(){
    //     return $this->belongsTo('App\OrangTua','id_student','id_parents');
 
    // }
        public function orang_tua()
        {
            return $this->belongsTo('App\OrangTua', 'id_student', 'id_parents');
        }
}
