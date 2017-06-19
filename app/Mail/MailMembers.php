<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailMembers extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $subject)
    {
        $this->text = $text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('postmaster@terwalle.be')
                    ->view('emails.mailMembers');
    }
}
