<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;
    public $notificationBooking;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    
    public function __construct($notificationBooking)
    {
        //
        $this->notificationBooking=$notificationBooking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.appointment');
    }
}
