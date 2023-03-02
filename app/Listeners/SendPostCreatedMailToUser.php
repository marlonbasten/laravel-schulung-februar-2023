<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Notifications\PostCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendPostCreatedMailToUser
{
    public function handle(PostCreatedEvent $event): void
    {
        Notification::send($event->post->user, new PostCreatedNotification($event->post));
    }
}
