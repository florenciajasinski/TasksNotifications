<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\EmployeeFactory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        EmployeeFactory::new()->createMany(12);
        TaskFactory::new()->createMany(10);
    }
}
