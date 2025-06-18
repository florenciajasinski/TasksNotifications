<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Lightit\Backoffice\Employee\App\Notifications\TaskAssigmentNotifications;
use Lightit\Backoffice\Task\Events\TaskAssigned;

class SendTaskAssignedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(TaskAssigned $event): void
    {
        $task = $event->task;

        Mail::to($task->employee->email)->queue(new TaskAssigmentNotifications($task));
    }
}
