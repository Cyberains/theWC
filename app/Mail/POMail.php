<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class POMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$pdf,$purchasedata)
    {
        $this->data = $data;
        $this->pdf = $pdf;
        $this->purchasedata = $purchasedata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data['subject'])->attachData($this->pdf->output(),$this->purchasedata->supplierName->supplier_name.'.pdf')->markdown('emails.poSendMail')->with(['data'=>$this->data]);
    }
}
