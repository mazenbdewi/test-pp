<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class CourseFactory extends Factory
{
 
    protected $model = Course::class;

   
    public function definition()
    {
        return [
            'name' => $this->faker->word(),  
        ];
    }
}
