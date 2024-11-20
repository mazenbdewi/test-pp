<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;


class CourseSeeder extends Seeder
{
    
    public function run(): void
    {
        $courses = ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science','P1 C++'
        ,'P2 JAVA' , 'DB1','DB2'];

        foreach ($courses as $course) {
            Course::create(['name' => $course]);
        }
    }
    }

