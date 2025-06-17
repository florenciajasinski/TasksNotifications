<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employee\Domain\Actions\ListEmployeesAction;

class ListEmployeesController extends Controller
{
    public function __invoke(
        ListEmployeesAction $listEmployeesAction,
    ): JsonResponse {
        $employees = $listEmployeesAction->execute();

        return EmployeeResource::collection($employees)
            ->response();
    }
}
