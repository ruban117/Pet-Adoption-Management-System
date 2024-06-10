<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdoptionRejectEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $otp;
    public function __construct($adaptor,$pet)
    {
        //
        $this->adaptor = $adaptor;
        $this->pet=$pet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('AdoptionReject')
                    ->subject("Adoption Rejection")
                    ->with(array('adaptor'=>$this->adaptor,
                                'pet'=>$this->pet));
    }
}