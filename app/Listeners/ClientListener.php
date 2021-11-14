<?php

namespace App\Listeners;

use App\Events\OrderProductCreated;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ClientListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderProductCreated $event)
    {
        $user = Auth::user();
        Notification::send($user, new WelcomeEmailNotification($event->orderProduct));
    }
}
