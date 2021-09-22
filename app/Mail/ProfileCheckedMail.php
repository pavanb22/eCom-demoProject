<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ProfileCheckedMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public $user_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $user_id)
    {
        $this->user = $user;
        $this->user_id = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.profile_checked',[
            'url' => env('APP_URL')."/view-user/".$this->user_id,
        ]);
    }
}
