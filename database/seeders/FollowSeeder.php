<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers = User::all();
        $nbrUser = $allUsers->count();

        foreach ($allUsers as $user) {
            $followingUsers = $allUsers->random(rand(0, $nbrUser));
            foreach ($followingUsers as $userToFollow) {
                $user->follow($userToFollow);
            }
        }
    }
}
