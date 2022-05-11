<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$name=$this->faker->unique()->name(60);
        return [
            'fullname'=>$name,
            'dni'=>$this->faker->unique->randomDigit(8),
            'phone'=>$this->faker->unique->phoneNumber(9),

        ];
    }
}
