<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Task\App\Resources\TaskResource;
use Lightit\Backoffice\Task\Domain\Actions\UpdateTaskAction;

class UpdateTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpdateTaskAction $updateTaskAction): JsonResponse
    {
        $task = $updateTaskAction->execute($request->toDto());

        return TaskResource::make($task)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_OK);
    }
}
