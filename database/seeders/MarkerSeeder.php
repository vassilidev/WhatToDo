<?php

namespace Database\Seeders;

use App\Models\Marker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local', 'staging'])) {
            Marker::factory()->times(50)->create();
        }
    }

}
