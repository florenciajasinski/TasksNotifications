<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Policies;

use Illuminate\Auth\Access\Response;
use Lightit\Shared\App\User;
use Lightit\Shared\App\Job;

class JobPolicy
{
    public function edit($user, Job $job): bool|Response
{
    $sharedUser = User::find($user->id);
    if (!$sharedUser) {
        return Response::deny('User not found.');
    }

    return $job->employer->user->is($sharedUser)
        ? Response::allow()
        : Response::deny('You do not own this job.');
}



}
