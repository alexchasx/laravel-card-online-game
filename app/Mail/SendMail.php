<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Email, с которого отправляется письмо
     *
     * @var string
     */
    protected $fromEmail;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $fromEmail
     * @param string $message
     */
    public function __construct(string $fromEmail, string $message)
    {
        $this->fromEmail = $fromEmail;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.contact')
            ->with([
                'email' => $this->fromEmail,
                'message' => $this->message,
            ]);
    }
}
