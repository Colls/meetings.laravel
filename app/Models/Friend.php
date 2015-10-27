<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use DB;
//use Illuminate\Support\Collection;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = ['user_id', 'friend_id', 'initiator_id', 'status'];

    /**
     * @param $id
     * @return static
     */
//    public function getApprovedFriends($id)
//    {
//        $friends = Collection::make(
//            DB::select(DB::raw("SELECT * FROM `users` u JOIN avatars a ON u.id=a.user_id WHERE a.active = '1' AND u.id IN (SELECT (user_id + friend_id - ?) id FROM (SELECT * FROM friends WHERE `status`='approved' AND (friend_id=? OR user_id=?)) f)", [$id, $id, $id]))
//        );
//        return $friends;
//        /**
//         * ready sql for this
//         * "SELECT * FROM `users` u JOIN avatars a ON u.id=a.user_id WHERE a.active = '1' AND u.id IN (SELECT (user_id + friend_id - $id) id FROM (SELECT * FROM friends WHERE `status`='approved' AND (friend_id='$id' OR user_id='$id')) f)"
//         */
//        // "SELECT (user_id + friend_id - 6) id FROM friends WHERE `status`='approved' AND (friend_id='6' OR user_id='6')" - id друзей
//    }

    public function cancelFriendship($id, $fid)
    {
        $this->where('user_id', $id)->where('friend_id', $fid)->delete();
        $this->where('friend_Id', $id)->where('user_id', $fid)->delete();
    }

    public function approveFriendship($id, $fid)
    {
        $this->where('user_id', $id)->where('friend_id', $fid)->update(['status' => 'approved']);
        $this->where('friend_Id', $id)->where('user_id', $fid)->update(['status' => 'approved']);
    }

    /**
     * can use this prototype if we wan't to extend friendship with different statuses
     *
     * @param $id
     * @param $fid
     */
//    public function denyFriendship($id, $fid)
//    {
//        $this->where('user_id', $id)->where('friend_id', $fid)->update(['status' => 'denied']);
//    }

    public function denyFriendship($id, $fid)
    {
        $this->cancelFriendship($id, $fid);
    }

    public function removeFriendship($id, $fid)
    {
        $this->cancelFriendship($id, $fid);
    }

    public function addFriendship($id, $fid)
    {
        $this->create(['user_id' => $id, 'friend_id' => $fid, 'initiator_id' => $id, 'status' => 'subscription']);
        $this->create(['user_id' => $fid, 'friend_id' => $id, 'initiator_id' => $id, 'status' => 'proposal']);
    }

}
