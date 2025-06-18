<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpsertTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        /** @var Task $task */
        $task = Task::query()->find($taskDto->taskId) ?? new Task();

        $task->title = $taskDto->title;
        $task->description = $taskDto->description;
        $task->status = $taskDto->status->value;
        $task->employee_id = $taskDto->employeeId;

        $task->save();

        return $task;
    }
}
