<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Shared\App\User;


/**
 * @extends Factory<\Lightit\Shared\App\Employer>
 */
class EmployerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'user_id' => User::factory()
        ];
    }
}
