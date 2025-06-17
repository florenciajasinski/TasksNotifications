<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Lightit\Backoffice\Employee\App\Resources\EmployeeResource;

/**
 * @property-read \Lightit\Backoffice\Task\Domain\Models\Task $resource
 */
class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'status' => $this->resource->status,
            'employee' => EmployeeResource::make($this->whenLoaded('employee')),
        ];
    }
}
