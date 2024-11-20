<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;


class CourseSeeder extends Seeder
{
    
    public function run(): void
    {
        $courses = ['Mathematics', 'Physics', 'Chemistry', 'Biology', 'Computer Science'];

        foreach ($courses as $course) {
            Course::create(['name' => $course]);
        }
    }
    }

