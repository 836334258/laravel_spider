<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpiderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $msg, string $view)
    {
        $this->msg = $msg;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.spider.'.$this->view)
            ->with([
                'now' => now()->toDateTimeString(),
                'msg' =>$this->msg
            ]);
    }
}
