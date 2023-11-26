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

class DirectMessage  implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chat;
    public $info;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chat)
    {

       $this->chat=$chat;
       $sender=User::find($this->chat->user_id);
       $to=User::find($this->chat->to_id);

       $avatar="";
    //    $avatar=$to->avatar();
       $side="right";
       if($chat->sender==$sender->id){
           $avatar=$sender->avatar();
           $side='left';
       }



       $user=auth()->user();
    //    $visitor=null;
    //    $visitor=$chat->user_id;

    //    if ($user->id == $chat->advertise->user->id && $chat->sender == 'host'){
    //     $visitor=$chat->visitor_id;;

    //    }





       $this->info=[
        'id'=>$chat->id,
        'chat'=>$chat->chat,
        'type'=>$chat->sender,
        'sender'=>$sender->name." ".$sender->family,
        'avatar'=>$avatar,
        'side'=>$side,
        'to_user'=>$chat->to_id,
        'sender_user'=>$chat->user_id,
        'uni'=>$chat->uni,
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
        return new PresenceChannel('direct_messaage.'.$this->chat->uni);

        // return new Channel('new_messaage');
        // return new PrivateChannel('new_messaage.'.$this->chat->advertise->id);
        return new PresenceChannel('direct_messaage');
        // return new PresenceChannel('direct_messaage.'.$this->chat->id);
        // return new PrivateChannel('channel-name');
    }
}
