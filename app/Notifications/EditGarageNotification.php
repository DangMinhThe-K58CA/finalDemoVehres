<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Models\Garage;

class EditGarageNotification extends Notification
{
    use Queueable;

    protected $garage;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Garage $garage, $user)
    {
        $this->garage = $garage;
        $this->user = $user;
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
            
            'garage' => $this->garage->toArray(),
            'user' => $this->user->toArray(),
            'message' => trans('admin.message.request_unactive_garage') . $this->garage->name,
            'link' => route('admin.detailgarage', $this->garage->id),
        ];
    }
}
