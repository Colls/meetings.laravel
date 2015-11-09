<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['message', 'user_id', 'friend_id'];

    public function getMessages($id, $fid)
    {
        $messages = $this->
            select('messages.*', 'messages.created_at as time', 'users.*', 'avatars.*')->
            join('users', 'messages.user_id', '=', 'users.id')->
            where(function($query) use ($id, $fid){
                $query->where('messages.friend_id', $id)->where('messages.user_id', $fid);
            })->
            orWhere(function($query) use ($id, $fid){
                $query->where('messages.user_id', $id)->where('messages.friend_id', $fid);
            })->
            join('avatars', 'avatars.user_id', '=', 'messages.friend_id')->
            whereActive(1)->
            orderBy('time')->
            get();
//        dd($messages);
        return $messages;
    }
}
