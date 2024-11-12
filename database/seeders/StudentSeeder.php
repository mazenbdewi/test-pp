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
            'first_name' => 'Clauda',
            'middle_name' => '',
            'last_name' => '',
            'mother_name' => 'Anna',
            'email' => 'clauda@gmail.com',
            'course_id' => 1,
            'address' => 'Jableh ',
            'national_id' => '123456789', 
            'college_name' => 'Informatics ',
            'specialization' => 'Software',
            'overall_grade' => 77.77,
     
        ]);
    }
}
