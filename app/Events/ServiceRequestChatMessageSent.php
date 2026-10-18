<?php

namespace App\Events;

use App\Models\ServiceRequestChat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServiceRequestChatMessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public ServiceRequestChat $chat,
        public bool $wasReopened = false,
        public ?string $newTicketStatus = null
    ) {}

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('service-request.' . $this->chat->request_id);
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->chat->id,
            'request_id' => $this->chat->request_id,
            'user_id' => $this->chat->user_id,
            'user_nama' => $this->chat->user?->nama ?? 'Sistem',
            'user_avatar' => $this->chat->user?->foto_profil ? asset('storage/' . $this->chat->user->foto_profil) : null,
            'is_staff' => $this->chat->user ? ($this->chat->user->isTeknisi() || $this->chat->user->isAdmin()) : false,
            'is_system' => (bool) $this->chat->is_system,
            'pesan' => $this->chat->pesan,
            'created_time' => $this->chat->created_at?->format('H:i') ?? now()->format('H:i'),
            'created_datetime' => $this->chat->created_at?->format('H:i, d M') ?? now()->format('H:i, d M'),
            'was_reopened' => $this->wasReopened,
            'new_ticket_status' => $this->newTicketStatus,
        ];
    }
}
