<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Resources\TaskResource;
use Lightit\Backoffice\Task\Domain\Actions\ListTasksAction;

class ListTasksController
{
    public function __invoke(
        ListTasksAction $listTasksAction,
    ): JsonResponse {
        $tasks = $listTasksAction->execute();

        return TaskResource::collection($tasks)
            ->response();
    }
}
