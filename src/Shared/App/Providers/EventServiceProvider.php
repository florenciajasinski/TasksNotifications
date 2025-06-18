<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Lightit\Backoffice\Task\Events\TaskAssigned;
use Lightit\Backoffice\Task\Listeners\SendTaskAssignedNotification;
use Lightit\Shared\App\Events\TestEvent;
use Lightit\Shared\App\Listeners\TestListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TestEvent::class => [
            TestListener::class,
        ],
        TaskAssigned::class => [
            SendTaskAssignedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(
            TaskAssigned::class,
            SendTaskAssignedNotification::class
        );
    }

    public function register(): void
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
