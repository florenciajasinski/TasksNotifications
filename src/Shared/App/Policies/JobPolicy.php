<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Policies;

use Illuminate\Auth\Access\Response;
use Lightit\Shared\App\Job;
use Lightit\Shared\App\User;

class JobPolicy
{
    public function edit(User $user, Job $job): bool|Response
    {
        return $job->employer->user->is($user)
            ? Response::allow()
            : Response::deny('You do not own this job.');
    }
}
