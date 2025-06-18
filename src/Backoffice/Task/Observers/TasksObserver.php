<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Observers;

use Illuminate\Support\Facades\Mail;
use Lightit\Backoffice\Employee\App\Notifications\TaskAssigmentNotifications;
use Lightit\Backoffice\Task\Domain\Models\Task;

class TasksObserver
{
    public function created(Task $task): void
    {
        if ($task->employee !== null) {
            Mail::to($task->employee->email)->queue(new TaskAssigmentNotifications($task));
        }
    }

    public function updated(Task $task): void
    {
        if ($task->employee !== null) {
            Mail::to($task->employee->email)->queue(new TaskAssigmentNotifications($task));
        }
    }
}
