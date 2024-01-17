<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnershipMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details, $bccEmail, $bccName, $pathProposal;

    /**
     * Create a new message instance.
     */
    public function __construct($details, $bccEmail, $bccName, $pathProposal)
    {
        $this->details      = $details;
        $this->bccEmail     = $bccEmail;
        $this->bccName      = $bccName;
        $this->pathProposal = $pathProposal;
    }

    public function build()
    {
        $mail = $this->from('admin@my-co.space', 'Admin - MyCo')
        ->subject('My Mail')
        ->view('email.partnershipEmail')
        ->bcc($this->bccEmail, $this->bccName);

        if($this->pathProposal){
            $mail->attach($this->pathProposal);
        }
        
        // if ($this->pathProposal && is_array($this->pathProposal)) {
        //     foreach ($this->pathProposal as $path) {
        //         if (file_exists($path)) {
        //             $mail->attachFromStorage($path, pathinfo($path, PATHINFO_FILENAME) . '.' . pathinfo($path, PATHINFO_EXTENSION));
        //         }
        //     }
        // }

        return $mail;
    }
}
