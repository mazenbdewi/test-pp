<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    
    public function run(): void
    {
        Student::create([
            'name' => 'Clauda',
            'email' => 'clauda@gmail.com',
     
        ]);
    }
}
