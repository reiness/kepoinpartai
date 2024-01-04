<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactVotes extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'id_tempat', // Change from 'sk_tempat' to 'id_tempat'
        'sk_vote',
        'sk_waktu',
        'sk_admin',
        'username',
        'user_email'
    ];

    // Define the relationship with User table
    public function user_admin()
    {
        return $this->belongsTo(DimAdmin::class, 'sk_admin', 'sk_admin');
    }

    public function user_partai_vote()
    {
        return $this->belongsTo(DimPartaiVoted::class, 'sk_vote', 'sk_vote');
    }

    // Change from 'sk_tempat' to 'id_tempat'
    public function dimTempat()
    {
        return $this->belongsTo(DimTempat::class, 'id_tempat', 'sk_tempat');
    }

    public function user_waktu()
    {
        return $this->hasMany(DimWaktu::class, 'sk_waktu', 'sk_waktu');
    }
}
