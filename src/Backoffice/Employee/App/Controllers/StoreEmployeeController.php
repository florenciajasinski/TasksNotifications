<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employee\App\Requests\StoreEmployeeRequest;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employee\Domain\Actions\StoreEmployeeAction;

class StoreEmployeeController
{
    public function __invoke(
        StoreEmployeeRequest $storeEmployeeRequest,
        StoreEmployeeAction $storeEmployeeAction,
    ): JsonResponse {
        $employee = $storeEmployeeAction->execute($storeEmployeeRequest->toDto());

        return EmployeeResource::make($employee)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_CREATED);
    }
}
