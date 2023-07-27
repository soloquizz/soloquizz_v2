<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $compte_data;

    public function __construct(array $compte_data)
    {
        $this->compte_data = $compte_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Réinitialisation du mot de passe de votre compte Soloquizz')->view('template.emails.forgot-password')
        ->with('compte_data', $this->compte_data);
    }
}
