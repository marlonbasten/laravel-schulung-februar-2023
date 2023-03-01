<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly Post $post
    ) { }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ein neuer Post wurde erstellt',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.post.created',
            with: [
                'post' => $this->post,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
