<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['remember_token', 'first_name', 'last_name', 'gender', 'email', 'password', 'married', 'birth_date', 'storage'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * get all registered boys
     * @return mixed
     */
    public function getBoys()
    {
        $boys = $this->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('gender', '=', 'm')->where('active', '=', 1)->paginate(8);
        return $boys;
    }

    /**
     * get all registered girls
     * @return mixed
     */
    public function getGirls()
    {
        $girls = $this->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('gender', '=', 'f')->where('active', '=', 1)->paginate(8);
        return $girls;
    }

    /**
     * get all registered people ordered by date registration
     * @return mixed
     */
    public function getLast()
    {
        $last = $this->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('active', '=', 1)->paginate(8);
        return $last;
    }

    /**
     * create personal user folder
     * @return bool|string
     */
    public function createUserStorage()
    {
        $folder_name = uniqid();
        $path = public_path() . '/upload/' . $folder_name;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            return $folder_name;
        }
        return false;
    }

    public function getUser($id)
    {
        $user = $this->join('avatars', 'avatars.user_id', '=', 'users.id')->where('active', '=', 1)->where('users.id', '=', $id)->get();
        return $user;
    }
}
