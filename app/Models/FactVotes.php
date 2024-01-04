<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactVotes extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'id_tempat',
        'id_vote',
        'id_waktu',
        'id_admin',
        'username',
        'user_email'
    ];

    // Define the relationship with User table
    public function user_admin()
    {
        return $this->belongsTo(DimAdmin::class, 'sk_admin', 'id_admin');
    }
    public function user_partai_vote()
    {
        return $this->belongsTo(DimPartaiVoted::class, 'sk_vote', 'id_vote');
    }
    public function user_tempat()
    {
        return $this->belongsTo(DimTempat::class, 'sk_tempat', 'id_tempat');
    }
    public function dimWaktu()
    {
        return $this->hasMany(DimWaktu::class, 'sk_waktu', 'id_waktu');
    }
}
