<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;
use Lightit\Backoffice\Task\Events\TaskAssigned;

class UpdateTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        if ($taskDto->taskId) {
            $task = Task::query()->find($taskDto->taskId);
            if (!$task) {
                throw new \Exception("Task not found");
            }
        } else {
            $task = new Task();
        }

        $task->title = $taskDto->title;
        $task->description = $taskDto->description;
        $task->status = $taskDto->status;
        $task->employee_id = $taskDto->employeeId;

        $task->save();

        TaskAssigned::dispatch($task);


        return $task;
    }
}
