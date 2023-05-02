<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SFMailableReply extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        $Subject = $this->name . ' quiere contactarte';

        return $this->view('emails.reply-template', [
                            'name' => $this->name,
                            'email' => $this->email,
                            'message' => $this->message,
                           ])
                    ->subject($Subject);
    }
}
