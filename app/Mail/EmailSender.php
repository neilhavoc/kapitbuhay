<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSender extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\this
     */
    public function build(){
        return $this->from('admnenzs@gmail.com', 'Test Email')
        ->subject($this->mailData['subject'])->view('email.testemail')->with('mailData', $this->mailData);
    }
    
}
