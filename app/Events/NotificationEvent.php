<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NotificationEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ids;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function broadcastOn()
    {
        return new Channel('test.' . $this->ids);
    }

    public function broadcastAs()
    {
        return 'tests';
    }
}
