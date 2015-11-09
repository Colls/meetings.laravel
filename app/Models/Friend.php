<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
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

    /**
     *
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function cancelFriendship($id, $fid)
    {
        DB::beginTransaction();
        $del1 = $this->where('user_id', $id)->where('friend_id', $fid)->delete();
        $del2 = $this->where('friend_Id', $id)->where('user_id', $fid)->delete();
        if (!$del1 || !$del2) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     *
     *
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function approveFriendship($id, $fid)
    {
        DB::beginTransaction();
        $app1 = $this->where('user_id', $id)->where('friend_id', $fid)->update(['status' => 'approved']);
        $app2 = $this->where('friend_Id', $id)->where('user_id', $fid)->update(['status' => 'approved']);
        if (!$app1 || !$app2) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     *
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function denyFriendship($id, $fid)
    {
        if ($this->cancelFriendship($id, $fid)) {
            return true;
        }
        return false;

//        $den = $this->where('user_id', $id)->where('friend_id', $fid)->update(['status' => 'denied']);
//        if (!$den) {
//            return false;
//        }
//        return true;
    }

    /**
     *
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function removeFriendship($id, $fid)
    {
        if ( $this->cancelFriendship($id, $fid)) {
            return true;
        }
        return false;
//        DB::beginTransaction();
//        $rem1 = $this->where('user_id', $id)->where('friend_id', $fid)->update(['status' => 'subscription']);
//        $rem2 = $this->where('user_id', $fid)->where('friend_id', $id)->update(['status' => 'proposal']);
//        if (!$rem1 || !$rem2) {
//            DB::rollback();
//            return false;
//        }
//        DB::commit();
//        return true;
    }

    /**
     *
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function addFriendship($id, $fid)
    {
        DB::beginTransaction();
        $add1 = $this->create(['user_id' => $id, 'friend_id' => $fid, 'initiator_id' => $id, 'status' => 'subscription']);
        $add2 = $this->create(['user_id' => $fid, 'friend_id' => $id, 'initiator_id' => $id, 'status' => 'proposal']);
        if (!$add1 || !$add2) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return true;
    }

}
