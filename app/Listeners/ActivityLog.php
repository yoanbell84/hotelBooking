<?php

namespace App\Listeners;

use App\Events\CreatedBooking;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Events\DBLog;

class ActivityLog
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
     * @param  DBLog  $event
     * @return void
     */
    public function handle(DBLog $event)
    {
        //

        \App\ActivityLog::create([
            'action'=> $event->action,
            'data'=> $event->data->toJson(),
            'user_agent' => $event->request->userAgent(),
            'origin' => $event->request->userAgent(),
            'referer' => $event->request->userAgent()
        ]);

    }
}
