<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'vassilidev',
            'name' => 'Vassili',
            'surname' => 'Joffroy',
            'is_public' => true,
            'email' => 'vassilidevnet@gmail.com',
            'email_verified_at' => now(),
            'description' => 'Website creator',
            'website' => 'https://vassili-joffroy.fr',
            'password' => Hash::make('password'),
        ]);

        if (App::environment(['local', 'staging'])) {
            User::factory()->times(20)->create();
        }
    }
}
