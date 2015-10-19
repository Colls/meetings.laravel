<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['name', 'user_id', 'active'];

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
