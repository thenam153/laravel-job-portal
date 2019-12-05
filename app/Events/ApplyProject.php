<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ApplyProject implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $idUser;
    public $idProject;
    public $idUserApply;
    public function __construct($idUser, $idProject, $idUserApply)
    {
        //
        $this->idUser = $idUser;
        $this->idProject = $idProject;
        $this->idUserApply = $idUserApply;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('apply.project.'.$this->idUser);
    }

    public function broadcastWith()
    {
        return [
            'idUser' => $this->idUserApply,
            'idProject' => $this->idProject
        ];
    }
}
