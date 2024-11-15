<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;

class LecturersSeeder extends Seeder
{
    public function run()
    {
        Lecturer::insert([
            [
                'name' => 'Dr. Budi Santoso',
                'email' => 'budi@univ.ac.id',
                'department' => 'Computer Science',
                'research_publications' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prof. Siti Aminah',
                'email' => 'siti@univ.ac.id',
                'department' => 'Information Systems',
                'research_publications' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
