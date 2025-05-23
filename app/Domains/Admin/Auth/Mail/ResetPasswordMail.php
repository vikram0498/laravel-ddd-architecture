<?php

namespace App\Domains\Admin\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$subject;
    protected $reset_password_url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$reset_password_url,$subject)
    {
        $this->name = $name;
        $this->reset_password_url = $reset_password_url;
        $this->subject = $subject;

    }

   /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Auth::emails.auth.reset-password', [
                'name' => $this->name,
                'reset_password_url' => $this->reset_password_url,
            ])->subject($this->subject);
    }
}
