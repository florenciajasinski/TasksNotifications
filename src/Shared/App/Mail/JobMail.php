<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Lightit\Shared\App\Job;

class JobMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Job $job)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Mail',
            from: 'admin@lightit.io'
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.job-mail',
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
