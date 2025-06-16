<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Employee\Domain\Models\Employee;

/**
 * @extends Factory<\Lightit\Model>
 */
class EmployeeFactory extends Factory
{

    protected $model = Employee::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
        ];
    }
}
