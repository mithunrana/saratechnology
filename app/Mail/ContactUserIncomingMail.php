<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUserIncomingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    public function __construct($name,$email,$phone,$subject,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $email = $this->email;
        $phone = $this->phone;
        $messages = $this->message;
        $subject = $this->subject;
        $subject = 'Website Customer Query';
        return $this->view('Mail.contact-user-incomeing-mail',compact('name','email','phone','messages','subject'))->subject($subject);
    }
}
