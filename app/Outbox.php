<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    protected $table = 'outbox';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
