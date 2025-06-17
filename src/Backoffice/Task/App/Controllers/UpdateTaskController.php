<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Task\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Task\App\Resources\TaskResource;
use Lightit\Backoffice\Task\Domain\Actions\UpdateTaskAction;



use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskController extends Controller
{
    public function __invoke(Task $task, UpsertTaskRequest $request, UpdateTaskAction $updateTaskAction): JsonResponse
    {
        $task = $updateTaskAction->execute($task, $request->toDto());

        return TaskResource::make($task)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_OK);
    }
}
