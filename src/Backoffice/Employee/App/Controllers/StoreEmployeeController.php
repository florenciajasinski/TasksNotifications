<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Employee\App\Requests\CreateEmployeeRequest;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employee\Domain\Actions\StoreEmployeeAction;

class StoreEmployeeController
{
    public function __invoke(
        CreateEmployeeRequest $storeEmployeeController,
        StoreEmployeeAction $storeEmployeeAction,
    ): JsonResponse {
        $employee = $storeEmployeeAction->execute($storeEmployeeController->toDto());

        return EmployeeResource::make($employee)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_CREATED);
    }
}
