<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function build()
    {
        return $this->view('mail.order_mail', ['detailsOrder' => $this->orders]);
    }
}
