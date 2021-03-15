<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatNorlEvent implements ShouldBroadcastNow
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
        return 'chatNorl';
    }
}
