<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTicketNotification extends Notification
{
    use Queueable;

    public $title;
    public $message;
    public $url;
    public $userName;
    public $userAvatar;

    public function __construct($title, $message, $url, $userName, $userAvatar = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->userName = $userName;
        $this->userAvatar = $userAvatar;
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
            'user_name' => $this->userName,
            'user_avatar' => $this->userAvatar,
            'type' => 'new_ticket'
        ];
    }
}
