<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class getListe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->input  = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $arr = $this->input->arr;
        return $this->from('romain.rollo92@gmail.com')
                    ->view('email.liste.getListe',compact('arr'));
    }
}
