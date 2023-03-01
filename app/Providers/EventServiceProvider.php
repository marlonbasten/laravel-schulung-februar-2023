<?php

namespace App\Providers;

use App\Events\PostCreatedEvent;
use App\Listeners\SendPostCreatedMailToAdmin;
use App\Listeners\SendPostCreatedMailToUser;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        PostCreatedEvent::class => [
            SendPostCreatedMailToUser::class,
            SendPostCreatedMailToAdmin::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
