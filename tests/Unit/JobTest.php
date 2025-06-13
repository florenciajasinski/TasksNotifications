<?php

declare(strict_types=1);
namespace Tests\Unit;
use \Lightit\Shared\App\Employer;
use Lightit\Shared\App\Job;
use Lightit\Shared\App\Tag;

it('it belongs to an employer', function () {
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    expect($job->employer)->is($employer)->toBeTrue();

});

it('it has many tags', function () {
    $job = Job::factory()->create();
    $tag = Tag::create(['name' => 'example']);

    $job->tags()->attach($tag->id);

    expect($job->tags()->count())->toBe(1);
});

