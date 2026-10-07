<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketStatusUpdatedNotification extends Notification
{
    use Queueable;

    public $title;
    public $message;
    public $url;
    public $updaterName;
    public $updaterAvatar;

    public function __construct($title, $message, $url, $updaterName, $updaterAvatar = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->updaterName = $updaterName;
        $this->updaterAvatar = $updaterAvatar;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'user_name' => $this->updaterName,
            'user_avatar' => $this->updaterAvatar,
            'type' => 'status_update'
        ];
    }
}
