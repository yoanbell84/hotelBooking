<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Collection;

class DBLog
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $data;
    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request,Collection $data , $action = 'Log')
    {
        //
        $this->request = $request;
        $this->data = $data;
        $this->action = $action;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
