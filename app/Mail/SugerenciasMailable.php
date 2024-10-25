<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
class SugerenciasMailable extends Mailable

{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Sugerencias;
    public function __construct($Sugerencias)
    {
        $this->Sugerencias = $Sugerencias;
    }

    /*public function envelope(): envelope
    {
        return new envelope(
            from: new Address('deycek82@gmail.com', 'Luis Xicotencatl'),
            subject: "Sugerencias",
        );
    }*/

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->view('view.name');*/
        return$this->view('emails.Sugerencias')
                    ->subject('Nuevo comentario-sugerencia del sistema')
                    ->with([
                        'Sugerencias' => $this->Sugerencias,
                    ]);
    }

    
}
