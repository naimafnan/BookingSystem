<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationDoctorCancelBooking extends Mailable
{
    use Queueable, SerializesModels;
    public $notificationCancelBookingbyDoctor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificationCancelBookingbyDoctor)
    {
        //
        $this->notificationCancelBookingbyDoctor=$notificationCancelBookingbyDoctor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('FomemaBooking@example.com')
        ->view('emails.appointmentCancelbyDoctor');
    }
}
