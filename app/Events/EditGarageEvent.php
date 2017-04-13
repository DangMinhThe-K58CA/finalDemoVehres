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

    public $garage;

    public $url;

    public $created_at;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, Garage $garage, $created_at)
    {
        $this->user = $user;
        $this->garage = $garage;
        $this->url = route('admin.detailgarage', $this->garage->id);
        $this->created_at = $created_at;
        $this->message = trans('admin.message.request_unactive_garage') . $this->garage->name;
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
