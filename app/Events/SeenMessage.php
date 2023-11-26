<?php

namespace App\Events;

use App\Models\Chat;
use App\Models\User;
use Morilog\Jalali\Jalalian;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SeenMessage  implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $info;
    public $id;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id,$user)
    {

       $this->id=$id;
       $this->user=$user;

        $chat=Chat::find($this->id);



       $this->info=[
        'id'=>$this->id,
        'sender'=>$chat->user_id,
       ];
    //    $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('seen_message');
        // return new PrivateChannel('new_messaage.'.$this->chat->advertise->id);
        // return new PresenceChannel('new_messaage.'.$this->chat->uni);
        // return new PrivateChannel('channel-name');
    }
}
