<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = $taskDto->taskId ? Task::query()->find($taskDto->taskId) : new Task();
        $task->title = $taskDto->title;
        $task->description = $taskDto->description;
        $task->status = $taskDto->status;
        $task->employee_id = $taskDto->employeeId;

        $task->save();

        return $task;
    }
}
