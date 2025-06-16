<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * @return array{id: int, name: string, email: string}
     */
    public function toArray(Request $request): array
    {
        $employee = (object) $this->resource;

        return [
            'id' => (int) $employee->id,
            'name' => (string) $employee->name,
            'email' => (string) $employee->email,
        ];
    }
}
