<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'sk_waktu',
        'hari',
        'kuartal',
        'nama_bulan',
        'tahun',
        'tanggal',
    ];

    // Define the one-to-one relationship with UserVote table
    public function user_tempat()
    {
        return $this->hasMany(FactVotes::class, 'sk_waktu', 'sk_waktu');
    }
}