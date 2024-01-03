<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimAdmin extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'sk_vote',
        'nama_partai',
        'username'
    ];

    // Define the one-to-many relationship with UserVote table
    public function user_partai_vote()
    {
        return $this->hasMany(FactVotes::class, 'sk_vote', 'sk_vote');
    }
}