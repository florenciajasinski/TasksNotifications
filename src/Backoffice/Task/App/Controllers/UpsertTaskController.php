<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Task\App\Resources\TaskResource;
use Lightit\Backoffice\Task\Domain\Actions\UpsertTaskAction;

class UpsertTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpsertTaskAction $upsertTaskAction): JsonResponse
    {
        $task = $upsertTaskAction->execute($request->toDto());

        return TaskResource::make($task)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_OK);
    }
}
