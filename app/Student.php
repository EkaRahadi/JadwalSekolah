<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id_student';

    protected $fillable = ['nama', 'parent'];

    public function parent() {

        return $this->belongsTo('App\Parent');
    }
}
