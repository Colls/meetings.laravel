<?php

namespace App\Helpers;


class FileSystemHelper
{
    /**
     * create personal user folder
     *
     * @return bool|string
     */
    public static function createUserStorage()
    {
        $folder_name = uniqid();
        $path = public_path() . '/upload/' . $folder_name;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return $folder_name;
        }
        return false;
    }

    /**
     * upload avatar to user's personal folder
     *
     * @param $storage
     * @param $file
     * @return bool|string
     */
    public static function uploadAvatar($storage, $file)
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