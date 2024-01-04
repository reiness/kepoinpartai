<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimTempat extends Model
{
    protected $connection = 'secondary_mysql';
    protected $fillable = [
        'sk_tempat',
        'province',
        'city',
    ];

    // Define the one-to-many relationship with FactVotes table
    public function factVotes()
    {
        // Change from 'sk_tempat' to 'id_tempat'
        return $this->hasMany(FactVotes::class, 'id_tempat', 'sk_tempat');
    }
}
