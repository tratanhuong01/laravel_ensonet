<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoadingTypingMessageOnEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ids;
    public $idn;
    public function __construct($ids, $idn)
    {
        $this->ids = $ids;
        $this->idn = $idn;
    }

    public function broadcastOn()
    {
        return new Channel('test.' . $this->ids . $this->idn);
    }

    public function broadcastAs()
    {
        return 'loadingTypingOn';
    }
}
