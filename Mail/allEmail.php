<?php

namespace App\Mail;

use App\Models\anuncio;
use App\Models\chat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class allEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $chats = chat::where("id", $this->details['id'])->get();
        return $this->subject($this->details['title'])->view("emails.all", compact("chats"));
    }
}
