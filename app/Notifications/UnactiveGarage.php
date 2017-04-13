<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UnactiveGarage extends Notification
{
    use Queueable;

    protected $instance;

    protected $url;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($instance, $url, $message)
    {
        $this->instance = $instance;
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
            // link route edit garage of partner
            'link' => $this->url,
            'message' => $this->message,
        ];
    }
}
