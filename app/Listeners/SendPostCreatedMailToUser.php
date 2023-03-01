<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedMailToUser
{
    public function handle(PostCreatedEvent $event): void
    {
        //...
    }
}
