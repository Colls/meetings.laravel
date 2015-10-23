<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Mockery\CountValidator\Exception;
use App\Models\Friend;

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
    protected $fillable = ['first_name', 'last_name', 'gender', 'email', 'password', 'married', 'birth_date', 'storage'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function scopePeople($query)
    {
        $query->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('active', '=', 1);
    }
    /**
     * get all registered boys
     * @return mixed
     */
    public function getBoys()
    {
//        $boys = $this->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('gender', '=', 'm')->where('active', '=', 1)->paginate(8);
        $boys = $this->people()->where('gender', '=', 'm')->paginate(8);
        return $boys;
    }

    /**
     * get all registered girls
     * @return mixed
     */
    public function getGirls()
    {
//        $girls = $this->latest('users.created_at')->join('avatars', 'avatars.user_id', '=', 'users.id')->where('gender', '=', 'f')->where('active', '=', 1)->paginate(8);
        $girls = $this->people()->where('gender', '=', 'f')->paginate(8);
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
//        $user = $this->find($id)->join('avatars', 'avatars.user_id', '=', 'users.id')->where('active', '=', 1)->get();
//        $user = $this->find($id);
//        $user = $user->join('avatars', 'avatars.user_id', '=', 'users.id')->get();
//        dd($user);
        return $user;
    }

    public function friends()
    {
        return $this->hasMany('App\Models\Friend');
    }

    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobby');
    }

    public function avatars()
    {
        return $this->hasMany('App\Models\Avatar');
    }

    public function getHobbies($id)
    {
        $user = $this->find($id);
        $result = $user->hobbies()->
            join('interests', 'interests.id', '=', 'interest_id')->
            get();
        return $result;
    }

    public function getApprovedFriends($id)
    {
        $user = $this->find($id);
        $result = $user->friends()->
            where('status','approved')->
            join('users', 'users.id', '=', 'friends.friend_id')->
            join('avatars', 'avatars.user_id', '=', 'users.id')->
            where('active', '=', 1)->
            get();
        return $result;
    }
}
