<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $m;
    public function __construct($m, $m2)
    {
        //
        $this->m = $m;
        $this->m2 = $m2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ReportSuccessEmail')
                    ->subject("Your Reported Person Is Blocked")
                    ->with(array('m'=>$this->m,
                    'm2'=>$this->m2));
    }
}