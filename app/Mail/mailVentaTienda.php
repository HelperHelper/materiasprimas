<?php

namespace App\Mail;


use App\User;
use App\compra;
use App\mediodepago;
use App\factura;
use App\tienda;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailVentaTienda extends Mailable
{
    use Queueable, SerializesModels;


    public $compra;
    public $user;
    public $mediodepago;
    public $factura;
    public $tienda;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(compra $compra, User $user, mediodepago $mediodepago, factura $factura, tienda $tienda)
    {
        $this->compra= $compra;
        $this->user=$user;
        $this->mediodepago=$mediodepago;
        $this->factura=$factura;
        $this->tienda=$tienda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mensajetiendas');
    }
}
