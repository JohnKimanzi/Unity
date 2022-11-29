<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadMail extends Mailable
{
    use Queueable, SerializesModels;

    private $e_body;
    private $e_subject;
    private $e_from;
    private $file_path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // dd($data);
        $this->e_body=$data['body'];
        $this->e_subject=$data['subject'];
        $this->e_from=$data['from'];
        $this->file_path=$data['file_path'];
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->file_path);
        return $this->from($this->e_from)
            ->subject($this->e_subject)
            ->view('emails.test')
            // ->attach($this->file_path, [
            //     'as' => 'name.pdf',
            //     'mime' => 'application/pdf',
            // ])
            ->attach($this->file_path)
            ->with(['body'=>$this->e_body]);
    }
}
