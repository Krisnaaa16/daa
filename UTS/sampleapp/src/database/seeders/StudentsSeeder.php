<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        Student::insert([
            [
                'name' => 'Ahmad Zaki',
                'email' => 'zaki@student.univ.ac.id',
                'gender' => 'male',
                'date_of_birth' => '2000-05-12',
                'program' => 'Computer Science',
                'gpa' => 3.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@student.univ.ac.id',
                'gender' => 'female',
                'date_of_birth' => '1999-08-23',
                'program' => 'Information Systems',
                'gpa' => 3.6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
