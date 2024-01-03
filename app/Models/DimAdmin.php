<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimAdmin extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'sk_admin',
        'is_admin',
        'username'
    ];

    // Define the one-to-one relationship with UserVote table
    public function user_admin(): HasOne
    {
        return $this->hasOne(FactVotes::class, 'sk_admin', 'sk_admin');
    }
}
