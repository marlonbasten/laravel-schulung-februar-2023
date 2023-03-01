<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Mail\PostCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedMailToAdmin
{
    public function handle(PostCreatedEvent $event): void
    {
        Mail::to('test@test.de')->queue(new PostCreatedMail($event->post));
    }
}
