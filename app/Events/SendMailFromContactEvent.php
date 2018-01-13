<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMailFromContactEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    protected $userEmail;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $userEmail
     * @param string $message
     */
    public function __construct(string $userEmail, string $message)
    {
        $this->userEmail = $userEmail;
        $this->message = $message;
    }

    /**
     * Получить каналы, на которых должно транслироваться событие.
     *
     * @return Channel | array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
