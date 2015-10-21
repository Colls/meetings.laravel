<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = ['user_id', 'friend_id', 'status'];

    public function getApprovedFriends($id)
    {
        $friends = $this->join('users', 'users.id', '=', 'friends.friend_id')->join('avatars', 'avatars.user_id', '=', 'friends.friend_id')->where('friends.user_id', '=', $id)->where('status', '=', 'approved')->get();
//        dd($friends);
        return $friends;
        // todo including myself in friends-list if looking from another profile-page
    }
}
