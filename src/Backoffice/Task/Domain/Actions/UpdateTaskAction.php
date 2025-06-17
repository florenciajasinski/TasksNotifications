<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $taskDto): Task
    {
        $task->name = $taskDto->title;
        $task->email = $taskDto->description;
        $task->password = $taskDto->employeeId;

        $task->save();

        return $task;
    }
}
