<?php

namespace App\Events;

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

class NewMessage  implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chat;
    public $advertise;
    public $info;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chat)
    {

       $this->chat=$chat;
       $this->advertise=$chat->advertise;
       $sender=User::find($this->chat->user_id);
       $visitor=User::find($this->chat->visitor_id);

    //    $avatar=$visitor->avatar();
    //    $side="right";
    //    if($chat->sender=="host"){
    //        $avatar=$sender->avatar();
    //        $side='left';
    //    }



       $user=auth()->user();
       $user=User::find(1);

    //    $visitor=null;
    //    $visitor=$chat->user_id;

    //    if ($user->id == $chat->advertise->user->id && $chat->sender == 'host'){
    //     $visitor=$chat->visitor_id;;

    //    }





       $this->info=[
        'id'=>$chat->id,
        'chat'=>$chat->chat,
        'uni'=>$chat->uni,
        'type'=>$chat->sender,
        'sender'=>$sender->name." ".$sender->family,
        // 'avatar'=>$avatar,
        'visitor'=>$visitor,
        'sender_user'=>$chat->user->id,
        'current_user'=> $user->id,
        'date'=> Jalalian::forge($chat->created_at)->format('Y-m-d H:i:s'),
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
        // return new Channel('new_messaage');
        // return new PrivateChannel('new_messaage.'.$this->chat->advertise->id);
        return new PresenceChannel('new_messaage.'.$this->chat->uni);
        return new PrivateChannel('channel-name');
    }
}
