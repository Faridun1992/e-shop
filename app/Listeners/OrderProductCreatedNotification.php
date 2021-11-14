<?php

namespace App\Listeners;

use App\Events\OrderProductCreated;
use App\Models\User;
use App\Notifications\WellComeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderProductCreatedNotification
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
          $admin = User::where('role_id', 2)->get();

          Notification::send($admin, new WellComeNotification($event->orderProduct));
    }
}
