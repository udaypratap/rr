<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Storage;

class XkcdMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The email instance.
     *
     * @var Email
     */
    public $maildata;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->maildata = $request;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $maildata = $this->maildata;
        return $this->view('emails.xkcdmail', compact('maildata'))->subject($maildata['subject'])->attach($maildata['storagepath']);
    }
}
