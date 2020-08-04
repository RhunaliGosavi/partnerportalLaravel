<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DsaLeadMail extends Mailable
{
    use Queueable, SerializesModels;
    public $dsaLead;
    public $documents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dsaLead, $documents)
    {
        $this->dsaLead = $dsaLead;
        $this->documents = $documents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('DSA Lead Generate')
                    // ->from('john@webslesson.info')
                    ->view('email.dsa_lead_mail')
                    ->with('dsaLead', $this->dsaLead)
                    ->attach($this->documents['address_proof_doc']->getRealPath(),
                        [
                            'as' => $this->documents['address_proof_doc']->getClientOriginalName(),
                            'mime' => $this->documents['address_proof_doc']->getClientMimeType(),
                        ])
                    ->attach($this->documents['pan_card_doc']->getRealPath(),
                        [
                            'as' => $this->documents['pan_card_doc']->getClientOriginalName(),
                            'mime' => $this->documents['pan_card_doc']->getClientMimeType(),
                        ]);
    }
}
