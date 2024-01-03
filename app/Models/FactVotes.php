<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $connection = 'secondary_mysql'
    protected $fillable = [
        'sk_tempat',
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
}
