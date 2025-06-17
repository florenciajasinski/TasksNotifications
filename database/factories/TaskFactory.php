<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Task\Domain\Models\Task;

class TaskFactory extends Factory
{

    /**
     * @var class-string<\Lightit\Backoffice\Task\Domain\Models\Task>
     */
    protected $model = Task::class;
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'status' => 'pending',
            'employee_id' => EmployeeFactory::new()->create()->id
        ];
    }
}
