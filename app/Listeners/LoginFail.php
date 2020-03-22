<?php

namespace App\Listeners;

use App\AccessControl;
use IlluminateAuthEventsFailed;
use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginFail
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $accessSuccess = new AccessControl();

        $accessSuccess->ip = request()->ip();
        $accessSuccess->user_id = $event->user ? $event->user->id : null;
        $accessSuccess->access_timestamp = now();
        $accessSuccess->type = 'I';

        $accessSuccess->save();
    }
}
