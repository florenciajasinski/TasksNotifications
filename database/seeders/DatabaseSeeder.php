<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\EmployerFactory;
use Database\Factories\JobFactory;
use Database\Factories\TagFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Lightit\Shared\App\Employer;
use Lightit\Shared\App\Job;
use Lightit\Shared\App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        JobFactory::new()->createMany(12);
        EmployerFactory::new()->createMany(12);
        TagFactory::new()->createMany(12);

    }
}
