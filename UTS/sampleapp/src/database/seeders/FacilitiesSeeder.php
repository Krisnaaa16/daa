<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitiesSeeder extends Seeder
{
    public function run()
    {
        Facility::insert([
            [
                'name' => 'Laboratory A',
                'type' => 'Laboratory',
                'capacity' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Library Main',
                'type' => 'Library',
                'capacity' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
