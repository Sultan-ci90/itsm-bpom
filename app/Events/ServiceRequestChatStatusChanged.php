<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServiceRequestChatStatusChanged implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public int $requestId,
        public bool $isChatClosed,
        public bool $isChatActive,
        public ?string $closedByName = null,
        public ?string $notice = null
    ) {}

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('service-request.' . $this->requestId);
    }

    public function broadcastWith(): array
    {
        return [
            'request_id' => $this->requestId,
            'is_chat_closed' => $this->isChatClosed,
            'is_chat_active' => $this->isChatActive,
            'closed_by_name' => $this->closedByName,
            'notice' => $this->notice,
        ];
    }
}
