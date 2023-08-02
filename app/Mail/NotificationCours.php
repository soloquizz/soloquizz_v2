<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationCours extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cours_data;

    public function __construct(array $cours_data)
    {
        $this->cours_data = $cours_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Soloquizz-Nouveau support de cours')->view('template.notification.notification-cours')
        ->with('cours_data', $this->cours_data);
    }
}
