<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Illuminate\Support\Facades\Mail;
use Lightit\Backoffice\Employee\App\Notifications\TaskAssigmentNotifications;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

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


        Mail::to($task->employee->email)->queue(new TaskAssigmentNotifications($task));

        return $task;
    }
}
