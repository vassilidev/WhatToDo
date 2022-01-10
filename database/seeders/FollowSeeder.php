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
        /*$allUsers = User::all();

        foreach ($allUsers as $user) {
            $usersToFollow = $allUsers->random(
                rand(0, $allUsers->count() / 2)
            )->where('id', '!=', $user->id);

            foreach ($usersToFollow as $userToFollow) {
                $user->follow($userToFollow);
            }
        }*/
    }
}
