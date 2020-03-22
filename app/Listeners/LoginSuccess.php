<?php

namespace App\Listeners;

use App\AccessControl;
use Illuminate\Auth\Events\Login;
use IlluminateAuthEventsLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class LoginSuccess
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $accessSuccess = new AccessControl();

        $accessSuccess->ip = request()->ip();
        $accessSuccess->user_id = $event->user->id;
        $accessSuccess->access_timestamp = now();
        $accessSuccess->type = 'C';

        $accessSuccess->save();

    }
}
