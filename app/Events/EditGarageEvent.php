<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Garage;

class EditGarageEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $user;

    public $url;

    public $created_at;

    public $message;

    public $notiId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $notiId, $url, $message, $created_at)
    {
        
        $this->user = $user;
        $this->url = $url;
        $this->message = $message;
        $this->created_at = $created_at;
        $this->notiId = $notiId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new channel('notification');
    }
}
