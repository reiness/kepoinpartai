<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePartai extends Model
{


    protected $table = 'profile_partai';

    protected $primaryKey = 'id_partai';
    protected $fillable = [
        'nama_partai',
        'ketua_umum',
        'jumlah_kasus_suap_gratifikasi',
        'nominal_suap_gratifikasi',
        'nominal_kasus_korupsi',
        'jumlah_kasus_korupsi',
    ];
    
}
