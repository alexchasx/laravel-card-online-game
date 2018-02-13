<?php

namespace App\Events;

use App\Model\Provocation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreateProvocation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $userName;
    /**
     * @var string
     */
    public $rank;
    /**
     * @var boolean
     */
    public $seenRank;

    public function __construct(Provocation $provocation)
    {
        $this->userName = $provocation->user->name;
        $this->rank = $provocation->rank->name;
        $this->seenRank = $provocation->seen_rank;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-provocations');
    }
}
