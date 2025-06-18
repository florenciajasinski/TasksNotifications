<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Lightit\Backoffice\Task\Domain\Models\Task;

class TaskAssigmentNotifications extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Task $task)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Task has been assign to you | ' . $this->task->created_at->format('Y-m-d'),
            from: 'DoNotReply@lightit.io'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.assigned-task',
            with: ['task' => $this->task]
        );
    }

    /**
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
