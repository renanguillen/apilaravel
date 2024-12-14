<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use SerializesModels;
    
    public $user;

    public function __construct($user)
    {
       $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Welcome to Our App')
                    ->view('emails.welcome');
    }
}
