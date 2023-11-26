<?php

use App\Models\Chat;
use App\Models\Advertise;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('new_messaage.{advertiseId}', function ($user,  $advertise) {
//     $advertise=Advertise::find( $advertise);
//     $chat=$advertise->chats()->latest()->first();
//     if($chat->user_id==$user->id||$chat->visitor_id==$user->id){
//         return [
//             'user'=>$user
//         ];
//     }
//     return true;

//     return false;
//     return (int) $user->id === (int)$advertise->user->id;
//     return (int) $user->id === (int) $id;
// });
Broadcast::channel('new_messaage.{id}', function ($user,  $id) {
    $chat=Chat::where("uni",$id)->first();
    $advertise=$chat->advertise;
    // $advertise=Advertise::find( $advertise);
    // $chat=$advertise->chats()->latest()->first();
    if($chat->user_id==$user->id||$chat->to_id==$user->id){
        return [
            'user'=>$user
        ];
    }
    return false;
    return (int) $user->id === (int)$advertise->user->id;
    return (int) $user->id === (int) $id;
});


Broadcast::channel('seen_message', function ($user) {
    return true;
});

Broadcast::channel('direct_messaage.{id}', function ($user,  $id) {
    $chat=Chat::where("uni",$id)->first();
    if($chat->user_id==$user->id||$chat->to_id==$user->id){
        return [
            'user'=>$user
        ];
    }
    return true;

    // $advertise=Advertise::find( $advertise);
    // $chat=$advertise->chats()->latest()->first();
    // if($chat->user_id==$user->id||$chat->visitor_id==$user->id){
    //     return [
    //         'user'=>$user
    //     ];
    // }
    return true;
});
