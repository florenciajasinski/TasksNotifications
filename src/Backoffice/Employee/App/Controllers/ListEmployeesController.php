<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;
use Lightit\Backoffice\Employee\Domain\Actions\ListEmployeeAction;

class ListEmployeesController extends Controller
{
    public function __invoke(
        ListEmployeeAction $action,
    ): JsonResponse {
        $employees = $action->execute();

        return EmployeeResource::collection($employees)
            ->response();
    }
}
