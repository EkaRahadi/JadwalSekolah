<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    protected $table = 'profile_sekolah';

    protected $primaryKey = 'id_profile_sekolah';

    protected $fillable = ['nama_sekolah', 'kontak', 'alamat', 'link_website', 'visi_misi'];
}
