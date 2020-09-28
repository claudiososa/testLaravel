<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $create_message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($create_message)
    {
        $this->create_message = $create_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message')
                    //->replyTo($create->message->fromEmail, "Reply $create_message->subject")
                    ->from('claudio@vicomser.com');
    }
}
