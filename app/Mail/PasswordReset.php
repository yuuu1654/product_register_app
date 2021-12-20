<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $text1, $text2, $text3, $text4;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text1, $text2, $text3, $text4)
    {
        $this->$text1 = $text1;
        $this->$text2 = $text2;
        $this->$text3 = $text3;
        $this->$text4 = $text4;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.password_reset')
                    ->text('mails.password_reset');
    }
}
