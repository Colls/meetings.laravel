<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'avatars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar', 'user_id', 'active'];

    /**
     * upload avatar to user's personal folder
     * @param $storage
     * @param $file
     * @return bool|string
     */
    public function uploadAvatar($storage, $file)
    {
        if ($file->isValid()) {
            $newName = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/upload/' . $storage;
            $file->move($destinationPath, $newName);
            return $newName;
        }
        return false;
    }
}
