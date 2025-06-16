<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Lightit\Shared\App\Job;

class TranslateJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public Job $job)
    {
    }

    public function handle(): void
    {
        logger('Translating job' . $this->job->id . ' to Spanish');
    }
}
