<?php

namespace App\Mail;

use App\Models\Pto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PtoApplication extends Mailable
{
    use Queueable, SerializesModels;
    private $pto, $recipient_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pto $pto, $recipient_name)
    {
        $this->recipient_name=$recipient_name;
        $this->pto=$pto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.pto.application')->with(['pto'=>$this->pto, 'recipient_name'=>$this->recipient_name])->subject('Unity Updates: New PTO Application Alert');
    }
}
