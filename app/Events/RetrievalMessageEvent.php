<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RetrievalMessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ids;
    public $idtn;
    public function __construct($ids, $idtn)
    {
        $this->ids = $ids;
        $this->idtn = $idtn;
    }

    public function broadcastOn()
    {
        return new Channel('test.' . $this->ids . $this->idtn);
    }

    public function broadcastAs()
    {
        return 'retrievalMessage';
    }
}
