<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Course;


class TeacherSeeder extends Seeder
{
    
    public function run(): void
    {
        Course::factory()->count(5)->create();
 
        $teachers = Teacher::factory()->count(10)->create();

        
        foreach ($teachers as $teacher) {
            $courses = Course::all()->random(3);  
            $teacher->courses()->sync($courses);  
        }
        }
    }

