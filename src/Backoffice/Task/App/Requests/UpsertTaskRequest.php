<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Enums\TaskStatus;

class UpsertTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const STATUS = 'status';

    public const EMPLOYEE_ID = 'employee_id';

    public const TASK_ID = 'id';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::TITLE => ['required', 'string', 'min:2', 'max:80'],
            self::DESCRIPTION => ['required', 'string', 'min:2'],
            self::STATUS => ['required', Rule::enum(TaskStatus::class)],
            self::EMPLOYEE_ID => ['required', 'exists:employees,id'],
            self::TASK_ID => ['nullable', 'exists:tasks,id'],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->string(self::STATUS)->toString(),
            employeeId: $this->string(self::EMPLOYEE_ID)->toString(),
            taskId: $this->string(self::TASK_ID)->toString()
        );
    }
}
