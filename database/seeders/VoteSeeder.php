<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserVote;
use App\Models\User;

class VoteSeeder extends Seeder
{
    public function run()
    {
        // Ambil seluruh user_email yang ada pada model User
        $userEmails = User::pluck('email')->all();

        // Buat seeder dengan nilai acak
        foreach ($userEmails as $userEmail) {
            UserVote::create([
                'user_email' => $userEmail,
                'id_partai' => rand(1, 18),
            ]);
        }
    }
}
