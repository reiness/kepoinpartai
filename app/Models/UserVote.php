<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $fillable = ['user_email', 'id_partai'];

    // Define the relationship with User and ProfilePartai tables
    public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function partai()
    {
        return $this->belongsTo(ProfilePartai::class, 'id_partai', 'id');
    }
}
