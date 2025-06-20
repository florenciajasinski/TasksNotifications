<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Enums\TaskStatus;
use Lightit\Backoffice\Task\Domain\Models\Task;

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
            self::EMPLOYEE_ID => ['required', Rule::exists(Employee::class, 'id')],
            self::TASK_ID => ['sometimes', Rule::exists(Task::class, 'id')],
        ];
    }

    public function toDto(): TaskDto
    {
        /** @var TaskStatus $status */
        $status = $this->enum(self::STATUS, TaskStatus::class);

        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $status,
            employeeId: $this->integer(self::EMPLOYEE_ID),
            taskId: $this->integer(self::TASK_ID)
        );
    }
}
