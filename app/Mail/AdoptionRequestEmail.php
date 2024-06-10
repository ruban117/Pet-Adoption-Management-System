<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdoptionRequestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $otp;
    public function __construct($donor,$adaptor,$pet)
    {
        //
        $this->adaptor = $adaptor;
        $this->donor = $donor;
        $this->pet=$pet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('RequestMail')
                    ->subject("Request For Pet Adoption")
                    ->with(array('adaptor'=>$this->adaptor,
                                'donor'=>$this->donor,
                                'pet'=>$this->pet));
    }
}