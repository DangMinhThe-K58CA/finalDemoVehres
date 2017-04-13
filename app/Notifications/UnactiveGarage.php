<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Garage;

class UnactiveGarage extends Notification
{
    use Queueable;

    protected $garage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Garage $garage)
    {
        $this->garage = $garage;
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
            'link' => action('Partner\GarageController@show', $this->garage->id),
            'message' => trans('admin.message.unactive_garage') . $this->garage->name
        ];
    }
}
