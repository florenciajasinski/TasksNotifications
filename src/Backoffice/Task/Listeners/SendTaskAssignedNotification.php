<?php

namespace Lightit\Backoffice\Task\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Lightit\Backoffice\Employee\App\Notifications\TaskAssigmentNotifications;
use Lightit\Backoffice\Task\Events\TaskAssigned;
use Illuminate\Support\Facades\Mail;

class SendTaskAssignedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskAssigned $event): void
    {
        $task = $event->task;

        Mail::to($task->employee->email)->queue(new TaskAssigmentNotifications($task));
    }
}
