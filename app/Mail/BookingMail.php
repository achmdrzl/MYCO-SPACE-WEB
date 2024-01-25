<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details, $bccEmail, $bccName, $bccEmail2, $bccName2;
    /**
     * Create a new message instance.
     */
    public function __construct($details, $bccEmail, $bccName, $bccEmail2, $bccName2)
    {
        $this->details      = $details;
        $this->bccEmail     = $bccEmail;
        $this->bccName      = $bccName;
        $this->bccEmail2    = $bccEmail2;
        $this->bccName2     = $bccName2;
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from('admin@my-co.space', 'Admin - MyCo')
        ->subject('[MyCo] Booking Confirmation')
        ->view('email.bookingEmail')
        ->bcc($this->bccEmail, $this->bccName)
        ->bcc($this->bccEmail2, $this->bccName2);
    }
}
