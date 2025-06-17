<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Employee\Domain\Models\Employee;


/**
* @extends Factory<Employee>
*/

class EmployeeFactory extends Factory
{
    /**
     * @var class-string<\Lightit\Backoffice\Employee\Domain\Models\Employee>
     */
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
