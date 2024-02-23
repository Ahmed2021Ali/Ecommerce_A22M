<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;

 public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('mail.subscribe', ['subscribe' => $this->message]);
    }
}
