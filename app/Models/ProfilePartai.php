<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePartai extends Model
{
    // protected $primaryKey = 'id_partai';
    protected $fillable = [
        'jumlah_kasus_suap_gratifikasi',
        'nominal_suap_gratifikasi',
        'nominal_kasus_korupsi',
        'jumlah_kasus_korupsi',
    ];
}
