<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SubscribeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

public  $email;
    public function __construct($email)
    {
        $this->email=$email;
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new \App\Mail\SubscribeEmail('شكرا لاشتراكك في النشرة الاخبارية A22m سوف نرسل لك كل جديد من منتجاتنا '));
    }
}
