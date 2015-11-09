<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\User;
use DB;

class Dialog extends Model
{
    protected $table = 'dialogs';
    protected $fillable = ['user_id', 'friend_id'];

    /**
     * checks if dialog between 2 users already exist
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    private function dialogExist($id, $fid)
    {
        $user = User::find($id);
        return !$user->dialogs()->where('friend_id', $fid)->get()->isEmpty();
    }

    /**
     * update access time to dialog for sorting
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    private function updateDialog($id, $fid)
    {
        DB::beginTransaction();
        $upd1 = $this->where('user_id', $id)->where('friend_id', $fid)->update([]);
        $upd2 = $this->where('friend_id', $id)->where('user_id', $fid)->update([]);
        if (!$upd1 || !$upd2) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * add new dialog-note between 2 users
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    private function makeDialog($id, $fid)
    {
        DB::beginTransaction();
        $msg1 = $this->create([
            'user_id' => $id,
            'friend_id' => $fid
        ]);
        $msg2 = $this->create([
            'user_id' => $fid,
            'friend_id' => $id
        ]);
        if (!$msg1 || !$msg2) {
            DB::rollback();
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * create new dialog between 2 users
     *
     * @param $id
     * @param $fid
     * @return bool
     */
    public function createDialog($id, $fid)
    {
        if ($this->dialogExist($id, $fid)) {
            if ($this->updateDialog($id, $fid)) {
                return true;
            }
            return false;
        }
        if ($this->makeDialog($id, $fid)) {
            return true;
        }
        return false;
    }
}
