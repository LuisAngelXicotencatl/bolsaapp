<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaTomadaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $idCorreo;
    public $titulo;
    public $fechaEvento;
    public $lugar;
    public $fechaCita;
    public $hora;
    public $empresa;

    public function __construct($idCorreo, $titulo,$fechaEvento,$lugar,$fechaCita,$hora,$empresa)
    {
        $this->idCorreo = $idCorreo;
        $this->titulo = $titulo;
        $this->fechaEvento = $fechaEvento;
        $this->lugar = $lugar;
        $this->fechaCita= $fechaCita;
        $this->hora = $hora;
        $this->empresa = $empresa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return$this->view('emails.cita-tomada')
                    ->subject('Cita tomada')
                    ->with([
                        'idCorreo' => $this->idCorreo,
                        'titulo' => $this->titulo,
                        'fechaEvento' => $this->fechaEvento,
                        'lugar' => $this->lugar,
                        'fechaCita' => $this->fechaCita,
                        'hora' => $this->hora,
                        'empresa' => $this->empresa,
                    ]);
        /*return $this->view('view.name');*/
    }
}
