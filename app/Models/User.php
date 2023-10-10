<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define the relationship with Feedback table
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'email', 'email');
    }

        // Define the one-to-one relationship with UserVote table
    public function userVote(): HasOne
    {
        return $this->hasOne(UserVote::class, 'user_email', 'email');
    }

        public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

}

