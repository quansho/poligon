<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserEmail;
use Illuminate\Support\Facades\Mail;

class WelcomeNewUserListener
{
    public function handle($event)
    {
        Mail::to($event->newUser->email)->send(new WelcomeNewUserEmail());
    }
}
