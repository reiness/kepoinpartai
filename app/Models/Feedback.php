<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    protected $fillable = [
        'nama',
        'feedbacks'
    ];

    // Define the relationship with User table
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
