<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$name=$this->faker->unique()->numberBetween(0,20);
        return [
            'grade'=>$name,
            'student_id'=> Student::all()->unique()->random()->id  ,
        ];
    }
}
