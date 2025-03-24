<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class JobFactory extends Factory
{
    
  
    public function definition(): array
    {
        return [
           
            'title' => fake()->jobTitle(),
        'salary' => fake()->numberBetween(30000, 100000),
        'employer_id' => Employer::factory(),
            
        ];
    }
}
