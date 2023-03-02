<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly Post $post,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hallo, '.$this->post->user->name)
            ->line('vielen Dank für deinen Post!')
            ->action('Post bearbeiten', route('post.edit', $this->post->id))
            ->line('Schönen Tag noch!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
