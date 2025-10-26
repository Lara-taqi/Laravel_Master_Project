<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\BookingUser;
class BookingStatusChanged extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct(BookingUser $booking)
    {
        $this->booking = $booking;
    }

        public function build()
    {
        return $this->subject('Your Booking Status Updated')
                    ->markdown('emails.booking.status');
    }
}

