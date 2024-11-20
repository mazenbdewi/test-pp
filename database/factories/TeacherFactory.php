<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

 
class TeacherFactory extends Factory
{
    
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(25, 60),  
        ];
    }
}
