<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;
 /**
 * Bevat de gegevens
 * van het contactformulier.
 */
    public $data;
  /**
 * Ontvangt de gegevens
 * van het contactformulier
 * en maakt deze beschikbaar
 * voor de email.
 */
    public function __construct($data)
    {
        $this->data = $data;
    }
  

    /**
 * Bouwt de email op
 * voor contactberichten.
 *
 * Geeft een onderwerp
 * aan de email en gebruikt
 * de contact view.
 */
    public function build()
    {
        return $this->subject('Nieuw contactbericht')
            ->view('emails.contact');
    }
}