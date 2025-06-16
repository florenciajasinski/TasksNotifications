<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Employee\App\Requests\UpsertEmployeeRequest;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employee\Domain\Actions\StoreEmployeeAction;

class StoreEmployeeController extends Controller
{
    public function __invoke(UpsertEmployeeRequest $request, StoreEmployeeAction $storeEmployeeAction): JsonResponse
    {
        $employee = $storeEmployeeAction->execute($request->toDto());

        return EmployeeResource::make($employee)
            ->response()
            ->setStatusCode(JsonResponse::HTTP_CREATED);
    }
}
