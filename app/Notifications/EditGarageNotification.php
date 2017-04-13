<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class EditGarageNotification extends Notification
{
    use Queueable;

    protected $instance;

    protected $user;

    protected $url;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($instance, $user, $url, $message)
    {
        $this->instance = $instance;
        $this->user = $user;
        $this->url = $url;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
            'instance' => $this->instance->toArray(),
            'user' => $this->user->toArray(),
            'message' => $this->message,
            'link' => $this->url,
        ];
    }
}
