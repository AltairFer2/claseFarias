<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;

class CommentPosted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Object $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comment Posted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view:'groceries.emails',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public $comment;



    public function build()
{
    echo($this->comment);
    return $this->subject('Comment Posted') // Opcional si ya lo has definido en envelope()
                ->replyTo($this->comment->email) // Usar el email del comentarista como dirección de respuesta
                ->view('groceries.detail-product')
                ->with([
                    'comment' => $this->comment,
                ]);
}

}
